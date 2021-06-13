<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>

	<div class="container">


		<div class="container">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
<?php
    $counter = 1;
    $sql = "SELECT * FROM slideshow";
  	$result = mysqli_query($connection,$sql);
    while($row = mysqli_fetch_array($result)){
?>
            <div class="carousel-item <?php if($counter <= 1){echo "active"; } ?>">
                <div class="carousel-caption">
    <h3><?php echo  $row["Description"]; ?></h3>
    
  </div>
                <a href="../slideshow/<?php echo  $row["image"]; ?>">
                    <img class="d-block w-100 img-responsive" src="../slideshow/<?php echo $row["image"]; ?>" style="height: 500px">
                </a>
              
            </div>
<?php
    $counter++;
    }
    mysqli_close($connection);
?>

    </div>
</div>
	</div>



<?php 
include('includes/scripts.php');
include('includes/footer.php');
?> 