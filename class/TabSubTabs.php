<?
include_once "includes.php";

class TabSubTabs extends Tab{
    private $subTabs;

	public function getFormInclude(){
		return "editFormSubTabs.php";
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