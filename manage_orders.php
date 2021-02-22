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
    <title>Order Management System</title>
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
            <p class="page_title">Manage Orders</p>
            <a href=""><i class="fa fa-user-circle-o"></i></a>
            <a href=""><i class="fa fa-cog"></i></a>
        </div>

        <!-- main section -->
        <div class="manage_orders_top_div m-0 row">

            <!-- add order form -->
            <div class="add_order_div">
                <form action="addorder.php" method="POST">
                    <div class="form_title">Add New Order</div>
                    <div class="form_main">
                        <?php
                            include 'connection.php';
                            $sql = "SELECT product_name from product_details ";
                            $product_data = mysqli_query($conn,$sql);
                            echo "<select name="."'"."product_name"."'>";
                            echo ("<option> Select Product</option>");
                            while($result = $product_data -> fetch_assoc()){
                                $list = $result["product_name"];
                            echo ("<option value="."'".$list."'".">".$list."</option>");
                            
                            }
                            echo "</select>";
                        ?> <br />
                        <input type="text" placeholder="Customer Name" name="customer_name" id="customer_name"
                            required /><br />
                        <input type="number" placeholder="Contact Number" name="contact_number" id="contact_number"
                            required />
                        <input type="text" placeholder="Address" name="address" id="address" required /><br />
                        <input type="number" placeholder="Price" name="price" id="price" required />
                        <input type="number" placeholder="Shipping charge" name="shipping_charge" id="shipping_charge"
                            required />
                        <br />
                        <button class="btn newOrder-button" name="addorder">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>

            <!-- add product form -->
            <div class="add_product_div">
                <form action="addproduct.php" method="POST">
                    <div class="form_title">Add New Product</div>
                    <div class="form_main">
                        <input type="text" placeholder="Product Name" name="product_name" id="product_name"
                            required /><br />
                        <input type="number" placeholder="Product Price" name="product_price" id="product_price"
                            required />
                        <button class="btn newproduct-button">
                            Add Product
                        </button>
                    </div>
                </form>
            </div>

            <div class="product_listing_div">
                <div class="product_listing_table_title">All Products
                    <input type="text"></input><button class="btn" type="submit"><i class="fa fa-search"
                            aria-hidden="true"></i></button>
                </div>
                <div class="product_listing_table_div">

                    <?php
            include "connection.php";

            $sql = "SELECT * FROM product_details ORDER BY product_name";
            $mysql = mysqli_query($conn,$sql);

            

            //table for order_details started_table
            echo "<table class='table table-sm text-nowrap table-hover product_listing_table'>";
                    
            echo "<thead>
            <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            </tr>
            </thead>
            ";
            echo "<tbody>";
            $count = 1;
            while($result = $mysql -> fetch_assoc()){
                   echo "<tr>
                    <td>".$count."</td>
                    <td>".$result['product_name']."</td>
                    <td>".$result['product_price']."</td></tr>";
                    $count++;
            }
            echo " </tbody>";
             echo "</table>";
            ?>
                </div>
            </div>
        </div>
        <div class="order_list">
            <div class="recent_100_orders_table_title">Latest 100 Orders
                <a href="#">Show All</a>
            </div>
            <div class="recent_100_orders_table_div">

                <?php
            include "connection.php";

            $sql = "SELECT * FROM order_details ORDER BY order_id DESC limit 100";
            $mysql = mysqli_query($conn,$sql);

            //table for order_details started
            echo "<table class='table table-sm text-nowrap table-hover recent_100_orders_table'>";
                    
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
            <th>Action</th>
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
                    <td>
                    <select>
                    <option>Confirmed</option>
                    <option>Cancelled</option>
                    <option>Shipping</option>
                    <option>Delivered</option>
                    </select>
                    </td>
                    <td>
                  <a  href='update.php?id=".$result['order_id']."' style='margin: 0px 5px; color:blue;'><i class='fa fa-edit'></i><a>
                 <a  href='delete.php?id=".$result['order_id']."' style='margin: 0px 5px; color:indianred'><i class='fa fa-trash'></i><a>
                    </td>
                    </tr>";
                    
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