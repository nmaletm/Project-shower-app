<?
include_once "includes.php";

class TabController{
    private $DB_FILE = "tab";
    
    function __construct() {
    }
    
    public function load($id){
        $db = DB::getInstance();
        return unserialize($db->get($this->DB_FILE,$id));
    }
    
    public function save($o){
        $db = DB::getInstance();
        return $db->set($this->DB_FILE,$o->id,serialize($o));
    }
    
    public function delete($id_pregunta){
        $db = DB::getInstance();
        return $db->delete($this->DB_FILE,$id);
    }
    
	public function getAll(){
		
		$db = DB::getInstance();
		$keys = $db->getKeys($this->DB_FILE);
		$res = array();
		foreach($keys as $key){
			array_push($res, unserialize($db->get($this->DB_FILE,$key)));
		}
		return $res;

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