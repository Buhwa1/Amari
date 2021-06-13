<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','papers');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"database");
$sql="SELECT * FROM product_details ORDER BY ".$q;

$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" .$row['collegeID']. "</td>";
  echo "<td>" .$row['CollegeName']. "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>