<?

require_once (dirname(__FILE__).'/../core/Controller.php');
require_once (dirname(__FILE__).'/../models/LogInModel.php');
require_once (dirname(__FILE__).'/../libraries/Validation.php');


/**
 * Class Home
 * Shows the Home Page
 */
class Home extends Controller
{
	const HOME = 'home/index';

	function __construct($fileName)
	{
		parent::__construct($fileName);
	}

	/**
	 * Log In User 
	 * @return Nothing - echoes Message for error or creates Cookie and Session for the logged User 
	 */
	public function run() 
	{
		$rest_json = file_get_contents("php://input");
		$_POST = json_decode($rest_json, true);
		$userName = $_POST['username'];
		$password = $_POST['passHash'];
		$userName = trim($userName);
		$password = trim($password);
		$this->model = new LogInModel();
		$userName =	mysqli_real_escape_string($this->model->database->connection, $userName);
		$password =	mysqli_real_escape_string($this->model->database->connection, $password);
		if (checkingForValidUsernameAndPassword($userName) &&
			checkingForValidUsernameAndPassword($password)) {
			if ($this->model->checkIfUserExists($userName, $password) != NULL) {
				$user = $this->model->checkIfUserExists($userName, $password);
				setcookie("User", $userName, time()+60*60, "/", ".ivanit.netne.net");
				$_SESSION["User"] = $user["Username"];
				$_SESSION["User"]["isAdministrator"] = $user["isAdministrator"];
				$this->model->GetDatabase()->closeConnection();
				exit;
			} 
			else {
				echo "WrongData";
				exit;
			}
		}
		else {
			echo "LenghtProblem";
			exit;
		}
	}
}



?>