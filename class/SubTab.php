<?
include_once "includes.php";

class SubTab{
    private $id;
    private $title;
    private $text;
    private $background;

    function __construct() {
	
    }
    
    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }
}
?>