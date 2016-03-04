<?

// Import the needed files and classes 
require_once (dirname(__FILE__).'/../core/Controller.php');


/**
 * Class Telerik 
 * Shows the Telerik Page 
 */
class Telerik extends Controller
{
	const HOME = 'home/index';

	function __construct($fileName)
	{
		parent::__construct($fileName);
	}
}



?>