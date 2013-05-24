<?
include_once "includes.php";

class Settings{
    protected $name;
	protected $url;
    protected $iOS;
    protected $icon;
    protected $iconPrecomposed;
    protected $splashscreen;
    protected $cssInclude;
	
	
	public function fillDataFromRequest($request){
		$this->name = stripslashes($request['name']);
		$this->url = stripslashes($request['url']);
		$this->iOS = stripslashes($request['iOS']);
		$this->icon = stripslashes($request['icon']);
		$this->iconPrecomposed = stripslashes($request['iconPrecomposed']);
		$this->splashscreen = stripslashes($request['splashscreen']);
		$this->cssInclude = stripslashes($request['cssInclude']);
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