<?php
include 'connection.php';
?>

<?php

if(isset($_POST['update_order'])){
    echo "clicked";
$current_id = $_GET['id'];
$product_name = $_POST['product_name'];
$customer_name = $_POST['customer_name'];
$contact_number = $_POST['contact_number'];
$address = $_POST['address'];
$price = $_POST['price'];
$shipping_charge = $_POST['shipping_charge'];
$total_amount = $price + $shipping_charge;
$query = "UPDATE order_details SET product_name='$product_name', customer_name='$customer_name', contact_number='$contact_number', address='$address', price='$price', shipping_charge = '$shipping_charge', total_amount='$total_amount' WHERE order_id = '$current_id'";
$mysqli = mysqli_query($conn, $query);
header("location:manage_orders.php");
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/manage_orders.css">
    <title>Update</title>
</head>

<body>

    <?php
        include "sidebar.php";
    ?>


    <main class="col-11 offset-1 p-0 ">
        <div class="sidebar_control_div">
            <button class="btn sidebar_control_button"><i class="fa fa-bars" aria-hidden="true"></i></button>
        </div>
        <div class="top_nav_div">
            <p class="page_title">Update Orders</p>
            <a href=""><i class="fa fa-user-circle-o"></i></a>
            <a href=""><i class="fa fa-cog"></i></a>
        </div>

        <!-- main section -->
        <div class="manage_orders_top_div m-0 row">

            <!-- add order form -->
            <div class="add_order_div">
                <form action="" method="POST">
                    <div class="form_title">Update Order</div>
                    <div class="form_main">
                        <?php
                            include 'connection.php';
                            $current_id = $_GET['id'];
                            $sql = "SELECT product_name from product_details";
                            $sql2 = "SELECT * from order_details WHERE order_id = '$current_id'";
                            $product_data = mysqli_query($conn,$sql);
                            $order_data = mysqli_query($conn,$sql2);
                            echo "<select name="."'"."product_name"."'>";
                            echo ("<option> Select Product</option>");
                            while($result = $product_data -> fetch_assoc()){
                                $list = $result["product_name"];
                            echo ("<option value="."'".$list."'".">".$list."</option>");
                            
                            }
                            echo "</select>";
                        ?>
                        <input type="text" placeholder="Customer Name" name="customer_name" id="customer_name"
                            required /><br />
                        <input type="number" placeholder="Contact Number" name="contact_number" id="contact_number"
                            required />
                        <input type="text" placeholder="Address" name="address" id="address" required /><br />
                        <input type="number" placeholder="Price" name="price" id="price" required />
                        <input type="number" placeholder="Shipping charge" name="shipping_charge" id="shipping_charge"
                            required />
                        <br />
                        <button class="btn newOrder-button" name="update_order">
                            Update Order
                        </button>
                    </div>
                </form>
            </div>