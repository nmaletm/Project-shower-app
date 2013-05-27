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

		$preload_images = array();
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
			array_push($preload_images, $tab->background);
		}
		$res .= "</ul></div></div>";

		if(count($preload_images)){
			$res .= "<script>$(document).ready(function(){\$(['".implode("','",$preload_images)."']).preload();});</script>";
		} 
		return $res;
	}
	
	public function getCacheURLFiles(&$array){
		$subTabs = json_decode($this->subTabs);
		foreach($subTabs as $tab){
			array_push($array, $tab->background);
		}
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
