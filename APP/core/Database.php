<?
	// Include needed files and classes
	require_once (dirname(__FILE__).'/../libraries/Constants.php');

	/**
	 * Class Database
	 * Creates and closes database conections
	 */
	class Database 
	{
		private $connection;

		public function GetConnection() {
		return $this->connection;
		}

		public function SetConnection($value) {
			$this->connection = $value;
		}
		
		function __construct()
		{
			$this->SetConnection(mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE));
		}

		public function closeConnection() {
			mysqli_close($this->GetConnection());
			unset($this->GetConnection());
		}
	}




?>