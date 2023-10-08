<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');



if(isset($_POST['updateProduct'])) {

    $proID = $_POST['proID'];
    $pdtTitle = $_POST['pTitle'];
    $pdtCtgry = $_POST['pCtgry'];
    $pdtDes = $_POST['pDes'];
    $pdtImg = $_FILES['pImg']['name'];
    $imgTemName = $_FILES['pImg']['tmp_name'];
    $imgSize = $_FILES['pImg']['size'];
    move_uploaded_file($imgTemName , 'images/'.$pdtImg);
    $updateQuery = "UPDATE `products` SET
    `ptitle` = '$pdtTitle',
    `pcat` = '$pdtCtgry',
    `pdes` = '$pdtDes',
    `pimg` = '$pdtImg'
    WHERE `pid` = $proID";
     $checkupdate = mysqli_query($connection, $updateQuery);
     if(!$checkupdate) {
        echo "<script> alert('some error occurs')</script>";
     }else {
        echo "<script>
         alert('data updated successfully')
         window.location.href='viewproduct.php'
         </script>";

     };
}




?>


<?php
include('admin/includes/footer.php');


?>