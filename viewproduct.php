<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
require('config.php');

$fetchProduct = "SELECT * FROM `products` as p JOIN `category` as c on p.pcat = c.cid WHERE p.pstatus = 1 order by p.pid DESC ";
$checkQuery = mysqli_query($connection, $fetchProduct);
if(mysqli_num_rows($checkQuery) > 0) {
?>

<link href = 'styles.css' rel="stylesheet"> 
    <div class="container">
  <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>All Products </h2>
                <hr>
            <table class="table table-warning">
                <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                    <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Update</th>
                    <th scope="col">Trash</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($data = mysqli_fetch_assoc($checkQuery)) { ?>
                    <tr class='position'>
                    <td><?php echo $data['ptitle'] ?></td>
                    <td><?php echo $data['cname'] ?></td>
                    <td><?php echo $data['pdes'] ?></td>
                    <td><?php echo $data['pstatus'] == 1 ? 'active' : 'deactive' ?></td>
                    <td> <img src="<?php echo 'images/'.$data['pimg'] ?>" alt="" height='50px' width='50px'> </td>                   
                    <td><a href="updatepro.php?id=<?php echo $data['pid'];?>">Update</a></td>
                    <td><a href="trash.php?id=<?php echo $data['pid'];?>">Trash</a></td>
                </tr>
                
   
                </tbody>
                <?php 
                    }
                }
                ?>
            </table>
            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </nav>

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>