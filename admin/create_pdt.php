<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

                $sql = "SELECT * FROM category ORDER BY category";
                $result = mysqli_query($connection,$sql);

?>

    <div class="container">
        <h3 align="center" class="mb-4">Add New Product</h3>
 <?php 
        if (isset($_POST['add'])) {
    $categoryID = $_POST['category'];
    $productID = $_POST['products'];
    $pdtname = $_POST['product'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $images = $_FILES["image"]["name"];
    // $name = $_FILES['file']['name'];
    $fileTMP = $_FILES['image']['tmp_name'];
     $query = "INSERT INTO product_details (categoryid,ProductID,Product,Price,Description,Product_Image) VALUES ('$categoryID','$productID','$pdtname','$price','$description','$images')";
  
    if(mysqli_query($connection,$query)){
    move_uploaded_file($_FILES['image']['tmp_name'], "../picture/$images");

       echo "<div class='alert alert-success'>Image added</div>";
} else{
    echo "fail";
}
   
    }
    
?>
         <form action="create_pdt.php" class="mb-4" method="POST" enctype="multipart/form-data">
             <div class="form-group">
                <label><b>Category</b></label>
               
            <select name="category" id="category" required class="form-control form-control-md">
               <option value="">Choose Category...</option>
                <?php
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($connection,$sql);
                    while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $row["categoryid"]; ?>"><?php echo $row["category"]; ?></option>
                  <?php      
                    }
                ?>

           </select>
           </div>
           <div class="form-group">
            <label><b>Product</b></label>
            <select name="products" id="products" required class="form-control form-control-md">
                <option>Select Product</option>
                  <?php
                    $sql = "SELECT * FROM products";
                    $result = mysqli_query($connection,$sql);
                    while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $row['ProductID']; ?>" name="product"><?php echo $row["Product"]; ?></option>
                  <?php      
                    }
                ?>

           </select>
           </div>
            <div class="form-group">
                <label><b>Product name</b></label>
                <input type="text" name="product" class="form-control" placeholder="Enter Product Name" required>
            </div>
            <div class="form-group">
                <label><b>Price</b></label>
                <input type="number" name="price" class="form-control" placeholder="Enter Price" required>
            </div>
            <div class="form-group">
                <label><b>Description</b></label>
                <input type="text" name="description" class="form-control" placeholder="Enter Description" required>
            </div>
            <div class="form-group">
                <label><b>Upload Image</b></label>
                <input type="file" name="image" id="pdt_image" required>
            </div>
            <input type="submit" name="add" class="btn btn-primary" value="Add" style="float: right;width: 100px;">
        </form>
    </div>
     

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    