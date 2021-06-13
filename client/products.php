<?php
  include("includes/header.php");
    if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  }
  unset($_SESSION['qty_array']);

?>
  


  <hr class="light" style="width:100%;">


  <div class="container-fluid">
    <?php
    //info message
    if(isset($_SESSION['message'])){
      ?>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-6">
          <div class="alert alert-info text-center">
            <?php echo $_SESSION['message']; ?>
          </div>
        </div>
      </div>
      <?php
      unset($_SESSION['message']);
    }


    $conn = new mysqli('localhost', 'root', '', 'amari');
    $pid = $_GET['ProductID'];
    $sql = "SELECT * FROM product_details WHERE ProductID=".$pid;

    $query = $conn->query($sql);
    $inc = 12;
    while($row = $query->fetch_assoc()){
      $inc = ($inc == 12) ? 1 : $inc + 1; 
      if($inc == 1) echo "<div class='row text-center'>";  
      ?>
      <div class="col-md-3 col-sm-12">
      <div class="card shadow mb-4" style="width: 18rem;">
        <div  id="inner">
          <img class="card-img-top" style="width: 286px;height: 250px;" src="../picture/<?php echo $row["Product_Image"]; ?>" alt="<?php echo $row['Product']; ?>">
          
        </div>
    <div class="card-body text-center">
      <h5 class="card-title" style="font-size: 25px;"><?php echo $row['Product']; ?></h5>
      <p class="card-text" style="font-size: 20px;">UGX <?php echo number_format( $row['Price'],0); ?></p>
      <form method="post" action="add_cart.php?id=<?php echo $row['id']; ?>">
        <input type="hidden" name="pid" value="<?php echo $pid ?>">
        <input type="submit" name="add" class="btn btn-primary btn-md" style="width: 250px;" value="Add to Cart">
      </form>

    </div>
  </div>


      </div>
      <?php
    }
    if($inc == 1) echo "<div></div><div></div><div></div></div>"; 
    if($inc == 2) echo "<div></div><div></div></div>"; 
    if($inc == 3) echo "<div></div></div>";


    // for ($page=1; $page<=$number_of_pages ; $page++) { 
    //   echo "<a href='products.php?ProductID=".$pid."&page=".$page."'";
    // }
  ?>
  </div>




<?php
  include("includes/footer.php");
?>
