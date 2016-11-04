<?


	require_once (dirname(__FILE__).'/../core/Model.php');

	/**
	* 
	*/
	class PostsModel extends Model
	{

		function __construct()
		{
			parent::__construct();
		}

		public function uploadPost($title, $article, $date) {
			$query = "INSERT INTO Posts (Title, Article, DateOfPost) VALUES (?, ?, ?)";
			$stmt = mysqli_prepare($this->database->connection, $query);
			mysqli_stmt_bind_param($stmt, "sss", $title, $article, $date);
			try {
				if (!($stmt->execute())){
					throw new Exception(mysqli_error($this->database->connection));
				}
				else {
					mysqli_stmt_close($stmt);
				}
			}
			catch(Exception $e)  {
				echo "<h1>Ooops something went wrong!<h1>";
				echo "<p>".$e->getMessage()."<p>";
				mysqli_stmt_close($stmt);
			}
		}
	}





?>