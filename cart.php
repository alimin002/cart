
<?php
  /**solusi menggunakan pemrograman prosedural**/
 $cart=[];
 $row=0;
	
  function addProduct($product_code,$qty){
		//stuck
		//array_push($cart,$product_code,$qty);
		//echo $product_code; 
		global $row;
		global $cart;
		$row ++;
		$cart[$row]=array("product_code"=>$product_code,"qty"=>$qty);
	  return $cart;
		
	}
	
	function showCart($array){
		
		$unique = array_map("unserialize", array_unique(array_map("serialize", $array)));
		//array_map("unserialize", array_unique(array_map("serialize", $input)));
		$arr_sum=array();
		$sum=0;
		$i=0;
		
		foreach($unique as $key=>$values){
		   //echo $unique=$values["product_code"];
			 foreach($array as $sub_key=>$sub_values){
				 if($values["product_code"]==$sub_values["product_code"]){
					 $sum = $sum + $sub_values["qty"];
					 
				 }
				
			 }
			  $arr_sum[$values["product_code"]]=$sum;
				//array_push($sum)
				$i++;
				$sum=0;
		}
		
		$result = array_values(array_column( $array , null, 'product_code' ));
		$result_sum=array_values(array_column( $arr_sum , null, 'product_code' ));
		$y=0;
		
		
		//echo "<pre>";
			//print_r(array_unique($result_sum));
		//echo "</pre>";
		
		foreach($result as $key=>$values){
			echo $values["product_code"]."(".$result_sum[$y].")"; 
			echo "</br>";
			$y++;
		}
		
	}
	
	function removeProduct($product_code){
		global $cart;
		
		for($i=1; $i<= count($cart)-1; $i++){
			if($product_code==$cart[$i]["product_code"]){
				 unset($cart[$i]);
				 //unset($cart[$i]);
			}
			
		}
		
	
	}
	
	addProduct("prod4",6);
	addProduct("prod4",6);
	addProduct("prod3",7);
	addProduct("prod3",3);
	addProduct("prod3",1);
	addProduct("prod2",8);
	removeProduct("prod4",6);
	showCart(addProduct("prod1",10));
	
?>