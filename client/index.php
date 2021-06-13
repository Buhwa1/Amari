<?php
  include("includes/header.php");
?>

  <!-- CONTENT BEGINS -->

  <div class="container-fluid" style="margin-top:50px;">

    
       <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
<?php
    $counter = 1;
    $sql = "SELECT * FROM slideshow";
    $result = mysqli_query($connect,$sql);
    while($row = mysqli_fetch_array($result)){
?>
            <div class="carousel-item <?php if($counter <= 1){echo "active"; } ?>">
                <div class="carousel-caption">
    <h3><?php echo  $row["Description"]; ?></h3>
    
  </div>
                <a href="slideshow/<?php echo  $row["image"]; ?>">
                    <img class="d-block w-100 img-responsive" src="../slideshow/<?php echo  $row["image"]; ?>" style="height: 500px">
                </a>
              
            </div>
<?php
    $counter++;
    }
?>

    </div>
</div>
</div>


    <div class="container-fluid" id="categories">
      <h2><span style="font-family: Tahoma;"><span style="display: block; border-bottom:4.5px solid #FF5400; color: #FF5400;">Popular Products</span></span></h2>
    
    <div class="row">


      <div class="col-md-2">
        <a href="Amari's bakery/cake/IMAGE011.png" class="thumbnail">
          <img src="Amari's bakery/cake/IMAGE011.png" alt="Amari's bakery/cake/IMAGE011.png" style="width:150px;height:150px">
          <p><span style="color: black ">INGREDIENTS</span></p>
        </a>
      </div>

    </div>
  </div>


 <!-- <div class="container-fluid" id="ingredients">
    <h2><span><span>POPULAR CATEGORIES</span></span></h2>


    <h3 align="center"></h3>
    <div class="row">


      <?php

      $query = "SELECT * FROM popular";
      $result = mysqli_query($connect, $query);
      $b = mysqli_fetch_array($result);
      do { ?>
        <div class="col-md-2">
          <a href="categories.php?categoryid=<?php echo $b['categoryid']; ?>">

            <img src='picture/<?php echo $b["category_image"]; ?>' style="width:150px;height:150px">
          </a>
          <p><?php echo $b["category"]; ?></p>
        </div>
        <div class="clearfix"></div>
      <?php } while ($b = mysqli_fetch_array($result)); ?>





    </div>
  </div> --> 
 



  <!-- CONTENT ENDS -->

  <!-- CONNECT BEGINS -->
  <!-- <div class="container-fluid" id="connect">
  <h2 align="center">Connect with Us</h2>
  <div class="row">
    <div class="col-3">   
      <a href="# " id="fb"><i class="fab fa-facebook" aria-hidden="true" title="Facebook"></i></a>
    </div>
    <div class="col-3">
      <a href="# " id="tw"><i class="fab fa-twitter" aria-hidden="true" title="Twitter"></i></a>
    </div>
    <div class="col-3">
     <a href="# " id="wh"><i class="fab fa-whatsapp" aria-hidden="true" title="Whatsapp"></i></a>
    </div>
  <div class="col-3">
      <a href="# " id="ig"><i class="fab fa-instagram" aria-hidden="true" title="Instagram"></i></a>
  </div>
  </div>
</div> -->



  <!-- CONNECT ENDS -->
<?php
  include("includes/footer.php");
?>