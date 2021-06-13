<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>

	<div class="container">
		<h3 align="center" class="mb-4">Add Images To Slideshow</h3>
		<?php 
        if (isset($_POST['add'])) {
   

    $description = $_POST['description'];
    $images = $_FILES["image"]["name"];
    // $name = $_FILES['file']['name'];
    $fileTMP = $_FILES['image']['tmp_name'];
     $query = "INSERT INTO slideshow (image,Description) VALUES ('$images','$description')";
  
    if(mysqli_query($connection,$query)){
    move_uploaded_file($_FILES['image']['tmp_name'], "slideshow/$images");

       echo "<div class='alert alert-success'>Image added to slideshow.</div>";
} else{
    echo "<div class='alert alert-danger'>Image NOT added to slideshow.</div>";
}
}
?>
		
		<form action="slideshow.php" class="mb-4" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="image" id="pdt_image" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter Description of product..." required>
            </div>
            <input type="submit" name="add" class="btn btn-primary mb-4" value="Add" style="float: right;width: 100px;">
        </form>

</div>
<br>
<br>
<br>

<div class="container mt-4">

	<h3 class="mb-4 mt-4" align="center"><b><u>Images in slideshow</u></b></h3>
<?php
if(isset($_POST["deletebtn"])){
	$id = $_GET['id'];

	$query = "DELETE FROM slideshow WHERE id=".$id;
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
		echo "<div class='alert alert-success'><b>Image DELETED from slideshow</b></div>";
	
	}else{
		echo "<div class='alert alert-danger'><b>Image NOT deleted from slideshow</b></div>";
	}
}
?>
</div>
<div class="table-responsive">
            
            <?php
                $query = "SELECT * FROM slideshow";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
            ?>

            <table class="table table-bordered table-dark table-stripped table-hoverable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> image</th>
                        <th> Description </th>
                        <th> EDIT</th>
                        <th> DELETE </th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    if(mysqli_num_rows($query_run) > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                    <tr>
                        <td><?php echo $counter ?></td>
                        <td><img src="../slideshow/<?php echo $row['image']; ?>" style="height: 200px; width: 200px;"></td>
                        <td><?php echo $row['Description']; ?></td>
                        <td>
                            <form action="editSlide.php?id=<?php echo $row['id']; ?>" method="POST">
                                <button type="submit" name="edit_btn" class="btn btn-success"> EDIT </button>
                            </form>
                        </td>
                        <td>
                            <form action="slideshow.php?id=<?php echo $row['id']; ?>" method="POST">
                                <button type="submit" name="deletebtn" class="btn btn-danger"> DELETE </button>
                            </form>
                        </td>
                    </tr>

                    <?php
                        $counter++;}

                    }
                    else{
                        echo "no record found";
                    }                                                                                          
                    ?>
                </tbody>
            </table>
        </div>
    </div>



<?php 
include('includes/scripts.php');
include('includes/footer.php');
?> 