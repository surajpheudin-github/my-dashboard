<?php
include 'connection.php';

if(isset($_POST['addorder'])){
$product_name = $_POST['product_name'];
$customer_name = $_POST['customer_name'];
$contact_number = $_POST['contact_number'];
$address = $_POST['address'];
$price = $_POST['price'];
$shipping_charge = $_POST['shipping_charge'];
$total_amount = $price + $shipping_charge;
$sql = "INSERT INTO `order_details` (`product_name`,`customer_name`,`contact_number`,`address`,`price`,`shipping_charge`,`total_amount`) VALUES ('$product_name','$customer_name','$contact_number','$address','$price','$shipping_charge','$total_amount');";
$my_sqli = mysqli_query($conn,$sql);
if($my_sqli){
    echo "successful!";
}
}
header("location:manage_orders.php");
?>