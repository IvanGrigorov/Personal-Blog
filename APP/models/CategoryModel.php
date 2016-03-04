<?


	require_once (dirname(__FILE__).'/../core/Model.php');

	/**
	 * Class CategoryModel
	 * Get Information from Databeses about topics for a specific category
	 */
	class CategoryModel extends Model
	{

		function __construct()
		{
			parent::__construct();
		}

		/**
		 * Returns Information about topics for Categories view
		 * @param type $category - selects specific category
		 * @return Array with topics information
		 */
		public function GetTopics($category) {
			$topics = array();
			$query = "SELECT Title, Article FROM Topics WHERE Category = ?";
			if ($stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query)) {
				mysqli_stmt_bind_param($stmt, "s", $category); 
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $title, $article);
				while (mysqli_stmt_fetch($stmt)) {
					$topics[]  = array('Title' => $title, 'Article' => $article);
				}
			}
			mysqli_stmt_close($stmt);
			return $topics;
		}

		/**
		 * Returns information for Delete view
		 * @param type $category - selects specific category
		 * @return Nothing (Sends JSON with information to client) 
		 */
		public function GetTopicsForDelete($category) {
			$topics = array();
			$query = "SELECT Title, Article FROM Topics WHERE Category = ?";
			if ($stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query)) {
				mysqli_stmt_bind_param($stmt, "s", $category); 
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $title, $article);
				while (mysqli_stmt_fetch($stmt)) {
					$topics[]  = array('Title' => $title, 'Article' => $article);
				}
			}
			mysqli_stmt_close($stmt);
			echo json_encode($topics);
		}
	}





?>