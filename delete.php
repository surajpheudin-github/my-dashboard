<?php
include 'connection.php';
?>

<?php
$currentId = $_GET['id'];
$query = "DELETE FROM `order_details` WHERE order_id = $currentId";
mysqli_query($conn, $query);
header("location:manage_orders.php");
?>