<?php
  include("includes/header.php");
?>
    </br>



    <div class="container" id="profilehome">

        <h2> <a href="account.php">Home</a></h2>


    </div>
    <div class="container" id="forms">

        <?php

        $id = $_GET['id'];

        if (isset($_POST["submit"])) {
            $fullname =
                mysqli_real_escape_string($connect, $_POST["fullname"]);
            $email =
                mysqli_real_escape_string($connect, $_POST["email"]);
            $Location =
                mysqli_real_escape_string($connect, $_POST["Location"]);

            $stmt = $connect->prepare("UPDATE users SET fullname= ? ,email = ?,Location = ? WHERE email='$email' ");
            $stmt->bind_param("sss",  $fullname, $email, $Location);
            $stmt->execute();

            if ($stmt->execute()) {
                echo "<div class='alert alert-success' role='alert'>
            <strong>Successfully updated Profile.</strong>
        </div>";
                // header("Location:account.php");
            }
        }
        ?>
        <form action="" method="post" autocomplete="off">

            <h1>Registration</h1>
            <p>Please fill in your correct details.</p>
            <!-- <hr class="mb-3"> -->
            <!-- <label for="firstname"><b>First Name</b></label> -->
            <!-- <input class="form-control" id="firstname" type="text" name="firstname" placeholder="Enter Firstname" required> -->
            <?php
            $id = $_GET["id"];
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $result = mysqli_query($connect, $sql);

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><label for="firstname"><b>Name</b></label></span>
                    </div>
                    <input class="form-control" id="firstname" type="text" name="fullname" placeholder="Enter Fullname" value="<?php echo $row['fullname']; ?>" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><label for="firstname"><b>Email</b></label></span>
                    </div>
                    <input class="form-control" id="firstname" type="text" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><label for="firstname"><b>Location</b></label></span>
                    </div>
                    <input class="form-control" id="firstname" type="text" name="Location" placeholder="Enter Location" value="<?php echo $row['Location']; ?>" required>
                </div>
            <?php
            }
            ?>

            <input class="btn btn-primary" type="submit" id="registers" name="submit" value="Update Profile">

        </form>

    </div>




   <?php
  include("includes/footer.php");
?>