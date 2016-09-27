<? 

class AdminController{
		protected $_model , $tpl , $_model2 ;

		public function __construct(){
			include main_path . '/models/UserModel.php';
			include main_path . '/models/ProductModel.php';
			$this->_model = new UserModel;
			$this->_model2 = new ProductModel;

			$auth = $this->_model->checkAuth();

			if(!$auth){
				header("Location:/");
			}

			$this->tpl = new Template($_SERVER['DOCUMENT_ROOT'].'/inc/tpl/admin/'  , 'admin');
		}

		public function IndexAction(){
			$data = array();
			$data['name_action'] = 'index';
			$this->tpl->render('admin' , $data);
		}

		public function ProductAction(){
			$data['goods'] =  $this->_model2->get_all_product();
			$data['name_action'] = 'prod';			
			$this->tpl->render('products' , $data);
		}

		public function delprodAction($id){
			 $data['hint'] = $this->_model2->deleteFromById($id);
			 if($data['hint']){
			 	$data['goods'] =  $this->_model2->get_all_product();
				$data['name_action'] = 'prod';

				$this->tpl->render('products' , $data);
			 }
		}

		public function AddproductAction(){
			$data = array();
			$data['name_action'] = 'prod';
			$data['cat_list'] = $this->_model2->getAllCategory();
			$this->tpl->render('addproduct' , $data);
		}

		public function AjaxSaveProdAction (){
			$data['status'] = $this->_model2->addProduct($_POST ,$_FILES);
			if($data['status']){
				echo true;
			}else{
				echo false;
			}
		}
}