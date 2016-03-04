<?


	require_once (dirname(__FILE__).'/../core/Model.php');


	/**
	 * Class TechnologyModel
	 * Get Information for technologies used in projects  
	 */
	class TechnologyModel extends Model
	{

		function __construct()
		{
			parent::__construct();
		}

		public function GetTopics($name) {
			$tech = new stdClass();
			$query = "SELECT Description FROM Technologies WHERE Name = ?";
			if ($stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query)) {
				mysqli_stmt_bind_param($stmt, "s", $name); 
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $article);
				while (mysqli_stmt_fetch($stmt)) {
					$tech->description = $article;
				}
			}
			mysqli_stmt_close($stmt);
			echo json_encode($tech);
		}

	}





?>