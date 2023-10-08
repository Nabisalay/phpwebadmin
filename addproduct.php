<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');

if(isset($_POST['addProduct'])) {
    $pdtTitle = $_POST['pTitle'];
    $pdtCtgry = $_POST['pCtgry'];
    $pdtDes = $_POST['pDes'];
    $pdtImg = $_FILES['pImg']['name'];
    $imgTemName = $_FILES['pImg']['tmp_name'];
    $imgSize = $_FILES['pImg']['size'];
    move_uploaded_file($imgTemName , 'images/'.$pdtImg);
    $instQuery = "INSERT INTO `products` (`ptitle`, `pcat`, `pdes`, `pimg`) VALUES ('$pdtTitle', '$pdtCtgry', '$pdtDes',
     '$pdtImg')";
     $checkQuery = mysqli_query($connection, $instQuery);
     if(!$checkQuery) {
        echo "<script> alert('some error occurs')</script>";
     }else {
        echo "<script> alert('data inserted successfully')</script>";
     };
};

if(isset($_POST['addCategory'])) {
    $ctitle = $_POST['category'];
    $sqlQuery = "INSERT INTO `category` (`cname`) VALUES ('$ctitle')";
     $check2ndQuery = mysqli_query($connection, $sqlQuery);
     if(!$check2ndQuery) {
        echo "<script> alert('some error occurs')</script>";
     }else {
        echo "<script> alert('data inserted successfully')</script>";
     };
};


$fetchCat = "SELECT * FROM `category`";
$checkCat = mysqli_query($connection, $fetchCat);
if(mysqli_num_rows($checkCat) > 0) {



?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
            <h2>Add Category</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Product Title" name="category" required>
                </div>
                <input type="submit" class="btn btn-primary " name="addCategory" value="Add Category" >                                
            </div>
            </form>
            <hr>

                <h2>Add Product</h2>
        <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Product Title" name="pTitle" required>
                </div>
                <div class="col-sm-6">
                    <select name="pCtgry" class="form-select"  aria-label="Default select example">
                        <option  selected>Open this select menu</option>
                        <?php while($data = mysqli_fetch_assoc($checkCat)) {?>
                            <option  value="<?php echo $data['cid']?>"><?php echo $data['cname']?></option>
                            <?php 
}
}
?>
                    </select>
                 </div>
            </div>
            <div class="form-group">
                <input type="des" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Product Description" name="pDes" required>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="file" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Product Image" name="pImg" required>
                </div>

            </div>
            <!-- <a class="btn btn-primary btn-user btn-block" name="register">
                Register Account
            </a> -->
            <input type="submit" class="btn btn-primary btn-user btn-block" name="addProduct" value="Add Product" >                                
        </form>

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>