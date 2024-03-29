  <?php
include ('includes/header.php');
?>

  <!-- CONTENT BEGINS -->
  <div class="container mt-4">
      <h3 align="center" class="mt-4">Registration Form</h3>
      <h5 align="center" class="mt-4">Please enter your registration details to begin placing orders.</h5>
      <?php

      if(isset($_POST["submit"])){
        $firstname = mysqli_real_escape_string($connect,$_POST["fname"]);
        $lastname = mysqli_real_escape_string($connect,$_POST["lname"]);
        $pass = mysqli_real_escape_string($connect,$_POST["password"]);
        $location = mysqli_real_escape_string($connect,$_POST["location"]);
        $number = mysqli_real_escape_string($connect,$_POST["number"]);
        // $date = now();
        if($firstname == "" | $lastname == "" | $pass == "" | $location == "" | $number == ""){
        echo "<div class='alert alert-danger text-center' role='alert'>
        <strong>All fields must be filled to complete registration.</strong>
      </div>";
      }
      else{
    
    $pasword = password_hash($pass, PASSWORD_BCRYPT,["cost"=>10]);
    
    $query = "SELECT * FROM users WHERE Phone_Number ='$number' LIMIT 1 ";
    $result = mysqli_query($connect, $query) or exit(mysqli_errno($connect));

if(mysqli_num_rows($result) > 0){
    echo "<div class='alert alert-danger' role='alert'>
                <strong>Phone number already registered.</strong>
              </div>";
}
 else {
     $sql = "INSERT INTO users(firstname,lastname,password,Location,Phone_Number,Date_time)"
             . "VALUES('$firstname','$lastname','$pasword','$location','$number',now())";
             
     if(mysqli_query($connect, $sql)){
         echo "<div class='alert alert-success' role='alert'>
                Succesfully Registered, proceed to login.
              </div>";
     }
}
      }
    }
?>
      <form class="mt-4" autocomplete="off" action="register.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">FIRST NAME</div>
        </div>
         <input autocomplete="off" type="text" name="fname" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter First Name">
      </div>
    </div>
         <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">LAST NAME</div>
        </div>
         <input autocomplete="off" type="text" name="lname" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Last Name">
      </div>
    </div>

        <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">PASSWORD</div>
        </div>
        <input autocomplete="new-password" type="password" name="password" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Password">
      </div>
    </div>
         <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">LOCATION</div>
        </div>
         <input autocomplete="off" type="text" name="location" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Location">
      </div>
    </div>
       <div class="form-group col-md-12">
     <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">PHONE NUMBER</div>
        </div>
         <input autocomplete="off" type="text" name="number" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Phone Number e.g. 0751234567">
      </div>
    </div>

  </div>
  <button type="submit" name="submit" class="btn btn-primary" style="font-size:20px; float: right;">Register</button>
  <h5 class="mt-2">Already have an account? <a href="login.php">Login</a></h5>
</form>
  </div>





  <!-- CONTENT ENDS -->



  <!-- FOOTER BEGINS -->

  <?php
include 'includes/footer.php';
?>
