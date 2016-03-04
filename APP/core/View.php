<?


/**
 * Class View
 * Deals with rendering the views
 * Render all types of views (with or without external data for the views)
 */
class View
{

	function __construct()
	{

	}

	public function renderView($fileName) {
		if (file_exists(dirname(__FILE__).'/../views/'.$fileName.'.php')) {
			require_once (dirname(__FILE__).'/../views/'.$fileName.'.php');
		}
		else {
			header('Location: /Home');
		}
	}
	public function renderHeaderOrFooter($fileName) {
		require_once ($fileName);
	}

	public function renderProjectwithData($fileName, $title, $subtitle, $description, $WbM, $link, $technologies, $article, $imageCollection) {
		$GLOBALS['title'] = $title;
		$GLOBALS['subtitle'] = $subtitle;
		$GLOBALS['description'] = $description;
		$GLOBALS['WbM'] = $WbM;
		$GLOBALS['link'] = $link;
		$GLOBALS['technologies'] = $technologies;
		$GLOBALS['article'] = $article;
		$GLOBALS["images"] = $imageCollection;
		$this->renderView($fileName);
	}

	public function showTopicsFromCategory($fileName, $data) {
		$GLOBALS['projects'] = $data;
		$this->renderView($fileName);
	}
}

?>
