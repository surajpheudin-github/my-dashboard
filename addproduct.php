<?php
include 'connection.php';
?>

<?php
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$sql = "INSERT INTO `product_details` (`product_name`,`product_price`) VALUES ('$product_name','$product_price');";
$my_sqli = mysqli_query($conn,$sql);
if($my_sqli){
    echo "successful!";
}

header("location:manage_orders.php");
?>