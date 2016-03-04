<?
	// Here are some functions to validate information for the project
	// Still needs to be developed more and functions to be added
	
	/**
	 * Checks if inputs for new users (registration) are valid
	 * @param type $value (username or password)
	 * @return Boolean - true for valid and false for invalid
	 */
	function checkingForValidUsernameAndPassword($value) {
		//$dataToInsert = trim($value);
		$lengthOfData = mb_strlen($value);
		if ($lengthOfData < 3 || $lengthOfData > 500) {
			return false;
		}
		else {
			//$dataToInsert = mysqli_real_escape_string($connection, $dataToInsert);
			return true;
		}
	}

?>