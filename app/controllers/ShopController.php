<? 

class ShopController{
		protected $_model , $tpl;

		public function __construct(){
			include main_path . '/models/ProductModel.php';
			$this->_model = new ProductModel;
			$this->tpl = new Template($_SERVER['DOCUMENT_ROOT'].'/inc/tpl/'  , 'shop');
		}

		public function IndexAction(){
			$data = array();
			$data['goods'] =  $this->_model->get_all_product();
			$data['cat'] = $this->_model->getAllCategory();
			$data['model_name'] = 'shop';
			$this->tpl->render('shop' , $data);
		}

		public function ProdAction($param){
			$data['prod'] = $this->_model->get_product_by_id($param);
			$data['model_name'] = 'shop';
			$this->tpl->render('product' , $data);	
		}

		public function CatAction($id){
			$data['goods'] = $this->_model->getSortingCategory($id);
			$data['cat'] = $this->_model->getAllCategory();
			$data['cat_id'] = $id;
			$data['model_name'] = 'shop';
			$this->tpl->render('shop' , $data);
		}
}