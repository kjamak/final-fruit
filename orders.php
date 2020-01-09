<?php
$quantity = filter_input(INPUT_POST, 'country');
$product = filter_input(INPUT_POST, 'product');
$phone = filter_input(INPUT_POST, 'phone');

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
$sql = "INSERT INTO orders (quantity,product,phone)
values ('$quantity','$product', '$phone')";
if ($conn->query($sql)){

header("Location: added.html");
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