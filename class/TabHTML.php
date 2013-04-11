<?
include_once "includes.php";

class TabHTML extends Tab{
    private $html;
	
	public function getFormInclude(){
		return "editFormHTML.php";
	}
	
	public function getHTML(){
		return "<div data-role='content'>".$this->html."</div>";
	}
	
	public function fillDataFromRequest($request){
		parent::fillDataFromRequest($request);
		$this->html = stripslashes($request['html']);
	}
	
	public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }
}
?>