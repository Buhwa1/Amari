<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>
<div class="container">
	<h3 align="center">Admin List</h3>
<?php
if(isset($_POST["deletebtn"])){
	$id = $_GET['id'];

	$query = "DELETE FROM admins WHERE id=".$id;
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
		echo "<div class='alert alert-success'>User DELETED</div>";
	
	}else{
		echo "<div class='alert alert-danger'>User NOT deleted</div>";
	}
}
?>

<div class="table-responsive">
            
            <?php
                $query = "SELECT * FROM admins";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
            ?>

            <table class="table table-bordered table-dark table-stripped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Firstname </th>
                        <th> Lastname </th>
                        <th> Email </th>
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
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>

                        <td>
                            <form action="viewadmins.php?id=<?php echo $row['id']; ?>" method="POST">
                                <button type="submit" name="deletebtn" class="btn btn-danger"> DELETE </button>
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