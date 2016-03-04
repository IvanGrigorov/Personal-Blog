<?

require_once (dirname(__FILE__).'/../core/Controller.php');


/**
 * Class Delete
 * Shows Delete Page from which uer can delete projects 
 */
class Delete extends Controller
{
	const HOME = 'home/index';

	function __construct($fileName)
	{
		parent::__construct($fileName);
	}

	function index() {

		// Checks if user is administrator
		if($_SESSION['User']['isAdministrator'] == 1)  {
				$this->view =  new View();
				$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/header.php');
				$this->view->renderView($this->viewFileName);
				$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/footer.php');
		}

		// If not Log Out and redirect to Error Page 
		else {
			Session::destroySession();
			Cookies::deleteCookie('User');
			header ('Location: /Error/logInError');
			exit;
		}
	}
	
}




?>