<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>
<div class="container">
 <nav aria-label="breadcrumb mb-4">
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
    <li class="breadcrumb-item active" aria-current="page">Order details</li>
  </ol>
</nav>


	
 <?php
 if(isset($_GET["id"])){
                $id = $_GET["id"];
                // echo $id;

                $query = "SELECT * FROM orders WHERE id=".$id;
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
     
                    if(mysqli_num_rows($query_run) > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                            <div class="jumbotron bg-success" style="height: 230px;">
                                 <h4 align="center"><?php echo $row["firstname"]." ".$row["lastname"]; ?></h2> 
     <h4 align="center"><?php echo $row["location"]; ?></h4>
            <h4 align="center"><?php echo $row["Phone_Number"]; ?></h4> 
            <h4 align="center"><?php echo $row["payment_method"]; ?></h4> 
           <h4 align="center" class="mb-4">Total = UGX <?php echo number_format( $row["total"]) ; ?></h4>
                            </div>
           
             <?php 
                  }  

          }
      }
                ?>

 <div class="row">

                 <?php
 if(isset($_GET["id"])){
                $id = $_GET["id"];
                // echo $id;

                $query = "SELECT * FROM order_contents WHERE orderID=".$id;
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
     
                    if(mysqli_num_rows($query_run) > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>

                           
                                <div class="col-md-4 col-xs-12">
                                        <div class="card-deck" style="width: 18rem;">
      <div class="card mb-4">
    <img class="card-img-top" style="width: 257px;height: 250px;" src="../picture/<?php echo $row["Product_Image"]; ?>" alt="<?php echo $row['Product']; ?>" style="width: 200px; height: 200px;">
    <div class="card-body">
      <h5 class="card-title" style="font-size: 25px;"><?php echo $row['Product']; ?></h5>
      <p class="card-text" style="font-size: 20px;">UGX <?php echo number_format( $row['Price'] ); ?></p>
      <p class="card-text" style="font-size: 20px;">Qty <?php echo number_format( $row['Quantity'] ); ?></p>
      <form method="post" action="add_cart.php?id=<?php echo $row['id']; ?>">
        <input type="hidden" name="pid" value="<?php echo $pid ?>">
      </form>
     <!--  <h5><span class="pull-right"><a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-md">Add to Cart</a></span></h5> -->

    </div>
  </div>
</div>
                                </div>
                          
         
             <?php 
                  }  

          }
      }
                ?>
  </div>
                
</div>

 <?php 
include('includes/scripts.php');
include('includes/footer.php');
?>