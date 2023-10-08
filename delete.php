<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');
if(isset($_GET['id'])) {
$proID = $_GET['id'];
$targetPro = "DELETE FROM products WHERE pid = $proID";
$checkQuery = mysqli_query($connection, $targetPro);
if($checkQuery) {
    echo "<script>
    alert('data has been permanently deleted');
    window.location.href='viewproduct.php';
    </script>";
}else {
    echo "<script>alert('Error deleting data');</script>";
}
}

?>