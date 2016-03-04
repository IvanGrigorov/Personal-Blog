<?

require_once (dirname(__FILE__).'/../core/Controller.php');
require_once (dirname(__FILE__).'/../models/CategoryModel.php');

/**
 * Class Categories
 * Constructor that shows Categories (Info or Delete) Page 
 */
class Categories extends Controller
{
	const HOME = 'home/index';

	function __construct($fileName)
	{
		parent::__construct($fileName);
	}

	public function Projects($category) { 
		$this->model = new CategoryModel();
		$projects = $this->model->GetTopics($category);
		$this->view = new View();
		$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/header.php');
			$this->view->showTopicsFromCategory($this->viewFileName, $projects);
			$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/footer.php');
	}

	public function GetTopicsForDelete($category) { 
		$this->model = new CategoryModel();
		$projects = $this->model->GetTopicsForDelete($category);
	}
}



?>