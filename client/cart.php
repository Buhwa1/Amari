<?php
include("includes/header.php");
?>
<div class="container">
    <div class="row">
    <div class="col-sm-12 col-sm-offset-2">
      <?php 
      if(isset($_SESSION['message'])){
        ?>
        <div class="alert alert-info text-center">
          <?php echo $_SESSION['message']; ?>
        </div>
        <?php
        unset($_SESSION['message']);
      }

      ?>
      <form method="POST" action="save_cart.php">
        <div class="table-responsive">
          <table class="table table-bordered table-dark table-stripped table-hover" id="dataTable" width="100%" cellspacing="0">
           <!-- <table class="table table-bordered table-striped"> -->
        <thead>
          <th></th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </thead>
        <tbody>
          <?php
            //initialize total
            $total = 0;
            if(!empty($_SESSION['cart'])){
            //connection
            $conn = new mysqli('localhost', 'root', '', 'amari');
            //create array of initail qty which is 1
            $index = 0;
            if(!isset($_SESSION['qty_array'])){
              $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
            }
            $sql = "SELECT * FROM product_details WHERE id IN (".implode(',',$_SESSION['cart']).")";
            $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                ?>
                <tr>
                  <td>
                    <a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                  </td>
                  <td><?php echo $row['Product']; ?></td>
                  <td><?php echo number_format($row['Price'], 2); ?></td>
                  <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                  <td><input type="number" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>" style="width:50;"></td>
                  <td><?php echo number_format($_SESSION['qty_array'][$index]*$row['Price'], 2); ?></td>
                  <?php $total += $_SESSION['qty_array'][$index]*$row['Price']; ?>
                </tr>
                <?php
                $index ++;
              }
            }
            else{
              ?>
              <tr>
                <td colspan="4" class="text-center">No Item in Cart</td>
              </tr>
              <?php
            }

          ?>
          <tr>
            <td colspan="4" align="right"><b>Total</b></td>
            <td><b><?php echo number_format($total, 2); ?></b></td>
          </tr>
        </tbody>
      </table>
      <div class="text-center">
        <a href="index.php" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Back</a>
      <button type="submit" class="btn btn-success" name="save">Save Changes</button>
      <a href="clear_cart.php" class="btn btn-danger"><span class="fa fa-trash"></span> Clear Cart</a>
      <a href="checkout.php" class="btn btn-success"><span class="fa fa-check"></span> Checkout</a>
      </div>
      
      
        </div>
     </form>
    </div>
  </div>
</div>

<?php
  include("includes/footer.php");
?>