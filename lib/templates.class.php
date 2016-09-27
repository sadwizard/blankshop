<?

class Template {
	protected $path , $default;

	public function __construct($path_to_tmp , $default_tmp){

		$this->path = $path_to_tmp;
		$this->default = $default_tmp;

	}
	 
	 public function render($tpl , $data){
	 	$this->data = $data;
	 	//include $this->path . $this->default . '.php';
	 	include $this->path. $tpl . '.php';
	 }
}