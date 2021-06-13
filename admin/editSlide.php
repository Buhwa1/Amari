<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>

<div class container>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Slideshow</h6>
        </div>
        <?php 
            if(isset($_POST['updatebtn'])){
                $id = $_GET["id"];
                $description = $_POST["description"];

                $query = "UPDATE slideshow SET Description='$description' WHERE id='$id' ";
                $query_run = mysqli_query($connection,$query);

            if ($query_run) {
                echo "<div class='alert alert-success'>Slideshow details have been updated</div>";
                
            }else{
                echo "<div class='alert alert-danger'>Slideshow details have NOT been updated</div>";
                
        }
            }
        ?>
        <div class="card-body">
            <?php

                $id = $_GET['id'];
                //echo $id;
                $query = "SELECT * FROM slideshow WHERE id=".$id;
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row){
                    ?>
                            <h3 align="center"><img src="../slideshow/<?php echo  $row["image"]; ?>" style="width: 300px; height: 300px;"></h3>
                        <form action="editSlide.php?id=<?php echo $id; ?>" method="POST">
                          
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" value="<?php echo $row['Description']; ?>" class="form-control">
                            </div>

                            <a href="slideshow.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update</button>
                        </form>


            <?php
                }


            ?>
        </div>
    </div>
</div>


<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>