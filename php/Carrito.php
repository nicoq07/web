<?php
session_start();
//Alta
if (isset($_POST['pid'])) {
	$pid = $_POST['pid'];
	$pquantity = $_POST['pquantity'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => $pquantity));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
			$i++;
			while (list($key, $value) = each($each_item)) {
				if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + $pquantity)));
					$wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
	       if ($wasFound == false) {
	       	array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => $pquantity));
	       }
	   }
	   var_dump($_SESSION["cart_array"]); 
	}
//Baja
	if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
		$i = 0;
		$key_to_remove = $_POST['index_to_remove'];
		foreach ($_SESSION["cart_array"] as $each_item) { 
			while (list($key, $value) = each($each_item)) {
				if ($key == "item_id" && $value == $key_to_remove) {
					unset($_SESSION["cart_array"]["$i"]);
					sort($_SESSION["cart_array"]);
				  } // close if condition
		      } // close while loop
		      $i++;
	} // close foreach loop
	var_dump($_SESSION["cart_array"]);
}
//Modificación
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
    // execute some code
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		$i++;
		while (list($key, $value) = each($each_item)) {
			if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
				array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  } // close if condition
		      } // close while loop
	} // close foreach loop
	var_dump($_SESSION["cart_array"]); 
}
?>