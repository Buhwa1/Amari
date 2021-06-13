<?php
//session_start();
include('security.php');



$connection = mysqli_connect("localhost","root","","amari");

if (isset($_POST['registerbtn'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirmpassword'];

	if ($password === $cpassword) {
		$query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
		$query_run = mysqli_query($connection,$query);

		if (query_run) {
			//echo "saved";
			$_SESSION['success'] = "Admin profile added";
			header('location: register.php');	
		}else{
			//echo "not saved";
			$_SESSION['status'] = "Admin profile NOT added";
			header('location: register.php');
		}

	}else{
		$_SESSION['status'] = "Password and Confirm Password does not match";
		header('location: register.php');
	}

}



if (isset($_POST['createbtn'])) {
	$productID = $_POST['pID'];
	$pdtname = $_POST['product'];
	$price = $_POST['price'];
	$cID = $_POST['cID'];
	$quantity = $_POST['quantity'];
	$images = $_FILES["image"]['name'];
	
	if (file_exists("upload/" . $_FILES["pdt_image"]['name']))
	{
		$store = $_FILES["pdt_name"]['name'];
		$_SESSION['status']="<div class='alert alert-danger'>Image already exists. '".$store."'</div>";
		header('Location: create_pdt.php');
	}else
	{

			$query = "INSERT INTO product_details (categoryID,ProductID,Product,Price,quantity,image) VALUES ('$cID,'$productID','$pdtname','$price',$quantity','$images')";
			$query_run = mysqli_query($connection,$query);

			if ($query_run) 
			{
				move_uploaded_file($_FILES["pdt_image"]['tmp_name'], "upload/".$_FILES["pdt_image"]['name']);
				$_SESSION['success'] = "<div class='alert alert-success'>Image added</div>";
				header('Location: create_pdt.php');	
			}else{
				$_SESSION['status'] = "<div class='alert alert-success'>Image NOT added</div>";
				header('Location: create_pdt.php');
			}
	}
	
}


if (isset($_POST['updatebtn'])) {
	$id = $_POST['edit_id'];
	$username = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "UPDATE admins SET firstname='$firstname',lastname='$lastname', email='$email', password='$password' WHERE id='$id'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Your details have been updated</div>";
		header('Location: profile.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Your details have NOT been updated</div>";
		header('Location: profile.php');
	}

}
if (isset($_POST['editpdt_btn'])) {
	$pdt_id = $_POST['edit_id'];
	$pdtname = $_POST['edit_pdtname'];
	$price = $_POST['edit_price'];
	$category = $_POST['edit_category'];
	$quantity = $_POST['edit_quantity'];

	$query = "UPDATE product_details SET Product='$pdtname', Price='$price', category='$category', quantity='$quantity' WHERE pdt_id='$pdt_id' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-danger'>Your details have NOT been updated</div>your data is updated";
		header('Location: edit_pdt.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Your details have NOT been updated</div>your data is NOT updated";
		header('Location: edit_pdt.php');
	}

}



if (isset($_POST['deletebtn'])) {
	$id = $_GET['id'];

	$query = "DELETE * FROM admins WHERE id='$id'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
		$_SESSION['success'] = "<div class='alert alert-success'>User DELETED</div>";
		header('Location: viewadmins.php?id='.$id);
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>User NOT deleted</div>";
		header('Location: viewadmins.php?id='.$id);
	}
}

if (isset($_POST['delete_pdtbtn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE * FROM product_details WHERE id=".$id;
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
		$_SESSION['success'] = "<div class='alert alert-success'>Product DELETED</div>";
		header('Location: create_pdt.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Product NOT deleted</div>";
		header('Location: create_pdt.php');
	}
}




?>