<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "management_system";

$conn = mysqli_connect($dbserver,$dbuser,$dbpassword,$dbname);
if($conn){
    ?>
<script>
console.log("Connection to database successfully");
</script>
<?php
}
?>