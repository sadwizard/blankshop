<? 
class ProductModel{

	public function __construct(){
		$this->connect = new mysqli(DB_HOST , DB_USER , DB_PASSWORD ,DB_NAME);
		$this->connect->set_charset("utf8");
		if(!$this->connect) die('no connect database');

	}	

 	public function get_all_product(){
		  	$result = $this->connect->query('SELECT * FROM products');
		 	$list_product = array();

		 		$i = 0;
		 		while($data = $result->fetch_assoc()){
		 			
		 			 $list_product[$i]['id'] =  $data['id'];
		 			 $list_product[$i]['title'] = $data['title'];
		 			 $list_product[$i]['m_desc'] = $data['m_desc'];
		 			 $list_product[$i]['price'] = $data['price'];
		 			 $list_product[$i]['path_to_img'] = $data['path_to_img'];
		 			 $list_product[$i]['brand'] = $data['brand'];
		 			 $list_product[$i]['category_name'] = $data['category_name'];

		 			$i++;
		 		}
		   	return $list_product;
	}

	public function get_product_by_id($id){
		$id = intval($id);
		$result = $this->connect->query('SELECT * FROM products WHERE id='. $id);

		$prod_item = $result->fetch_assoc();
		return $prod_item;
	}  	

	public function getAllCategory(){
		$query = $this->connect->query('SELECT * FROM category_goods');

		$cat_list = array();
		$i = 0;
		while($data = $query->fetch_assoc()){
			$cat_list[$i]['cat_id'] = $data['cat_id'];
			$cat_list[$i]['cat_name'] = $data['cat_name'];
			$i++;
		}
		return $cat_list;
	}

	public function getSortingCategory($id){
		$id = intval($id);

		$query2 = $this->connect->query("SELECT * FROM products WHERE category_name='". $id ."'");
		// $data2 = $query2->fetch_assoc();

		$list_product = array();
		$i = 0;
		 		while($data2 = $query2->fetch_assoc()){
		 			
		 			 $list_product[$i]['id'] =  $data2['id'];
		 			 $list_product[$i]['title'] = $data2['title'];
		 			 $list_product[$i]['m_desc'] = $data2['m_desc'];
		 			 $list_product[$i]['price'] = $data2['price'];
		 			 $list_product[$i]['path_to_img'] = $data2['path_to_img'];
		 			 $list_product[$i]['brand'] = $data2['brand'];
		 			 $list_product[$i]['category_name'] = $data2['category_name'];

		 			$i++;
		 		}
		   	return $list_product;
	}

	public function deleteFromById($id){
		$id = intval($id);
		$query = $this->connect->query("DELETE FROM products  WHERE id=$id");

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function addProduct($arr = array() , $files = array()){

			$upload_dir =$_SERVER['DOCUMENT_ROOT']. '/inc/upload/prod_img';
			$tmp_name = $files["userfile"]["tmp_name"];
        	$name = $files["userfile"]["name"];

			$pathtoimg = '/inc/upload/prod_img/'. $name;
			$title = $arr['title'];
			$m_desc = $arr['mdesc'];
			$desc = $arr['desc'];
			$cat = $arr['cat'];
			$price = $arr['price'];
			$brand = $arr['brand'];

		
			$query = $this->connect->query("INSERT INTO `products` (`title` , `m_desc` , `full_desc` , `category_name` , `price` , `path_to_img` , `brand`)
			 VALUES ( '".$title."' ,  '".$m_desc."' ,  '".$desc."' , '".$cat."' , '".$price."' ,'".$pathtoimg."' ,'".$brand."')" );		


        	$upload_ok = move_uploaded_file($tmp_name, "$upload_dir/$name");
       
			if($upload_ok ){
				echo true;
			}else{
				echo false;
			}

	}
}