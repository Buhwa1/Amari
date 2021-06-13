<?php
  include("includes/header.php");
?>

  <div class="container-fluid" id="categories">
    <div class="row text-center">

<!-- <div class="col-md-2 col-xs-2"> -->
<aside id="sidebar-left"  class="col-md-2 col-xs-2">
        <column id="column-left">

          <div class="list-group">
            <?php
            $connect = mysqli_connect("localhost", "root", "", "amari3");
            $product_query = "SELECT * FROM category";
            $product_result = mysqli_query($connect, $product_query) or die(mysqli_error($connect));
            $row = mysqli_fetch_array($product_result);
            do { ?>
              <a href="categories.php?categoryid=<?php echo $row['categoryid']; ?>" class="list-group-item list-group-item-action">
                <?php echo $row["category"]; ?>

              </a>

            <?php } while ($row = mysqli_fetch_array($product_result)); ?>
          </div>
        </column>
      </aside>
      
      
<!-- </div> -->
      
      <?php
      $connect = mysqli_connect("localhost", "root", "", "amari3");
      $cid = $_GET['categoryid'];
      $product_query = "SELECT * FROM product_details WHERE ProductID = '$cid'";
      $product_result = mysqli_query($connect, $product_query) or die(mysqli_error($connect));
      $row = mysqli_fetch_array($product_result);
      do { ?>
      <div class="col-md-2 col-xs-10" id="content">
      <div class="card-deck">
  <div class="card">
  <div class="card-body">
    <a href=""> <h5 class="card-title"><?php echo $row["Product"] ?></h5>
      <p class="card-text"><?php echo $row["Price"] ?></p>
    </div>
    <img class="card-img-bottom" src="picture/<?php echo $row["Product_Image"]; ?>" alt="Card image cap">
 </a>
     
  </div>
      </div>
      </div>


      <?php } while ($row = mysqli_fetch_array($product_result)); ?>


    </div>
  </div>

 <?php
  include("includes/footer.php");
?>