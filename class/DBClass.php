<?
include_once $_SERVER['DOCUMENT_ROOT']."/library/flintstone/flintstone.class.php";

class DB{
    private $db;
    private $databases;
    
    function __construct() {
		$this->databases = array();
		$this->db = new Flintstone(array('dir' => $_SERVER['DOCUMENT_ROOT'].'/data/'));
    }
	
	private function loadDB($db_name){
		if(!$this->databases[$db_name]){
			$this->databases[$db_name] = $this->db->load($db_name);
		}
		return $this->databases[$db_name];
	}
    
    public function get($db_name, $key){
		$db = $this->loadDB($db_name);
        return $db->get($key);
    }
    
    public function set($db_name, $key, $o){
		$db = $this->loadDB($db_name);
		return $db->set($key, $o);
    }

    public function delete($db_name, $key){
		$db = $this->loadDB($db_name);
        return $db->delete($key);
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