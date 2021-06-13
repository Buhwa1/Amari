<?php
ob_start();
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  }

require ("database/connect.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
  <link href="css/all.css" rel="stylesheet">
  <link href="index.css" rel="stylesheet">
  <title>Amari</title>
  
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php" style="text-align:center;">Amari's Bakers <br> Suppliers</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
     <?php
      if(!isset($_SESSION["Phone_Number"])){
        echo '
        <a href="register.php" class="btn" role="button">
          <button type="button" class="btn btn-default">Register</button>
        </a>

        <a href="login.php" class="btn" role="button">
          <button type="button" class="btn btn-default">Login</button>
        </a>
        ';
      }
      else{
          echo '

        <a href="account.php" class="btn" role="button">
          <button type="button" class="btn btn-default">My Account</button>
        </a>

        <a href="logout.php?l=out" class="btn">
          <input value="Logout" class="btn btn-danger btn-md" style="width:100px;">
          
        </a>


        ';
      }
    ?> 
    </div>
    </div>
  </nav>



  <div class="container h-100" id="search">
    <form class="form-inline my-2 my-lg-0 justify-content-center align-self-center">
      <div class="input-group">
        <input class="form-control" type="search" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
      </div>
    </form>
    <!-- <div id="result"></div> -->
  </div>

   <div class="container mb-4 mt-4">
      <a href="view_cart.php" style="float: right;"><button class="btn btn-info">
        Cart <span class="fa fa-shopping-cart"></span><span class="badge badge-primary badge-pill ml-4"><span class="badge" style="color: white;font-size: 15px;"><?php echo count($_SESSION['cart']); ?></span> </span>
      </button>  </a>
  </div> 

 
  <div class="container-fluid" id="dp">
    <ul class="mb-4 w-100" id="dp1">
      <?php
      $query = "SELECT * FROM category";
      $res = mysqli_query($connect, $query);
      while ($row = mysqli_fetch_array($res)) {
      ?>
        <li id="cat"><?php echo $row["category"]; ?>
          <ul>
            <?php

            $query1 = "SELECT * FROM products WHERE categoryid =".$row["categoryid"];
            $res1 = mysqli_query($connect, $query1);

            while ($row1 = mysqli_fetch_array($res1)) {
            ?>
              <li><a href="products.php?ProductID=<?php echo $row1["ProductID"]; ?>&page=1"><?php echo $row1["Product"]; ?></a></li>
            <?php
            }
            ?>
          </ul>
        </li>
      <?php
      }
      ?>
    </ul>
  </div>

  <br>
  <br>
  <br>