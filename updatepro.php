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
    `ptitle` = $pdtTitle,
    `pcat` = $pdtCtgry,
    `pdes` = $pdtDes,
    `pimg` = $pdtImg
     where pid = $proID";
     $checkupdate = mysqli_query($connection, $updateQuery);
     if(!$checkupdate) {
        echo "<script> alert('some error occurs')</script>";
     }else {
        echo "<script> alert('data inserted successfully')</script>";
     };
};

$productID = $_GET['id'];
$targetProduct = "SELECT * FROM `products` as p JOIN `category` as c on p.pcat = c.cid where pid = $productID";
$checkQuery = mysqli_query($connection, $targetProduct);
if(mysqli_num_rows($checkQuery) > 0) {
    $data = mysqli_fetch_assoc($checkQuery)


?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">


                <h2>Add Product</h2>
        <form class="user" action="updateproduct.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type='hidden' name='proID' value="<?php echo $data['pid'];?>">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Product Title" name="pTitle" value='<?php echo $data['ptitle'];?>' required>
                </div>
                <div class="col-sm-6">
                    <select  name="pCtgry" class="form-select"  aria-label="Default select example">
                       <option disabled selected><?php echo $data['cname'];?></option>
                       <?php 
                       $fetchCat = "SELECT * FROM `category`";
                       $checkCat = mysqli_query($connection, $fetchCat);
                       if(mysqli_num_rows($checkCat) > 0) {
                       while($catdata = mysqli_fetch_assoc($checkCat)) {
                       ?>
                       <option  value="<?php echo $catdata['cid']?>"><?php echo $catdata['cname']; } }?></option>
                    </select>
                 </div>
            </div>
            <div class="form-group">
                <input type="des" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Product Description" value="<?php echo $data['pdes'];?>" name="pDes" required>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="file" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Product Image" name="pImg" required>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <img src="<?php echo 'images/'.$data['pimg'] ?>" alt="" height='70px' width="70px">
                </div>

            </div>
            <!-- <a class="btn btn-primary btn-user btn-block" name="register">
                Register Account
            </a> -->
            <input type="submit" class="btn btn-primary btn-user btn-block" name="updateProduct" value="Add Product" >                                
            <?php 

            }
            ?>
        </form>

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>