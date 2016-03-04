<?

// Import needed files and classes 
require_once (dirname(__FILE__).'/../core/Controller.php');


/**
 * Class Error
 * Shows the Error Page
 */
class Error extends Controller
{
	const HOME = 'home/index';

	function __construct($fileName)
	{
		parent::__construct($fileName);
	}

	function logInError() {
		$this->view =  new View();
		$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/header.php');
		$this->view->renderView($this->viewFileName);
		$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/footer.php');
	}
}



?>