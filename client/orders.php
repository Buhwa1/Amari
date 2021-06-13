<?php
  include("includes/header.php");
// session_start();
 if(!$_SESSION["Phone_Number"]) {

  header('Location:login.php');
}
else{
      $firstname = $_SESSION["firstname"];
      $lastname = $_SESSION["lastname"];
      $userID = $_SESSION["id"];
      $phone_number = $_SESSION['Phone_Number'];
      $location = $_SESSION['Location'];
}

	if(isset($_POST['save'])){
		foreach($_POST['indexes'] as $key){
			$_SESSION['qty_array'][$key] = $_POST['qty_'.$key];
		}

		$_SESSION['message'] = 'Cart updated successfully';
		header('location: view_cart.php');
	}



	if (isset($_POST["cancel"])) {
		header("Location:view_cart.php");
			}
?>



	<div class="container">

		<?php
      if(isset($_SESSION["Phone_Number"])){
        
          echo '
          <h4 align="center">Confirm your order details before placing the order.</h4>
        	

        ';
      }
    ?> 
		<?php
		if(isset($_POST["order"])) {
			
			// $loct = $_POST["loca"];
			$image = $_POST["image"];
			$product = $_POST["product"];
			$price = $_POST["price"];
			$id = $_POST["id"];
			$quantity = $_POST["quantity"];
			$total = $_POST["total"];	
			$payment = $_POST["payment"];
			date_default_timezone_set("Uganda/Kampala");
			$date = date('h:i:sa d-m-Y');
		

					$conn = new mysqli('localhost', 'root', '', 'amari');

// 							//INSERT INTO ORDER TABLES
					$sql1 = "INSERT INTO orders(userID,firstname,lastname,Phone_Number,payment_method,total,Location,created) VALUES (?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql1);
	    $stmt->bind_param("isssssss",  
                        $userID,
                        $firstname,
                        $lastname,
                        $phone_number,
                        $payment,
                        $total,
                        $location,
                        $date          
                    );
    $stmt->execute();
    // if ($stmt->execute()) {
    	  		$last_id = $conn->insert_id;
   				 $sql2 = "INSERT INTO order_contents(userID,orderID,ProductID,Product,Quantity,Price,Product_Image) VALUES (?,?,?,?,?,?,?)";
				$stmt1 = $conn->prepare($sql2);
				foreach ($product as $i => $n){
    			$stmt1->bind_param("iiisiss", 
    					$userID, 
                        $last_id,
                        $id[$i],
                        $product[$i],
                        $quantity[$i],
                        $price[$i],
                        $image[$i]          
                    );

    			$stmt1->execute();	
}
    				echo '<div class="alert alert-success">Your order has been confirmed successfully.</div>';
    			// }
    			// else
    			// {
    			// 	echo '<div class="alert alert-danger">Your order has NOT been placed.</div>';
    			// }
		}

		?>
		
		
			
					<?php		
				
				if(isset($_POST['checkout'])){
				 if(!isset($_SESSION["Phone_Number"])){
				 // if(){
				

		echo "<h2 align='center'>Please Login to begin placing orders. <a href='login.php'>Login</a></h2>";
	}
}
	if(isset($_POST['checkout']) && isset($_SESSION["Phone_Number"])){
// 		$conn = new mysqli('localhost', 'root', '', 'amari');
// 		$sql = "INSERT INTO new (product, price, total) VALUES (?,?,?)";
// 	$stmt = $conn->prepare($sql);

		// $index = 0;
 	// 					if(!isset($_SESSION['qty_array'])){
 	// 						$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 	// 					}
?>
				<div class="container">
					<form method="POST" action="">
			<div class="row">
					

  					<div class="col-md-12 mt-4 text-center">
  						<div class="jumbotron bg-info h-100 text-center">
  							<h3 align="center" class="mb-4">Payment and order details</h3>

					   <div class="form-check form-check-inline col-md-6">
					  <input class="form-check-input" type="radio" name="payment" style="width: 20px; height: 20px;" value="Cash on delivery" checked>
					  <label class="form-check-label ml-2" for="exampleRadios1">
					      Cash on delivery 
					  </label>
					</div>
					<br>

					<div class="form-check form-check-inline col-md-6 text-center">
					  <input class="form-check-input form-control-lg" type="radio" style="width: 20px; height: 20px;" name="payment" value="Mobile Money">
					  	<label class="form-check-label ml-2" for="exampleRadios1">
					    Mobile Money
					  </label>
					</div>
					<b><h3 align="center">Product(s):</h3></b>
									
							<?php 
					foreach ($_POST['product'] as $i => $n){
					                        echo "<h5 align='center'>".$n." [";
					                       	echo $_POST['qty'][$i]."]</h5>";
					                       	?>
					                       	<input type="hidden" value="<?php echo $n ;?>" name="product[]">
					                       	<input type="hidden" value="<?php echo $_POST['qty'][$i] ;?>" name="quantity[]">
					                       	<input type="hidden" value="<?php echo $_POST['image'][$i] ;?>" name="image[]">
					                       	<input type="hidden" value="<?php echo $_POST['price'][$i] ;?>" name="price[]">
					                       	<input type="hidden" value="<?php echo $_POST['id'][$i] ;?>" name="id[]">
					                       	<?php


					}
					$total = $_POST["total"];


											?>

											<h4 align="center">Total = <b>UGX <?php echo number_format($total, 2); ?></b></h4>
												<input type="hidden" value="<?php echo $total ;?>" name="total">
											<input type="submit" name="cancel" class="btn btn-danger" value="Cancel order">	
											<input type="submit" name="order" class="btn btn-success" value="Confirm order">
											<?php
										}
											?>
  						</div>
  						</div>

  						
					

			</div>
			</form>

</div>
<?php
  include("includes/footer.php");
?>