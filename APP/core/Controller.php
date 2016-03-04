<?

// Include needed files and classes
require_once 'View.php';
require_once 'Session.php';
require_once 'Cookies.php';
require_once (dirname(__FILE__).'/../libraries/Constants.php');

/**
 * Class Controller 
 * Abstract class for all controlers
 */
abstract class Controller
{
	private $viewFileName;

	public function GetViewFileName() {
		return $this->viewFileName;
	}

	public function SetViewFileName($value) {
		$this->viewFileName = $value;
	}

	function __construct($fileName)
	{
		Session::sessionInit();
		$this->SetViewFileName($fileName);
	}

	// Default method rendering the view 
	public function index() {
		$this->view =  new View();
		$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/header.php');
		$this->view->renderView($this->viewFileName);
		$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/footer.php');
	}

	// Logout functions 
	public function logOut() {
		Session::destroySession();
		foreach ($_COOKIE as $key => $value) {
			Cookies::deleteCookie($key);
		}
		header('Location: http://ivanit.netne.net');
	}
}

?>