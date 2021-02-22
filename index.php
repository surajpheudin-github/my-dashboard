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
    <title>Order Management System</title>
</head>

<body>
    <?php
        include "sidebar.php";
        ?>

    <main class="col-11 offset-1 p-0">
        <div class="sidebar_control_div">
            <button class="btn sidebar_control_button"><i class="fa fa-bars" aria-hidden="true"></i></button>
        </div>
        <div class="top_nav_div">
            <p class="page_title">Dashboard</p>
            <a href=""><i class="fa fa-user-circle-o"></i></a>
            <a href=""><i class="fa fa-cog"></i></a>

        </div>
        <div class="stastics">
            <div class="customer_dashboard_stastics">
                <div class="heading">Products <i class="fa fa-users" aria-hidden="true"></i></div>
                <div class="total_number_of_stastics"><?php
                include 'connection.php';
                $sql = "SELECT * FROM product_details";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_num_rows($result);
                echo $row;
                ?></div>
            </div>
            <div class="order_dashboard_stastics">
                <div class="heading">Order <i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                <div class="total_number_of_stastics"><?php
                include 'connection.php';
                $sql = "SELECT * FROM order_details";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_num_rows($result);
                echo $row;
                ?></div>
            </div>
            <div class="confirmed_rate">
                <div class="heading">Confirmed Rate <i style="color:lightgreen" class="fa fa-check-circle"
                        aria-hidden="true"></i></div>
                <div class="total_number_of_stastics">40%</div>
            </div>

            <div class="sales_stastics">
                <div class="heading">Sales <i class="fa fa-money" aria-hidden="true"></i></div>
                <div class="total_number_of_stastics"><?php
                include 'connection.php';
                $result = mysqli_query($conn, 'SELECT SUM(total_amount) AS value_sum FROM order_details'); 
                $row = mysqli_fetch_assoc($result); 
                $sum = $row['value_sum'];
                echo "RS ".$sum;
                ?></div>
            </div>
        </div>
        <div class="recent_orders">
            <div class="recent_orders_table_title">Recent Orders</div>
            <div class="recent_orders_table_div">

                <?php
            include "connection.php";

            $sql = "SELECT * FROM order_details ORDER BY order_id DESC limit 5";
            $mysql = mysqli_query($conn,$sql);

            //table for order_details started
            echo "<table class='table table-sm text-nowrap table-hover recent_orders_table'>";
                    
            echo "<thead>
            <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Customer Name</th>
            <th>Poduct Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Price</th>
            <th>Shipping Charge</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Remarks</th>
            </tr>
            </thead>
            ";
            echo "<tbody>";
            while($result = $mysql -> fetch_assoc()){
                echo "<tr>
                <td>".$result['order_id']."</td>
                <td>".$result['date']."</td>
                <td>".$result['customer_name']."</td>
                <td>".$result['product_name']."</td>
                <td>".$result['contact_number']."</td>
                <td>".$result['address']."</td>
                <td>".$result['price']."</td>
                <td>".$result['shipping_charge']."</td>
                <td>".$result['total_amount']."</td>
                <td>".$result['status']."</td>
                <td>".""."</td></tr>";
                    
            }
            echo " </tbody>";
             echo "</table>";
            ?>
            </div>
        </div>
    </main>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
</body>

</html>