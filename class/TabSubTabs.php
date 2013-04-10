<?
include_once "includes.php";

/*
//print_r(json_decode($tab->subTabs));	

*/
class TabSubTabs extends Tab{
    private $subTabs;

	public function getFormInclude(){
		return "editFormSubTabs.php";
	}
	
	public function fillDataFromRequest($request){
		parent::fillDataFromRequest($request);
		$this->subTabs = stripslashes($request['subTabs']);
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