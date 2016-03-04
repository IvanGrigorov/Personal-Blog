<?

	date_default_timezone_set('Europe/Sofia');
	require_once (dirname(__FILE__).'/../core/Model.php');

	/**
	 * Class RegistrationModel
	 * Deals with checking if the input for registration is unique and inserts information for new users 
	 */
	class RegistrationModel extends Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function insertDataInDatabase($usern, $pass) {
			$dateTime = new DateTime();
			$registrationDate = $dateTime->format('Y-m-d H:i:s');
			$query = "INSERT INTO USERS (Username, Password, RegistrationDate) VALUES (?,?,?)";
			$stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query);

			mysqli_stmt_bind_param($stmt, "sss", $val1, $val2, $val3);
			$val1 = $usern;
			$val2 = $pass;
			$val3 = $registrationDate;
			try {
				if (!($stmt->execute())){
					throw new Exception("There is currently a problem with the database. Please come back later.");
				}
				else {
					mysqli_stmt_close($stmt);
				}
			}
			catch(Exception $e)  {
				echo "<p>".$e->getMessage()."<p>";
				mysqli_stmt_close($stmt);
			}
		}
	
		public function checkForUniqueData($column, $value) {
			$query = "SELECT ".$column." FROM USERS WHERE ".$column." = ?";
			$stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query);
			if (!$stmt) {
				echo (mysqli_error($this->GetDatabase()->GetConnection()));
				exit;
			} 
			$result = true; 
			if (!mysqli_stmt_bind_param($stmt, "s", $value)) {
				echo (mysqli_error($this->GetDatabase()->GetConnection()));
				exit;
			} 
			
			if (!mysqli_stmt_execute($stmt)) {
				echo (mysqli_error($this->GetDatabase()->GetConnection()));
				exit;
			}
			if (!mysqli_stmt_store_result($stmt)) {
				echo (mysqli_error($this->GetDatabase()->GetConnection()));
				exit;
			}
	        if (mysqli_stmt_num_rows($stmt)>0){
	        	$result = false;
	        }
	        mysqli_stmt_close($stmt);
			return $result;
		}
	}





?>