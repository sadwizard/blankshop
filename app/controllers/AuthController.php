<? 

class AuthController{
		protected $_model , $tpl;

		public function __construct(){
			include main_path . '/models/UserModel.php';
			$this->_model = new userModel;

			$auth = $this->_model->checkAuth();

			if($auth){
				header("Location:/admin/");
			}
			$this->tpl = new Template($_SERVER['DOCUMENT_ROOT'].'/inc/tpl/admin/'  , 'auth');
		}

		public function IndexAction(){
			$data = array();
			$this->tpl->render('auth' ,$data);
		}

		public function LoginAction(){
			$login = '';
			$password = '';

			$error = null;

			$check = $this->_model->checkUser($_POST['login'] , $_POST['password']);

			if($check){
				header('Location:/admin/');
			}else{
				$error[] = 'Неправильный логин или пороль.';
				header('Location:/auth/');
			}
		}
}