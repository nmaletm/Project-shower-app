<?

class Page{
    private $id;
    private $title;
    private $html;

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