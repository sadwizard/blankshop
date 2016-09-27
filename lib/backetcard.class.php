<?
class Bucket {
	

	public static function getCardList(){

		require_once(main_path . '/models/ProductModel.php');
		$model = new ProductModel;

		$return_list = array();
		$full_cost = 0;

		if(!isset($_SESSION['card'])){
			$return_list = array('count_prod'=>0);
		}else{
			
			foreach($_SESSION['card'] as $key=>$value){
				$content = $model->get_product_by_id($key);
				$return_list['data'][] = array('text'=>$content ,'count'=>$value);
				$full_cost = $full_cost + intval($content['price']) * $value;
			}
			$return_list['count_prod'] = count($return_list['data']); 
			$return_list['full_cost'] = $full_cost; 
		}
			return json_encode($return_list);
	}

	public static function getBucketList(){
		print_r($_SESSION['card']);
	}

	public static function addToBucket($id , $count=1){

			$product = array();
			$result = array();

			if(isset($_SESSION['card'])){
				$product = $_SESSION['card'];
			}

			if(array_key_exists($id , $product)){
				 $_SESSION['card'][$id] += 1;
				 $result['data'] = true;
			}else{

				$_SESSION['card'][$id] = 1;

				require_once(main_path . '/models/ProductModel.php');
				$model = new ProductModel;
				$result['data'] = $model->get_product_by_id($id);	
			}
			return json_encode($result);
	}

	public static function delToBucket($id){
		unset($_SESSION['card'][$id]);
		return true;
	}
	
	public static function is_prod($id){
		if(empty($_SESSION['card'])){
			echo false;
		}else{
			foreach($_SESSION['card'] as $key=>$value){
				if($id == $key){
					echo 'active';
					break;
				}
			}
		}
	}

	public static function full_cost($arr){

	}
}

