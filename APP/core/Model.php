<?
	// Include needed files and classes	
	require_once 'Database.php';
	require_once (dirname(__FILE__).'/../interfaces/IModel.php');



	/**
	 * Abstract class Model
	 * Initialize new Database
	 */
	abstract class Model implements IModel 
	{
		private $database;

		public function GetDatabase() {
		return $this->database;
		}

		public function SetDatabase($value) {
			$this->database = $value;
		}
		

		function __construct()
		{
			$this->SetDatabase(new Database());
		}

	}






?>