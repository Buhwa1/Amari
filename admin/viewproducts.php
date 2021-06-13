<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>
 	<div class="container">
        <h1 align="center" class="mb-4"><u><b>Product List</b></u></h1>
 	<?php	 
 	if (isset($_POST['delete_pdtbtn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM product_details WHERE id=".$id;
	$result = mysqli_query($connection,$query);

	if ($result) 
	{
		echo "<div class='alert alert-success'>Product DELETED</div>";

	}else{
		echo "<div class='alert alert-danger'>Product NOT deleted</div>";

	}
}

?>
 		<div class="table-responsive">
            
            <?php
               
                $query = "SELECT * FROM product_details";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
            ?>

            <table class="table table-bordered table-dark table-stripped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Image </th>
                        <th> Product </th>
                        <th> Price </th>
                        <th> Description </th>
                        <th> EDIT </th>
                        <th> Delete </th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    if(mysqli_num_rows($query_run) > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                    <tr>
                        <td><?php echo $counter ?></td>
                        <td><img src="../picture/<?php echo $row['Product_Image']; ?>" style="width: 200px; height: 200px;"></td>
                        <td><?php echo $row['Product']; ?></td>
                        <td><?php echo $row['Price']; ?></td>
                        <td><?php echo $row['Description']; ?></td>

                        
                        <td>
                            <form action="edit_pdt.php?id=<?php echo $row['id']; ?>" method="POST">                             
                                <button type="submit" name="editpdt_btn" class="btn btn-success"> EDIT </button>
                            </form>
                        </td>
                        <td>
                            <form action="viewproducts.php" method="POST">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_pdtbtn" class="btn btn-danger"> DELETE </button>
                            </form>
                        </td>
                    </tr>

                    <?php
                        $counter++;}

                    }
                    else{
                        echo "no record found";
                    }                                                                                          
                    ?>
                </tbody>
            </table>
        </div>
 	</div>

 


 <?php 
include('includes/scripts.php');
include('includes/footer.php');
?>