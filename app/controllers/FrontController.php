<? 

class FrontController {

	protected $_controller , $_action , $_params , $_body ,$_model;
	static $_instance;

	public static  function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
			return self::$_instance;
		}
	}

	private function __construct(){
		$request = $_SERVER['REQUEST_URI'];
		$splits = explode('/' , trim($request , '/'));
		// controller
		$this->_controller = !empty($splits[0]) ? ucfirst($splits[0]).'Controller' : 'IndexController';	
		// action
		$this->_action = !empty($splits[1]) ? ucfirst($splits[1]).'Action' : 'IndexAction';
		// params
		if(!empty($splits[3])){
			$keys = $values = array();
				for($i=2 , $cnt = count($splits); $i<$cnt; $i++){
					if($i % 2){
						$values[] = $splits[$i];
					}else{
						$keys[] = $splits[$i];
					}
				}
					$this->_params = array_combine($keys , $values);
		}

	}

	public function run(){

		 //echo $this->_controller . ' <br> ' . $this->_action;

		 	$mainCtrl = main_path . '/controllers/' .$this->_controller .'.php';
		 	
		 if(file_exists($mainCtrl)){
		 	include $mainCtrl;
				if(method_exists($this->_controller , $this->_action)){
					$instance = new $this->_controller();
 
					$mainAction = $this->_action;
					if($this->_params){
						$mainParams = $this->_params;
						call_user_func_array(array($instance , $mainAction) ,$mainParams);
					}else{
						$instance->$mainAction();
					}
		 		}else{
		 			echo '<br>method dont exist';
		 		}
		 }else{
		 	echo '<br>controller don t exist';
		 }
	}
}