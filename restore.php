<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');
$proID = $_GET['id'];

$targetPro = "UPDATE products SET `pstatus` = 1 WHERE pid = $proID";
$checkQuery = mysqli_query($connection, $targetPro);
if($checkQuery) {
    echo "<script>
    alert('data has been restored');
    window.location.href='viewproduct.php';
    </script>";
}


?>