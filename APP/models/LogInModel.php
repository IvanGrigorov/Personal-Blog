<?


	require_once (dirname(__FILE__).'/../core/Model.php');

	/**
	 * Class LogInModel
	 * Deals for Log Ins 
	 */
	class LogInModel extends Model
	{

		function __construct()
		{
			parent::__construct();
		}

		/**
		 * Return Information for User after successful Log In
		 * @param type $username 
		 * @param type $password 
		 * @return Array with user information after successful Log In or NULL if it is unsuccessful  
		 */
		public function checkIfUserExists($username, $password) {
			$row = NULL;
			$query = "SELECT Username, Administrator, RegistrationDate FROM USERS WHERE Username = ? AND Password = ?";
			if ($stmt = mysqli_prepare($this->GetDatabase()->GetConnection(), $query)) {
				mysqli_stmt_bind_param($stmt, "ss", $username, $password); 
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $Usernm, $Admin, $RegDate);
				if (mysqli_stmt_fetch($stmt)) {
					$row  = array('Username' => $Usernm, 'isAdministrator' => $Admin, 'RegistrationDate' => $RegDate);
				}
			}
			mysqli_stmt_close($stmt);
			return $row;
		}
	}





?>