<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>
<div class="container">
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
  </ol>
</nav>


	<h3 align="center">Order List</h3>


<div class="table-responsive">
            
           

            <table class="table table-bordered table-dark table-stripped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Firstname </th>
                        <th> Lastname </th>
                        <th> Location</th>
                        <th> Phone Number </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>

                <?php

                $query = "SELECT * FROM orders";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
     
                    if(mysqli_num_rows($query_run) > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                    <tr>
                        <td><?php echo $counter ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['Location']; ?></td>
                        <td><?php echo $row['Phone_Number']; ?></td>

                        <td>
                            <form action="view_orders.php?id=<?php echo $row['id']; ?>" method="POST">
                                <button type="submit" name="view_orders" class="btn btn-danger"> View Order</button>
                            </form>
                        </td>
                    </tr>

                    <?php
                        $counter++;}

                    }
                    else{
                        echo "No orders found";
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