<?

/**
 * Class Sesseion
 * Initialize, sets, unsets and destroys (deletes) session
 */
class Session 
{
	
	public static function sessionInit() {
		session_start();
	}

	public static function setValueToSession($key, $value) {
		$_SESSION[$key] = $value;
	}

	public static function unsetValueFromSession($key) {
		unset($_SESSION[$key]);
	} 

	public static function getValueFromSession($key) {
		return $_SESSION[$key];
	}

	public static function destroySession() {
		session_unset();
		session_destroy();
	}
}







?>