<? 

class PostsController{
		protected $_model , $tpl;

		public function __construct(){
			//include main_path . '/models/PostsModel.php';
			//$this->_model = new ProductModel;
			$this->tpl = new Template($_SERVER['DOCUMENT_ROOT'].'/inc/tpl/'  , 'main');
		}

		public function IndexAction(){
			//$data = $this->_model->get_all_product();
			$data['model_name'] = 'blog';
			$this->tpl->render('posts' , $data);
		}

		// public function TestAction($param){
		// 	$data2 = $this->_model->get_product_by_id($param);

		// 	$this->tpl->render('product' , $data2);	
		// }
}