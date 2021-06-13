<?php
  include("includes/header.php");
  
 if(!$_SESSION["Phone_Number"]) {

  header('Location:login.php');
}
else{
      $firstname = $_SESSION["firstname"];
      $lastname = $_SESSION["lastname"];
      $userID = $_SESSION["id"];
      $phone_number = $_SESSION['Phone_Number'];
      $location = $_SESSION['Location'];
}
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  }


?>

  <!-- <div class="container" id="profilehome"> -->
   


  <!-- </div> -->

  <div class="container" id="info">
     <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Account</li>
  </ol>
</nav>


    <div class="row">
    <div class="col-md-9 col-xs-8 col-sm-8">
      <div class="row">
          <div class="col-md-9 col-sm-8 bg-dark" style="height: 310px;width: 400px !important;">
        <h2 align="center">My Account</h2>
        <ul class="list-unstyled" style="font-size: 25px;">
          <a href="edit-my-account-information.php?id=<?php echo $userID ?>" class="text-decoration-none" style="color: white !important;">Edit account information.</a> <br>
           <hr class="light" style="width: 100%;">
          <a href="change-my-password.php" style="color: white !important;">Change your password.</a> <br>
           <hr class="light" style="width: 100%;">
          <a href="#" style="color: white !important;">Modify Wishlist.</a>
          <hr class="light" style="width: 100%;">

        </ul>
      </div>
      <hr class="light">
      <div class="col-md-9 col-xs-8 col-sm-8 bg-dark" style="height: 150px;width: 400px !important;">
        <h2 align="center">My Orders</h2>
        <ul class="list-unstyled" style="font-size: 25px;">
          <a href="view_order_history.php" class="text-decoration-none" style="color: white !important;">View Order History.</a> <br>
          <a href="#" style="color: white !important;">Your Transactions.</a> <br>
          <!-- <a href="#">Modify Wishlist.</a>  -->

        </ul>
      </div>
    </div>
      </div>
   

       <div class="col-md-3 col-xs-4 col-sm-4 mt-4">
        <ul class="list-group">
           <li class="list-group-item d-flex justify-content-between align-items-center">
         <!--    <a href="cart.php">
                Cart<i class="fas fa-shopping-cart mr-3"></i> 
              
            </a> -->
            <a href="view_cart.php" style="font-size: 20px;">Cart <span class="fa fa-shopping-cart"></span><span class="badge badge-primary badge-pill ml-4"><span class="badge" style="color: white;font-size: 15px;"><?php echo count($_SESSION['cart']); ?></span> </span>  </a>
          </li>
        </ul>
      </div>
    </div>
   
      
    </div>
  </div>



  <?php
  include("includes/footer.php");
?>