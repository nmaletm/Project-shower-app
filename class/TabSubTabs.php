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
	
	public function getHTML(){
		$subTabs = json_decode($this->subTabs);
		// Add content
		$res = "";
		foreach($subTabs as $tab){
			$res .= "<div data-role='content' id='".$tab->id."'>".$tab->text."</div>";
		}
		// Add the subtabs
		$res .= "<div data-role='prefooter' data-position='fixed'><div data-role='navbar'  data-tap-toggle='false'><ul>";
		$first = 1;
		foreach($subTabs as $tab){
			$res .= "<li><a href='#' data-content='".$tab->id."' data-icon='grid' data-theme='a'  data-role='prefooter-tab' ";
			$res .= "data-background='".$tab->background."' class='background-change ".(($first)?"ui-btn-active":"")."'>".$tab->title."</a></li>";
			$first = 0;
		}
		$res .= "</ul></div></div>";
		return $res;
	}
	
	public function fillDataFromRequest($request){
		parent::fillDataFromRequest($request);
		$this->subTabs = stripslashes(nl2br($request['subTabs']));
	}
	
	public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }
}
?>
