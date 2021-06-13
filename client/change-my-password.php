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

<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "not same";
output = false;
}   
return output;
}
</script>

<?php

if (isset($_POST["submit"])) {
    $result = mysqli_query($connect, "SELECT * from users WHERE Id='" . $_SESSION["id"] . "'");
    $row = mysqli_fetch_array($result);
    $ppass = $_POST["currentPassword"]; 
    $cpass = $_POST["confirmPassword"];
    $pass = mysqli_real_escape_string($connect,$_POST["newPassword"]);
    $ppassword = password_hash($pass, PASSWORD_BCRYPT,["cost"=>10]);
    if ($pass == $cpass & password_verify($ppass, $row["password"])) {
        mysqli_query($connect, "UPDATE users set password='" . $ppassword . "' WHERE Id='" . $_SESSION["id"] . "'");

        $message = '<div class="alert alert-success">Password Changed</div>';    
        }
         else
        $message = '<div class="alert alert-danger">Current Password is not correct</div>';
}

?> 
    

<div class="container mt-4">
      
      
       <div class="row">
       <div class="col-md-12 mt-4">
        <nav aria-label="breadcrumb mb-4">
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="account.php">Account</a></li>
    <li class="breadcrumb-item active" aria-current="page">Change My password</li>
  </ol>
</nav>
       <h3 align="center" class="mb-4 mt-4"><b><u>Change Password</u></b></h3>
       </div>
      <form name="frmChange" action="" method="post" enctype="multipart/form-data" class="form-horizontal" onSubmit="return validatePassword()">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>

  <div class="form-row">
    <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Current Password:</div>
        </div>
        <input  autocomplete="new-password" type="password" name="currentPassword" value="" placeholder="Enter Current Password" id="currentPassword" class="form-control form-control-lg">

         <!-- <input autocomplete="off" type="text" name="fname" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter First Name"> -->
      </div>
    </div>
         <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">New Password:</div>
        </div>
        <input  autocomplete="new-password" type="password" name="newPassword" value="" placeholder="Enter New Password" id="newPassword" class="form-control form-control-lg">

         <!-- <input autocomplete="off" type="text" name="lname" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Last Name"> -->
      </div>
    </div>
         <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Confirm Password:</div>
        </div>
        <input type="password" name="confirmPassword" value="" placeholder="Confirm New Password" id="confirmPassword" class="form-control form-control-lg">
         
         <!-- <input autocomplete="off" type="text" name="email" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Email"> -->
      </div>
    </div>
     

  </div>
  <button type="submit" name="submit" class="btn btn-primary" style="font-size:20px;float: right;">Change Password</button>

</form>
      </div>

</div>




 <?php
  include("includes/footer.php");
?>
