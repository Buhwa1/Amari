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

//select logical information about the user from the database and echoing them in the value fields in the form
$user = $_GET["id"];
$sql = "SELECT * FROM users WHERE id=".$user;
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
                $Firstname = $row["firstname"];
                 $Lastname= $row["lastname"];
                 $Phonenumber=$row["Phone_Number"];
                 $Location =$row["Location"];
        
    }
} else {
    echo "0 results";
}

?>


      
  




<div class="container mt-4">
   
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="account.php">Account</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit My Account Information</li>
  </ol>
</nav>
      <h3 align="center">Edit My Account Information Form</h3>
      <h5 align="center" >You can edit your account details here.</h5>
      <form class="mt-4"  action="edit-my-account-information.php?id=<?php echo $userID; ?>" method="POST">
      <?php 

      if(isset($_POST["submit"])){
        $firstname = mysqli_real_escape_string($connect,$_POST["firstname"]);
        $lastname = mysqli_real_escape_string($connect,$_POST["lastname"]);
        $location = mysqli_real_escape_string($connect,$_POST["location"]);
        $phonenumber = mysqli_real_escape_string($connect,$_POST["phonenumber"]);


        if($firstname == "" | $lastname == "" | $location == "" | $phonenumber == ""){
        echo "<div class='alert alert-danger text-center' role='alert'>
        <strong>All fields must be filled to complete registration.</strong>
      </div>";
      }

else{
  $query = "SELECT * FROM users WHERE Phone_Number =".$phonenumber." AND NOT id=".$user." LIMIT 1";
    $result = mysqli_query($connect, $query) or exit(mysqli_errno($connect));


if(mysqli_num_rows($result) > 0){
    echo "<div class='alert alert-danger' role='alert'>
                <strong>Phone number already registered.</strong>
              </div>";
}

else{

  $query = "UPDATE users SET firstname='$firstname',lastname='$lastname', Phone_Number='$phonenumber', Location='$location' WHERE id=".$user;
  
  if(mysqli_query($connect,$query)){
    //alert is here
    echo '<div class="alert alert-success">Information  Updated.</div>';
  }
     }
   }
 }
  ?>

        
  <div class="form-row">
    
    <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">FIRST NAME</div>
        </div>
         <input autocomplete="off" type="text" name="firstname" value="<?php echo $Firstname; ?>" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter First Name">
      </div>
    </div>
         <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">LAST NAME</div>
        </div>
         <input autocomplete="off" type="text" name="lastname" value="<?php echo $Lastname; ?>" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Last Name">
      </div>
    </div>
         
        <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">PHONE NUMBER</div>
        </div>
         <input autocomplete="off" type="text" name="phonenumber"value="<?php echo $Phonenumber;?>" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Phone Number">
      </div>
    </div>
         <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">LOCATION</div>
        </div>
         <input autocomplete="off" type="text" name="location" value="<?php echo $Location;?>" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Location">
      </div>
    </div>

  </div>

  
  <button type="submit" name="submit" class="btn btn-primary" style="font-size:20px; float: right;">Update information</button>
  </form>
  </div>

  

  <!-- CONTENT ENDS -->



  <!-- FOOTER BEGINS -->

  <?php
include ("includes/footer.php");
?>