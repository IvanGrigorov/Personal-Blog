<?

require_once (dirname(__FILE__).'/../core/Controller.php');
require_once (dirname(__FILE__).'/../models/RegistrationModel.php');
require_once (dirname(__FILE__).'/../libraries/Validation.php');


/**
 * Class Registration 
 * Deals with registration for the users 
 */
class Registration  extends Controller
{
	const HOME = 'home/index';

	function __construct($fileName)
	{
		parent::__construct($fileName);
	}

	public function makeRegistration() {

		$rest_json = file_get_contents("php://input");
		$_POST = json_decode($rest_json, true);
		$userName = $_POST['username'];
		$password = $_POST['passHash'];
		$userName = trim($userName);
		$password = trim($password);
		$this->model = new RegistrationModel();
		$userName =	mysqli_real_escape_string($this->model->database->connection, $userName);
		$password =	mysqli_real_escape_string($this->model->database->connection, $password);
		if (checkingForValidUsernameAndPassword($userName) &&
			checkingForValidUsernameAndPassword($password)) {
			if ($this->model->checkForUniqueData('Username', $userName) && $this->model->checkForUniqueData('Password', $password)) {
				$this->model->insertDataInDatabase($userName, $password);
				$this->model->GetDatabase()->closeConnection();
				header('Location: http://ivanit.netne.net/Home/index');
				exit;
			} 
			else {
				echo "NotUnique";
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