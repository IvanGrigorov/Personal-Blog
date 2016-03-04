<?

/**
 * Class App 
 * Main core class - Splits the URL and calls the coresponding classes and methods
 */
class App {

	// Sets default constructor and method if those from URL do not exist
	// Redirects to Home page after invalid URL or someone that users should not open 
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = array();

	/**
	 * App Constructor
	 * @return new App object
	 */
	public function __construct() {

		$url = $this->parseUrl();

		// Opens HTML template file if the URL directs to some 
		if (strcmp($url[3], "Templates") == 0) {
			require_once '../views/HTMLComponents/Templates/'.$url[4];
		}

		// Opens the sitemap for Google analytics
		if(strcmp($url[0], "sitemap.xml") == 0) {
			require_once '../../sitemap.xml';
		} 

		// Sets coresponding controller if some exists
		if(file_exists('APP/controllers/'.$url[0].'.php'))  {
			$this->controller = $url[0];
			unset($url[0]);
		}
		require_once 'APP/controllers/'.$this->controller.'.php';

		// Sets coresponding method of the controller if needed
		if (isset($url[1])) {
			if(method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// Create instance of the class and calls a method from the class if needed
		$this->params = $url ? array_values($url) : array();
		$this->controller = new $this->controller($this->controller.'/'.$this->method);
		call_user_func_array(array($this->controller, $this->method), $this->params);
	}

	/**
	 * Parse the query of the URL
	 * @return Array of URL parts
	 */
	public function parseUrl() {

		if(isset($_GET['url'])) {
			return $url = explode('/', rtrim($_GET['url'], '/'));
		}
	}
}




?>