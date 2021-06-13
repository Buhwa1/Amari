<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>

<div class="container">
    <h3 align="center">Register Admin</h3>
    <?php
//      $firstname = $lastname = $email = $pass = $location = $number = "";
      if(isset($_POST["register"])){
    
    $firstname = mysqli_real_escape_string($connection,$_POST["firstname"]);
    $lastname = mysqli_real_escape_string($connection,$_POST["lastname"]);
    $email = mysqli_real_escape_string($connection,$_POST["email"]);
    $pass = mysqli_real_escape_string($connection,$_POST["password"]);
    $password = password_hash($pass, PASSWORD_BCRYPT,["cost"=>10]);
    $query = "SELECT * FROM admins WHERE email = '$email' LIMIT 1 ";
    $result = mysqli_query($connection, $query) or exit(mysqli_errno($connection));

if(mysqli_num_rows($result) > 0){
    echo "<div class='alert alert-danger' role='alert'>
                <strong>Email already taken.</strong>
              </div>";
}
 else {
     $sql = "INSERT INTO admins(firstname,lastname,email,password,Date_time) "
             . "VALUES('$firstname','$lastname','$email','$password',NOW())";
//     $stmtinsert = 
     if(mysqli_query($connection, $sql)){
         echo "<div class='alert alert-success' role='alert'>
                Succesfully Registered
              </div>";
     }
}
      }
?>
    
    <form action="" method="POST" autocomplete="off">

            <div class="form-group">
               <b> <label>Firstname</label></b>
                <input type="text" autocomplete="off" name="firstname" class="form-control"placeholder="Enter Firstname">
            </div>
            <div class="form-group">
                <b><label>Lastname</label></b>
                <input type="text" autocomplete="off"  name="lastname" class="form-control"placeholder="Enter Lastname">
            </div>
            <div class="form-group">
                <b><label>Email</label></b>
                <input type="email" autocomplete="new-password" name="email" class="form-control"placeholder="Enter Email">
            </div>
            <div class="form-group">
               <b> <label>Password</label></b>
                <input autocomplete="new-password" name="password" type="password" class="form-control" id="inlineFormInputGroup" placeholder="Enter Password">
            </div>
            <input type="submit" name="register" class="btn btn-primary" value="Register" style="float: right;">
        </form>
</div>
      



<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    