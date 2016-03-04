<?

// Selects the Timezone for the server 
date_default_timezone_set('Europe/Sofia');
require_once (dirname(__FILE__).'/../core/Model.php');


/**
 * Class CommentsModel
 * Reads and adds comments for specific topics 
 */
class CommentsModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function AddComment() {
		$rest_json = file_get_contents("php://input");
		$_POST = json_decode($rest_json, true);
		$topic = $_POST['title'];
		$user = $_POST['user'];
		$comment = $_POST['comment'];
		$dateTime = new DateTime();
		$registrationDate = $dateTime->format('Y-m-d H:i:s');
		$query = "INSERT INTO COMMENTS (UserId, Comment, Topic, DateOfComment) SELECT U.UserId, ?, ?, ? FROM USERS U WHERE Username = ?";
		$stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query);

		mysqli_stmt_bind_param($stmt, "ssss", $val1, $val2, $val3, $val4);
		$val1 = $comment;
		$val2 = $topic;
		$val3 = $registrationDate;
		$val4 = $user;

		try {
			if (!($stmt->execute())){
				throw new Exception("There is currently a problem with the database. Please come back later.");
			}
			else {
				exit;
				mysqli_stmt_close($stmt);
			}
		}
		catch(Exception $e)  {
			echo "<p>".$e->getMessage()."<p>";
			mysqli_stmt_close($stmt);
		}
	}

	public function ReadComments($topic) {
		$comments = array();
		$query = "SELECT C.Comment, U.Username FROM COMMENTS C, USERS U WHERE C.Topic = ? AND C.UserId = U.UserId ORDER BY DateOfComment DESC;";
		if ($stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query)) {
			mysqli_stmt_bind_param($stmt, "s", $topic); 
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $comment, $user);
			while (mysqli_stmt_fetch($stmt)) {
				$comments[]  = array('Comment' => $comment, 'User' => $user);
			}
		}
		mysqli_stmt_close($stmt);
		echo json_encode($comments);
	}
}








?>