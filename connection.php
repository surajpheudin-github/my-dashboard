<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "maruti_bazaar_data";

$conn = mysqli_connect($dbserver,$dbuser,$dbpassword,$dbname);
if($conn){
    ?>
<script>
console.log("Connection to database successfully");
</script>
<?php
}
?>