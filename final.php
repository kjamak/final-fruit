<?php
$phone= filter_input(INPUT_POST, 'phone');
$quantity="notempty";

if (!empty($phone)){
if (!empty($quantity)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "fruitshoporders";


$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO finalorders (phone)
values ('$phone')";
if ($conn->query($sql)){

 }
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Phone should not be empty";
die();
}
}
else{
echo "Phone should not be empty";
die();
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

.row:after {
  content: "";
  display: table;
  clear: both;
}



</style>

</head>
<body style=" background-image: url('wlp.gif');  background-size: cover;
 background-repeat: no-repeat;">


<br><br><br><br><br>
<br><br><br><br><br>
<br><br>

  
    <div  class="forma" data-aos="fade-up" data-aos-duration="2000" style=" margin-left: 25%; width: 760px; height: 150px; background-color: green;">

   <h1 class="fs" style="font-size: 40px; color: white;">WE RECIEVED YOUR ORDER, EXPECT OUR CALL </h1>  
   <button type="button" class="btn btn-danger btn-lg btn-block fs"><a href="index.html" style="text-decoration: none; color:white;"> Return to homepage</a></button>

</div>
<br>



<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br>




<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>

</body>
</html>