<?
include_once "includes.php";

class Tab{
    private $id;
    private $title;
    private $html;
    private $background;
	
	public function getFormInclude(){
		return "editFormHTML.php";
	}
	
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