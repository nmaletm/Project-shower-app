<?
include_once "includes.php";

abstract class Tab{
    protected $id;
	protected $order;
    protected $title;
    protected $background;
    protected $icon;
	
	abstract public function getFormInclude();
	abstract public function getHTML();

	
	public function fillDataFromRequest($request){
		$this->id = stripslashes($request['id']);
		$this->title = stripslashes($request['title']);
		$this->background = stripslashes($request['background']);
		$this->icon = stripslashes($request['icon']);
	}
	
    function __construct() {
	
    }
    
    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }
		
	public function generateRandomId($length = 20) {
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		$this->id = $randomString;
	}
}
?>