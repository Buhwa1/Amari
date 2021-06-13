<?php
include("database/dbconfig.php");
	if(isset($_POST['categoryid'])){
		$sql = "SELECT * FROM category WHERE categoryid=".$_POST['categoryid'];
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)>0){
			echo '<option value="">Select Product</option>';
			while($row = mysqli_fetch_array($result)){
				echo '<option value='.$row["categoryid"].'>'.$row["category"].'</option>';
			}
		}
		else{
			echo '<option>No Product found in selected category.</option>';
		}
	}
?>