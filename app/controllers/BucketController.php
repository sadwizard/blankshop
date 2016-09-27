<? 
class BucketController{
		private $_bucket , $tpl;

		public function __construct(){

			
		}

		public function getBucketListAction(){
			return Bucket::getCardList();
		}

		public function addBucketListAction(){
				$id = $_POST['addtocard'];
				echo Bucket::addToBucket($id, 1);
				// $referer = $_SERVER['HTTP_REFERER'];
				// header("Location: $referer");
		}

		public function delBucketListAction(){
			$id = $_POST['deltocard'];
			if(Bucket::delToBucket($id)){
				echo true;
			}else{
				echo false;
			}
			// $referer = $_SERVER['HTTP_REFERER'];
			// 	header("Location: $referer");	
		}
}