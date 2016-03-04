<?

// Import needed files and classes
require_once (dirname(__FILE__).'/../core/Controller.php');

/**
 * Class AboutMe
 * Controler that opens AboutMe Page
 */
class AboutMe extends Controller
{
	const HOME = 'home/index';

	function __construct($fileName)
	{
		parent::__construct($fileName);
	}
}



?>