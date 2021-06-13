<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>
    <!--table-->
<div class container>
    <div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Edit Products </h6>
	    </div>
	    <?php 
	    	if(isset($_POST['updatebtn'])){
	    		$id = $_GET["id"];
	    		$product = $_POST["product"];
	    		$price = $_POST["price"];
	    		$description = $_POST["description"];

	    		$query = "UPDATE product_details SET Product='$product', Price='$price', Description='$description' WHERE id='$id' ";
				$query_run = mysqli_query($connection,$query);

			if ($query_run) {
				echo "<div class='alert alert-success'>Product details have been updated</div>";
				
			}else{
				echo "<div class='alert alert-danger'>Product details have NOT been updated</div>";
				
		}
	    	}
	    ?>
	    <div class="card-body">
	    	<?php

				$id = $_GET['id'];
				//echo $id;
				$query = "SELECT * FROM product_details WHERE id=".$id;
				$query_run = mysqli_query($connection, $query);

				foreach ($query_run as $row){
					?>
							<h3 align="center"><img src="../picture/<?php echo $row['Product_Image']?>" style="width: 300px; height: 300px;"></h3>
						<form action="edit_pdt.php?id=<?php echo $id; ?>" method="POST">
					    	<div class="form-group">
					            <label>Product</label>
					            <input type="text" name="product" value="<?php echo $row['Product']; ?>" class="form-control">
					        </div>
					        <div class="form-group">
					            <label>Price</label>
					            <input type="text" name="price" value="<?php echo $row['Price']; ?>" class="form-control">
					        </div>
					        <div class="form-group">
					            <label>Description</label>
					            <input type="text" name="description" value="<?php echo $row['Description']; ?>" class="form-control">
                            </div>
                         <!--    <div class="form-group">
					            <label>Quantity</label>
					            <input type="number" name="edit_quantity" value="<?php echo $row['']?>" class="form-control"placeholder="Enter Quantity">
					        </div> -->

					        <a href="viewproducts.php" class="btn btn-danger"> CANCEL </a>
					        <button type="submit" name="updatebtn" class="btn btn-primary"> Update</button>
				        </form>


	        <?php
				}


			?>
	    </div>
    </div>
</div>





<?php 
include('includes/scripts.php');
include('includes/footer.php');
?> 