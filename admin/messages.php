<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>

<div class="container">
    <?php 
    if (isset($_POST["read"])) {
        $id = $_GET["id"];
        $status = "Read";
    $sql = "UPDATE messages SET status='$status' WHERE id=".$id;
    $result = mysqli_query($connection,$sql);
    if($result){
        echo '<div class="alert alert-success">Message status changed.</div>';
    }
    else{
        echo '<div class="alert alert-danger">Message not read.</div>';
    }
    }

    ?>
      <?php 
    $id = $_GET["id"];
    $sql = "SELECT * FROM messages WHERE id=".$id;
    $result = mysqli_query($connection,$sql);
    while ($row = mysqli_fetch_array($result)) {
    
?>
    <form action="messages.php?id=<?php echo $row["id"]; ?>" method="POST"> 
        
    
  
    <label><b>From: </b></label> <?php echo $row["FirstName"]; ?>
    <br>
    <label><b>Email: </b></label> <?php echo $row["Email"]; ?>
    <br>
    <div class="form-group">
  
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly style="height: 200px;"><?php echo $row["Message"]; ?></textarea>
  </div>
  <button type="submit" name="read" class="btn btn-primary mb-2" style="float: right;">Message read</button>
  </form>
<?php
    }
?>

    
</div>

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>