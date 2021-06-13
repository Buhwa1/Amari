<?php
  include("includes/header.php");
    if(!$_SESSION['Phone_Number']) {

  header('Location:login.php');
}
else{
      $firstname = $_SESSION["firstname"];
      $lastname = $_SESSION["lastname"];
      $userID = $_SESSION["id"];
      $phone_number = $_SESSION['Phone_Number'];
}
?>

<div class="container">
	<h1 align="center" class="mt-4 mb-4">Order History</h1>
	<div class="row">
    <div class="col-sm-12 col-sm-offset-2">
	<div class="table-responsive">
					<?php
					$counter = 1;
					?>
			<table class="table table-bordered table-striped table-hover table-dark">
				<thead>
					<th>#</th>
					<th>No. of items</th>
					<th>Product</th>
					<th>Price</th>
					<th style="width: 30px;">Quantity</th>
				</thead>
				<tbody>
					<?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
						$conn = new mysqli('localhost', 'root', '', 'amari');
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						$sql = "SELECT order_contents.Quantity, product_details.Product, product_details.Price,product_details.Product_Image
						FROM order_contents
						INNER JOIN product_details ON order_contents.ProductID=product_details.id WHERE userID=".$userID;
						$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								<tr>
									<td style="width: 50px; height: auto;"><?php echo $counter; ?></td>
									<td style="width: 50px; height: auto;">
										<img src="../picture/<?php echo $row['Product_Image']; ?>" style="height: 100px;width: 100px;">
									</td>
									<td style="width: 50px; height: auto;"><?php echo $row['Product']; ?></td>

									<td style="width: 50px; height: auto;"><?php echo number_format($row['Price'], 2); ?></td>

									<td><input type="number" style="width: 50px;" disabled class="form-control" value="<?php echo $row['Quantity']; ?>"></td>
								</tr>
								<?php
								$index ++;
								$counter++;
							}
						}
						else{
							?>
							<tr>
								<td colspan="4" class="text-center">No previous order history.</td>
							</tr>
							<?php
						}

					?>

				</tbody>
			</table>

			</div>
		</div>
	</div>
</div>

<?php
  include("includes/footer.php");
?>