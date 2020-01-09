<?php
$i=0;
$fname=array();
$lname=array();
$age=array();

if(isset($_POST['search']))
{

 

    $id = $_POST['id'];
    

    $connect = mysqli_connect("localhost", "root", "","fruitshoporders");
  
    $query = "SELECT `phone`, `product`, `quantity` FROM `orders` WHERE `phone` = $id";
    
    $result = mysqli_query($connect, $query);
    

   
    if(mysqli_num_rows($result) > 0)
    {

      while ($row = mysqli_fetch_array($result))
      {
        $fname[$i] = $row['phone'];
        $lname[$i] = $row['product'];
        $age[$i] = $row['quantity'];

        $i=$i+1;
      }  
    }
    
   
    else {
          $i=987654;
         
    }
    
    
    mysqli_free_result($result);
    mysqli_close($connect);
    
}


else{
    $fname = "";
    $lname = "";
    $age = "";
}


?>








<!DOCTYPE html>
<html lang="EN">
<head>
	<title>Fruit Store</title>
    <link rel="icon" href="smalllogo.png">
    <meta charset="utf-8">
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="fruitsalone.css">

<style type="text/css">
  
  .column {
  float: left;
  width: 33.3%;

}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}



</style>

</head>
<body style=" background-image: url('bg.jpg'); ">


<ul class="nav">
	<img src="logo.png" class="logopic">
  <li class="nav-item">
    <a class="nav-link active" href="index.html">HOME</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="shop.html">SHOP</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="aboutus.html">ABOUT US</a>
  </li>
</ul>


<br><br><br><br><br>


  
    <div  data-aos="fade-up" data-aos-duration="2000" style=" margin-left: 35%;">
   <h1>YOUR ORDER</h1>
   <br>
   <p class="fruitinfo">To see your order and finish ordering enter your phone number that you used to add fruits to cart</p>
   <form  class="forma" style="height: 200px; width: 400px;" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <label for="lname" class="fs">Enter your phone number:</label>
    <input type="phone" id="lname" name="id" placeholder="Enter phone you used">

    <input type="submit" class="fs" value="Submit" name="search">
    
  
</form>
<br>

<?php
$cartfull=false;
if($i==987654){

echo '
<div class=" forma fs column" style="height: 70px; color: white; background-color: red; width: 220px;">';
 echo 'YOUR CART IS EMPTY';
echo '</div>';


}else{
$i=$i-1;
while($i>=0){
echo '<div class="forma row" style="height: 140px; width: 400px;
margin-left: 1px;" >
<div class="column"><img src=" '; 
echo $lname[$i];
echo '.png" style="width: 100px;"></div>
<div class="fs column">';
 echo $lname[$i];
echo '</div>
<div class="fs column">';
echo $age[$i];
echo'&nbsp;kg</div>
</div>
<br>';
$i=$i-1;
$cartfull=true;
} }


if($cartfull==true){

echo'<form style="height: 200px; width: 400px;" action="final.php" method="POST">
   
    <input type="hidden" value="';
    echo $fname[1];
    echo'" name="phone">

    <input type="submit" class="fs" value="Send order" name="order">
    
  
</form>';


}
?>
<br><br><br><br><br>
<br><br><br><br><br>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>

</body>
</html>