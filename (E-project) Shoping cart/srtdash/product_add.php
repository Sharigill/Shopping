<?php 
include("connection.php");
include("asside.php");
?>

<!-- main content area start -->
<div class="main-content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
        </div>

        <!-- Content Row -->
        <div class="card-body">
            <!-- Form -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="proname" class="form-label danger">Product Name</label>
                    <input type="text" class="form-control" id="proname" name="proname" required>
                </div>
                <div class="mb-3">
                    <label for="prodiscription" class="form-label">Product Description</label>
                    <input type="text" class="form-control" name="prodiscription" id="prodiscription" required>
                </div>
                <div class="mb-3">
                    <label for="proprice" class="form-label">Product Price</label>
                    <input type="number" class="form-control" name="proprice" id="proprice" required step="0.01">
                </div>
                <div class="mb-3">
                    <label for="proqty" class="form-label">Product QTY</label>
                    <input type="number" class="form-control" name="proqty" id="proqty" required>
                </div>
                <div class="mb-3">
                    <label for="proimage" class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="proimage" id="proimage" required>
                </div>
                <div class="mb-3">
                    <label for="cat" class="form-label">Choose Category</label>
                    <select name="cat" id="cat" class="form-select" required>
                        <option value="">Choose Category</option>
                        <?php 
                        $data  = mysqli_query($con,"SELECT * FROM category");
                        while($cat = mysqli_fetch_assoc($data)) { ?>
                            <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['Name']); ?></option>
                        <?php } ?> 
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="probtn">Add Product</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['probtn'])) {
    // Retrieve form data and sanitize inputs
    $pro_name = mysqli_real_escape_string($con, $_POST['proname']);
    $pro_disc = mysqli_real_escape_string($con, $_POST['prodiscription']);
    $pro_price = mysqli_real_escape_string($con, $_POST['proprice']);
    $pro_qty = mysqli_real_escape_string($con, $_POST['proqty']);
    $cat = mysqli_real_escape_string($con, $_POST['cat']);
    $pro_img = $_FILES['proimage']['name'];
    $temp_img = $_FILES['proimage']['tmp_name']; 
    $destination = "img/" . basename($pro_img);
    $extension = pathinfo($pro_img, PATHINFO_EXTENSION);

    // Validate file extension
    if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
        // Move the uploaded file to the destination
        if (move_uploaded_file($temp_img, $destination)) {
            // Generate new product ID
            $checkuid = "SELECT product_id FROM `products` ORDER BY id DESC LIMIT 1";
            $checkresult = mysqli_query($con, $checkuid);
            if ($checkresult && mysqli_num_rows($checkresult) > 0) {
                $row = mysqli_fetch_assoc($checkresult);
                $uid = $row['product_id'];
                $get_numbers = str_replace("SR", "", $uid);
                $id_increase = (int)$get_numbers + 1;
                $get_string = str_pad($id_increase, 5, '0', STR_PAD_LEFT);
                $product_id = "SR" . $get_string;
            } else {
                $product_id = "SR00001";
            }

            // Prepare and execute the SQL query
            $query = "INSERT INTO `products`(`product_id`, `pro_name`, `pro_discription`, `pro_price`, `pro_QTY`, `pro_image`, `categorey`) 
                      VALUES ('$product_id', '$pro_name', '$pro_disc', '$pro_price', '$pro_qty', '$pro_img', '$cat')";
            if (mysqli_query($con, $query)) {
                echo "<script>alert('Successfully added product'); window.location.href='view_product.php';</script>";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "<script>alert('Failed to upload file.');</script>";
        }
    } else {
        echo "<script>alert('File extension does not match.');</script>";
    }
}
?>

<!-- Include footer -->
<?php include("footer.php"); ?>

<!-- jQuery and Bootstrap JS -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>
