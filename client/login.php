  <?php
include ('includes/header.php');
?>
        <!-- CONTENT BEGINS -->


        <div class="container mt-4">
            <h3 align="center" class="mt-4">Login Form</h3>
            <h5 align="center" class="mt-4">Please enter your login details to begin placing orders.</h5>

<?php




if ($connect->connect_error) {
    die("Connection failed:" . $connect->connect_error);
}
if (isset($_POST["Login"])) {
 
    $phone = mysqli_real_escape_string($connect,$_POST["phone"]);
    $pass = mysqli_real_escape_string($connect,$_POST["password"]);
        
        if($phone == "" | $pass == ""){
        echo "<div class='alert alert-danger text-center' role='alert'>
        <strong>All fields must be filled to proceed.</strong>
      </div>";
      }
    $stmt = $connect->prepare("SELECT id,firstname,lastname,password,Location,Phone_Number FROM users WHERE Phone_Number=?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($userID, $firstname, $lastname,$pw,$location,$phone_number);

    if ($stmt->num_rows > 0) {
        $row = $stmt->fetch();
        if (password_verify($pass, $pw)) {
            session_start();
            $_SESSION["login"] = $l;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["id"] = $userID;   
            $_SESSION["Location"] = $location;
            $_SESSION["Phone_Number"] = $phone_number;
            header("Location: account.php");
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                	<strong>Wrong Phone Number or password.</strong>
             	 </div>";
        }
    }
}
?>
            <form class="mt-4" autocomplete="off" action="login.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">PHONE NUMBER</div>
                            </div>
                            <input autocomplete="off" name="phone" type="text" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Phone Number">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">PASSWORD<i class="ml-1 fa fa-lock"></i></div>
                            </div>
                            <input autocomplete="new-password" name="password" type="password" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Password">
                        </div>
                    </div>


                </div>
                <button type="submit" name="Login" class="btn btn-primary" style="font-size:20px; float: right;">Login</button>
                <h5 class="mt-2">Dont have an account? <a href="register.php">Register</a></h5>
            </form>
     </div>


        <!-- CONTENT ENDS -->



        <!-- FOOTER BEGINS -->
<?php 
include ('includes/footer.php');
?>