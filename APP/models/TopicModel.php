<?

	require_once (dirname(__FILE__).'/../core/Model.php');
	require_once (dirname(__FILE__).'/../libraries/Constants.php');


	/**
	 * Class TopicModel
	 * Uploads, deleates new Projects
	 * Add removes images for a project
	 */
	class TopicModel extends Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function uploadNewTopic($title, $subtitle, $decription, $WbM, $LoC, $TechnUsed, $article, $category) {
			$query = "INSERT INTO Topics (Title, Subtitle, Description, WrittenByMe, Link, Technologies, Article, Category) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query);
			mysqli_stmt_bind_param($stmt, "ssssssss", $valOne, $valTwo, $valThree, $valFour, $valFive, $valSix, $valSeven, $valEight);
			$valOne = $title;
			$valTwo = $subtitle;
			$valThree = $decription;
			$valFour = $WbM;
			$valFive = $LoC;
			$valSix = $TechnUsed;
			$valSeven = $article;
			$valEight = $category;
			try {
				if (!($stmt->execute())){
					throw new Exception(mysqli_error($this->GetDatabase()->GetConnection()));
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

		function checkIfTitleExists($title) {
			$query = "SELECT Title FROM Topics";

			if ($result = mysqli_query($this->GetDatabase()->GetConnection(), $query)) {
				while ($row =  mysqli_fetch_array($result)) {
					if ($title == $row['Title']) {
						return true;
					}
				}
			}
			return false;
		}

		function getInformationForTopic($title) {
			$row = NULL;
			$query = "SELECT Title, Subtitle, Description, WrittenByMe, Link, Technologies, Article FROM Topics WHERE Title = ?";
			$stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query);
			mysqli_stmt_bind_param($stmt, 's', $titleOfProject);
			$titleOfProject = $title;
			try {
				if (!(mysqli_stmt_execute($stmt))){
					throw new Exception("There is currently a problem with the database. Please come back later.");
				}
				else {
					mysqli_stmt_bind_result($stmt, $fetchedTitle, $fetchedSubtitle, $fetchedDescription, $fetchedWbM, $fetchedLink, $fetchedTechnologies, $fetchedArticle);
					if (mysqli_stmt_fetch($stmt)) {
						$row = array ('Title' => $fetchedTitle, 
									  'Subtitle' => $fetchedSubtitle,
									  'Description' => $fetchedDescription,
									  'WbM' => $fetchedWbM,
									  'Link' => $fetchedLink,
									  'Technologies' => $fetchedTechnologies,
									  'Article' => $fetchedArticle);
						
						mysqli_stmt_close($stmt);
						return $row;
					}	
				}
			}
			catch(Exception $e)  {
				echo "<h1>Ooops something went wrong!<h1>";
				echo "<p>".$e->getMessage()."<p>";
				mysqli_stmt_close($stmt);
			}
		}

		function deleteProject($title) {
			$query = "DELETE FROM Topics WHERE Title = ?";
			$stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query);
			mysqli_stmt_bind_param($stmt, "s", $title);
			if (mysqli_stmt_execute($stmt)) {
				$stmt->close();
				mysqli_stmt_close($stmt);
			}

		}

		function uploadImages($topicTitle, $topicSubtitle, $file) {

			$this->database->connection = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
			$image = addslashes($file);
			$query = "INSERT INTO Gallery (TopicTitle, TopicSubtitle, Image) VALUES ('$topicTitle', ' $topicSubtitle', '$image')";

			try {
				if (!(mysqli_query($this->GetDatabase()->GetConnection(), $query))) {
					throw new Exception(mysqli_error($this->database->connection));
				}
			}

			catch(Exception $e)  {
				echo "<h1>Ooops something went wrong!<h1>";
				echo "<p>".$e->getMessage()."<p>";
				exit;
			}
		}

		function getImagesForTopic($title) {
			$result = NULL;
			$query = "SELECT Image FROM Gallery WHERE TopicTitle = ?";
			$imageCollection = array();
			if ($stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query)) {
				mysqli_stmt_bind_param($stmt, "s", $title); 
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $image);
				while (mysqli_stmt_fetch($stmt)) {
        			$imageCollection[] = $image;
   				}
			}
			mysqli_stmt_close($stmt);
			if (count($imageCollection) == 0) {
				return $result;
			}
			else {
				$result = $imageCollection;
				return $result;
			}
		}

		function deleteImagesForTopic($title) {
			$query = "DELETE FROM Gallery WHERE TopicTitle = ?";
			$stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query);
			mysqli_stmt_bind_param($stmt, "s", $title);
			if (mysqli_stmt_execute($stmt)) {
				$stmt->close();
				mysqli_stmt_close($stmt);
			}
		}

	}












?>