<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>

 <div class="container">
    <h3 class="text-center">Admin Profile</h3>
 	<?php
if (isset($_POST['updatebtn'])) {
	$userID = $_SESSION["id"];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "UPDATE admins SET firstname='$firstname',lastname='$lastname', email='$email' WHERE id='$userID'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		echo "<div class='alert alert-success'>Your details have been updated</div>";

	}else{
		echo "<div class='alert alert-danger'>Your details have NOT been updated</div>";

	}

}
?>

 	<form action="profile.php?id=<?php echo $userID; ?>" method="POST">
 		<?php 
 			// $id = $_SESSION["id"]; 
 			$sql = "SELECT * FROM admins WHERE id=".$userID;
 			$result = mysqli_query($connection,$sql);
 			while($row = mysqli_fetch_array($result)){
 		?>
            <div class="form-group">
                <label><b>Firstname</b></label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $row["firstname"]; ?>">
            </div>
            <div class="form-group">
                <label><b>Lastname</b></label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $row["lastname"]; ?>">
            </div>
            <div class="form-group">
                <label><b>Email</b></label>
                <input type="email" name="email" class="form-control" value="<?php echo $row["email"]; ?>">
            </div>
            <div class="form-group">
                <label><b>Password</b></label>
                <input type="password" name="password" class="form-control">
            </div>
            
            <?php 
        }
        ?>
        <input type="submit" name="updatebtn" class="btn btn-primary" value="Update" style="float: right;">
        </form>

 </div>


<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>