<?php
  include("includes/header.php");
	// session_start();
  if($_SESSION["Phone_Number"]) {
      $firstname = $_SESSION["firstname"];
      $lastname = $_SESSION["lastname"];
      $userID = $_SESSION["id"];
      $phone_number = $_SESSION['Phone_Number'];
}
?>



	 
	   
<div class="container">
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="account.php">Account</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Cart</li>
  </ol>
</nav>
		<h1 class="page-header text-center">Cart Details</h1>
	<div class="row">
		<div class="col-sm-12 col-sm-offset-2">
			<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>
			<div class="table-responsive">
				<form method="POST" action="orders.php">
					
			<table class="table table-bordered table-striped">
				<?php
					$counter = 1;
					?>
				<thead>
					<th>#</th>
					<th>Item Image</th>
					<th>Name</th>
					<th>Price</th>
					<th style="width: 150px !important;">Quantity</th>
					<th>Subtotal</th>
					<th>Action</th>
				</thead>
				<tbody class="text-center">
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
						$sql = "SELECT * FROM product_details WHERE id IN (".implode(',',$_SESSION['cart']).")";
						$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								<tr>
									<td><?php echo $counter; ?></td>
									<td style="width: 150px; height: 150px;">
										<img src="../picture/<?php echo $row['Product_Image']; ?>" style="height: 125px;width: 125px;">
									</td>
									<td><?php echo $row['Product']; ?></td>

									<td><?php echo number_format($row['Price'], 2); ?></td>
									<?php  
									$product = $row['Product'];
									$p = $row['Price'];
									$image = $row["Product_Image"];
									?>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><input type="number" min="1" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
									<?php $qty = $_SESSION['qty_array'][$index]; ?>
									<td><?php echo number_format($_SESSION['qty_array'][$index]*$row['Price'], 2); ?></td>
									<?php $total += $_SESSION['qty_array'][$index]*$row['Price']; ?>
									<td>
										<a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
									</td>
									
									<input type="hidden" name="product[]" value="<?php echo $product; ?>">
									<input type="hidden" name="id[]" value="<?php echo $row["id"]; ?>">
			<input type="hidden" name="image[]" value="<?php echo $image ?>">	
			<input type="hidden" name="qty[]" value="<?php echo $qty ?>">
			<input type="hidden" name="price[]" value="<?php echo $p; ?>">
								</tr>
								<?php
								$index ++;
								$counter++;
							}
						}
						else{
							?>
							<tr>
								<td colspan="4" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						}

					?>
					<tr>
						<td colspan="4" align="right"><b>Total</b></td>
						<td><b><?php echo number_format($total, 2); ?></b></td>
						<!-- <input type="hidden" name="tot" value="<?php echo $total?>"> -->
						<input type="hidden" name="total" value="<?php echo $total?>">
					</tr>
				</tbody>
			</table>
			
			<a href="index.php" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Back</a>
			<!-- <a href="save_cart.php?id=save" class="btn btn-success">Save Changes</a> -->
			
			<button type="submit" class="btn btn-success" name="save">Save Changes</button>
			<a href="clear_cart.php" class="btn btn-danger"><span class="fa fa-trash"></span> Clear Cart</a>
			
			<button type="submit" class="btn btn-success" name="checkout"><span class="fa fa-check"></span> Checkout</button>
			<!-- <a href="orders.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a> -->
			</form>
			</div>
			
		</div>
	</div>
</div>
</div>

<?php
  include("includes/footer.php");
?>
