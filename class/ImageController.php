<?
include_once "includes.php";

class ImageController{
	private $store_path;
	private $web_path = "/data/img/";
    
    function __construct() {
		$this->store_path = $_SERVER['DOCUMENT_ROOT']."/data/img/";
		
    }
	/* For this variables, outside this class, they can only get them (not set) */
    public function __get($name){
        return $this->$name;
    }

	public function upload(){
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$extension = strtolower(end(explode(".", $_FILES["file"]["name"])));
		if ($_FILES["file"]["size"] < 1000000 && in_array($extension, $allowedExts)){
			if ($_FILES["file"]["error"] > 0){
				throw new Exception("Return Code: " . $_FILES["file"]["error"]);
			}
			else{
				if (file_exists($this->store_path . $_FILES["file"]["name"])){
					throw new Exception($_FILES["file"]["name"] . " already exists. ");
				}
				else{
					move_uploaded_file($_FILES["file"]["tmp_name"], $this->store_path . $_FILES["file"]["name"]);
					$url_file =  $this->web_path . $_FILES["file"]["name"];
				}
			}
		  }
		else{
			throw new Exception("Invalid file");
		}
		return $url_file;
	}
	
	public function delete($image){
		if(!file_exists($this->store_path . $image)) throw new Exception("File not exist");
		unlink($this->store_path . $image);
	}
	
	public function getList(){
		$results = array();
		$handler = opendir($this->store_path);
		while ($file = readdir($handler)) {
			if ($file != "." && $file != "..") {
				$results[] = $file;
			}
		}
		closedir($handler);
		return $results;
	}
    /*  -----  Singleton pattern ----- */

    // singleton instance (es crida: $t = CLASSNAME::getInstance();)
    private static $instance;

    // getInstance method
    public static function getInstance() {

            if(!self::$instance) {
                    self::$instance = new self();
            }
            return self::$instance; 
    }
}
?>