<?
	require_once (dirname(__FILE__).'/../core/Controller.php');
	require_once (dirname(__FILE__).'/../models/TopicModel.php');
	require_once (dirname(__FILE__).'/../models/CommentsModel.php');
	require_once (dirname(__FILE__).'/../libraries/Validation.php');
	require_once (dirname(__FILE__).'/../models/TechnologyModel.php');



	/**
	 * Class Project
	 * Uploads and deletes projects and images for projects
	 * Shows the Project Page or the Upload Project Page 
	 */
	class Project extends Controller
	{
		
		function __construct($fileName)
		{
			parent::__construct($fileName);
		}

		public function UploadView() {
			if($_SESSION['User']['isAdministrator'] == 1)  {
				$this->view =  new View();
				$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/header.php');
				$this->view->renderView($this->viewFileName);
				$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/footer.php');
			}
			else {
				Session::destroySession();
				Cookies::deleteCookie('User');
				header ('Location: /Error/logInError');
				exit;
			}
		}

		public function Upload() {
			$this->model = new TopicModel();
			
			$topic = array ( 'title' => $_POST['title'],
							'subtitle' => $_POST['subtitle'],
							'description' => $_POST['description'],
							'WbM' => $_POST['WbM'],
							'LoC' => $_POST['LoC'],
							'TechnUsed' => $_POST['TechnUsed'],
							'project' => $_POST['project'],
							'category' => $_POST['category']
							);

			foreach ($topic as $value) {
				trim($value);
				mysqli_real_escape_string($this->model->database->connection, $value);
			}

			if ($this->model->checkIfTitleExists($topic['title'], $this->model->database->connection)) {
				$this->model->GetDatabase()->closeConnection();
			}

			else {
				$this->model->uploadNewTopic($topic['title'], $topic['subtitle'], $topic['description'], $topic['WbM'],
				$topic['LoC'], $topic['TechnUsed'], $topic['project'], $topic['category'], $this->model->database->connection);
			}

			// Upload file from client
			// Used code from http://www.w3schools.com/php/php_file_upload.asp 
			if (!empty($_FILES)) {
				foreach ($_FILES as $file) 
				{ 
					$target_dir = "uploads/";
					$target_file = basename($file["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

					// Check if image file is a actual image or fake image
					if(isset($_POST["submit"])) {
					    $check = getimagesize($file["tmp_name"]);
					    if($check !== false) {
					        echo "File is an image - " . $check["mime"] . ".";
					        exit;
					        $uploadOk = 1;
					    } else {
					        echo "File is not an image.";
					        exit;
					        $uploadOk = 0;
					    }
					}

					// Check if file already exists
					if (file_exists($target_file)) {
					    echo "Sorry, file already exists.";
					    exit;
					    $uploadOk = 0;
					}

					// Check file size
					// Here maximum size 2 MB 
					if ($file["size"] > 2000000) {
					    echo "Sorry, your file is too large.";
					    exit;
					    $uploadOk = 0;
					}

					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						exit;
					    $uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					    echo "Sorry, your file was not uploaded.";
					    exit;
					} 

					// if everything is ok, try to upload file
					else {
						$image = file_get_contents($file['tmp_name']);

						// The project is small so here we can store images directly in the the database
						// For bigger projects it is recommended to store just the paths in the database
						// Images should be saved as files in a specific folder
						$this->model->uploadImages($topic['title'], $topic['subtitle'], $image);
						header("Location: http://ivanit.netne.net/Home/index");
					}
				}
			}
			$this->model->GetDatabase()->closeConnection();
			exit;
		}

		/**
		 * Render the view for the specific project
		 * @param type Topic name
		 * @return Nothing - shows the view for the project 
		 */
		public function Project($argument) {
			$this->model = new TopicModel();
			$topic = $this->model->getInformationForTopic($argument);
			$imageCollection = $this->model->getImagesForTopic($topic['Title']);
			$this->view = new View();
			$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/header.php');
			$this->view->renderProjectwithData($this->viewFileName, $topic['Title'], $topic['Subtitle'], $topic['Description'], $topic['WbM'],
								   $topic['Link'], $topic['Technologies'], $topic['Article'], $imageCollection);
			$this->view->renderHeaderOrFooter(dirname(__FILE__).'/../views/HTMLComponents/footer.php');
		}

		public function DeleteProject($argument) {
			$this->model = new TopicModel();
			$this->model->deleteProject($argument);
			$this->model->deleteImagesForTopic($argument);

		}

		public function AddComment() {
			$this->model = new CommentsModel();
			$this->model->AddComment();
		}

		public function GetComments($topic) {
			$this->model = new CommentsModel();
			$this->model->ReadComments($topic);
		}

		public function GetTech($name) {
			$this->model = new TechnologyModel();
			$this->model->GetTopics($name);
		}

	}
?>