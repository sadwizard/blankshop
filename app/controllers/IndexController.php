<? 

class IndexController{
		protected $_model , $tpl;

		public function __construct(){
			require_once(main_path . '/models/ProductModel.php');
			$this->_model = new ProductModel;
			$this->tpl = new Template($_SERVER['DOCUMENT_ROOT'].'/inc/tpl/'  , 'main');
			// Bucket::addToBucket(5, 2);
			// Bucket::addToBucket(3, 1);
			//print_r(Bucket::getCardList());
			
		}

		public function IndexAction(){
			$data = array();
			$data['goods'] =  $this->_model->get_all_product();
			$data['cat'] = $this->_model->getAllCategory();
			$data['model_name'] = 'index';
			$this->tpl->render('main' , $data);
		}

		public function ProdAction($param){
			$data['prod'] = $this->_model->get_product_by_id($param);
			$data['model_name'] = 'index';
		
			$this->tpl->render('product' , $data);	
		}

		public function CatAction($id){
			$data['goods'] = $this->_model->getSortingCategory($id);
			$data['cat'] = $this->_model->getAllCategory();
			$data['cat_id'] = $id;
			$data['model_name'] = 'index';
			
			$this->tpl->render('main' , $data);
		}
}