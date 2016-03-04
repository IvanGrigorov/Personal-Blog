<?

/**
* Cookies Class
* Sets, deletes, and recieves cookie
*/
class Cookies
{

	public static function setCookie($key, $value) {
		setcookie($key, $value, time() + 3600, '/');
	}

	public static function deleteCookie($key) {
		unset($_COOKIE[$key]);
    	setcookie($key, '', 1, '/', ".ivanit.netne.net");
	}

	public static function getCookie($key) {
		return $_COOKIE[$key];
	}
}





?>