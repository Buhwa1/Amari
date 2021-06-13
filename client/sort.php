<html>
<head>
   <link rel="stylesheet" href="css/bootstrap.min.css"/>
<script>

    var gt=0;
    var iprice = document.getElementsByClassName("iprice");
    var iquantity = document.getElementsByClassName("iquantity");
    var itotal = document.getElementsByClassName("itotal");
    var gtotal = document.getElementById("gtotal");

    function subTotal()
    {
        gt=0;
        for(i=0;i<iprice.length;i++)
        {
            itotal[i].innerText = (iprice[i].value)*(iquantity[i].value);
            gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText=gt;
    }
    subTotal();

// function sortResult(str)
// {
// if (str=="")
//   {
//   document.getElementById("result").innerHTML="";
//   return;
//   } 
// if (window.XMLHttpRequest)
//   {// code for IE7+, Firefox, Chrome, Opera, Safari
//   xmlhttp=new XMLHttpRequest();
//   }
// else
//   {// code for IE6, IE5
//   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }
// xmlhttp.onreadystatechange=function()
//   {
//   if (xmlhttp.readyState==4 && xmlhttp.status==200)
//     {
//     document.getElementById("result").innerHTML=xmlhttp.responseText;
//     }
//   }
// xmlhttp.open("GET","results.php?q="+str,true);
// xmlhttp.send();
// }
</script>
</head>
<body>
  <input type="number" min="1" max="10" onchange="subTotal()" data-id="<?php echo $row["id"] ?>" class="iquantity qty_input border px-2 w-100 bg-light text-center" value="1" style="width: 50px !important;">
  <input type="text" name="" class="iprice" disabled="" value="10">
  <!-- <h6 style="font-size: 16px;">Sub total: UGX <span class="itotal">0</span></h6> -->
<h5 class="font-baloo font-size-20">Grand Total( 2 items) <br>UGX <span class="text-danger" id="gtotal">0</span></h5>
<input type="text" class="itotal" name="sub">
<?php
  if(isset($_POST["g"])){
    $yo =$_POST["sub"];
    echo $yo;
  }

?>
<form action="sort.php" method="POST">
  <input type="hidden" class="itotal" name="sub" value="">

  <td name="yo">3</td>
  <input type="submit" name="g">
</form>
<!-- <td name="yo">3</td> -->
<!-- <form>
<select name="sortby" onchange="sortResult(this.value)">
            <option value="collegeID">Id Number</option>
            <option value="CollegeName">Name A-Z</option>
</select>
</form>
<br>
<div id="result"><b>Results will be listed here.</b></div> -->
 <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="scripts/quantity.js"></script>
</body>
</html>
