<?
include_once "includes.php";

class SettingsController{
    private $DB_FILE = "settings";
    private $id = "settings";
	
    function __construct() {
    }
    
    public function load(){
        $db = DB::getInstance();
        return unserialize($db->get($this->DB_FILE,$this->id));
    }
    
    public function save($o){
        $db = DB::getInstance();
        return $db->set($this->DB_FILE,$this->id,serialize($o));
    }
    
    public function delete(){
        $db = DB::getInstance();
        return $db->delete($this->DB_FILE,$this->id);
    }

    public function clearCache(){
        $settings = $this->load();
        $settings->cacheRand = rand();
        $this->save($settings);
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