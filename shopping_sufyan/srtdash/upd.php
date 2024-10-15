<?php 
// include("asside.php");
include("connection.php");
?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
        <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Product</h1>

</div>

<!-- Content Row -->
<div class="card-body">
    <?php if (isset($_GET['id'])) {
        $uppro = $_GET['id'];

        $fet2 = mysqli_query($con, "SELECT * FROM products WHERE id=$uppro");
        $excistpro = mysqli_fetch_assoc($fet2);
    } ?>

    <!-- Form -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label danger">Product Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="upname" aria-describedby="emailHelp" value="<?php echo $excistpro['pro_name']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Product Description</label>
            <input type="text" class="form-control" name="updiscription" id="exampleInputPassword1" value="<?php echo $excistpro['pro_discription']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Product Price</label>
            <input type="text" class="form-control" name="upprice" id="exampleInputPassword1" value="<?php echo $excistpro['pro_price']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Product QTY</label>
            <input type="number" class="form-control" name="upqty" id="exampleInputPassword1" value="<?php echo $excistpro['pro_QTY']; ?>">
        </div>
      
        <div class="mb-3">
            <?php if (!empty($excistpro['pro_image'])): ?>
                <div>
                    <p>Current file: <div style="border: solid 1px gray; width: 150px; border-radius: 5px;"><?php echo htmlspecialchars($excistpro['pro_image']); ?></div></p>
                    <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($excistpro['pro_image']); ?>">
                </div>
            <?php endif; ?>
            <label for="exampleInputPassword1" class="form-label">Product Image</label>
            <input type="file" class="form-control" name="upimage" id="exampleInputPassword1">
        </div>

        <select name="upcat">
            <option value="">Choose Category</option>
            <?php $data  = mysqli_query($con, "select * from category");
            while ($cat = mysqli_fetch_assoc($data)) { ?>
                <option value="<?php echo $cat['id']; ?>" <?php if ($excistpro['categorey'] == $cat['id']) echo 'selected'; ?>>
                    <?php echo $cat['Name']; ?>
                </option>
            <?php } ?>
        </select>

        <button type="submit" class="btn btn-primary" name="probtn">Update Product</button>
    </form>
</div>

<?php
if (isset($_POST['probtn'])) {
    // Retrieve and escape form data
    $up_name = mysqli_real_escape_string($con, $_POST['upname']);
    $up_disc = mysqli_real_escape_string($con, $_POST['updiscription']);
    $up_price = mysqli_real_escape_string($con, $_POST['upprice']);
    $up_qty = mysqli_real_escape_string($con, $_POST['upqty']);
    $cat = mysqli_real_escape_string($con, $_POST['upcat']);

    // Image handling
    if (!empty($_FILES['upimage']['name'])) {
        $upimage = $_FILES['upimage']['name'];
        $temp_image = $_FILES['upimage']['tmp_name'];
        $destination = "img/" . $upimage;
        $extension = pathinfo($upimage, PATHINFO_EXTENSION);
        
        if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
            // Move uploaded file
            if (move_uploaded_file($temp_image, $destination)) {
                $image_to_save = $upimage;
            } else {
                echo "Failed to upload file.";
                $image_to_save = $_POST['existing_image'];
            }
        } else {
            echo "<script>alert('Extension does not match');</script>";
            $image_to_save = $_POST['existing_image'];
        }
    } else {
        $image_to_save = $_POST['existing_image']; // Keep the existing image
    }

    // Prepare and execute the SQL query
    $query = mysqli_query($con, "UPDATE `products` 
        SET `pro_name`='$up_name', `pro_discription`='$up_disc', `pro_price`='$up_price', `pro_QTY`='$up_qty', `pro_image`='$image_to_save', `categorey`='$cat' 
        WHERE id=$uppro");

    if ($query) {
        echo "<script>alert('Product updated successfully');
        window.location.href='view_product.php';</script>";
    } else {
        echo "Failed to update product.";
    }
}

?>

        <!-- main content area end -->
        <?php 
include("footer.php");
?>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
