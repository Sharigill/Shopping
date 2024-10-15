<?php
include('connection.php');
// include('asside.php')

?>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Categories</h1>

    </div>

    <!-- Content Row -->
    <div class="card-body">
        <?php

        if (isset($_GET['id'])) {
            $up = $_GET['id'];

            $fet2 = mysqli_query($con, "SELECT * FROM category WHERE id=$up");
            $excist = mysqli_fetch_assoc($fet2);
        }

        ?>

        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label danger">Category Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="fname" aria-describedby="emailHelp" value="<?php echo $excist['Name'] ?>">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category Description</label>
                <input type="text" class="form-control" name="fdiscription" id="exampleInputPassword1" value="<?php echo $excist['description'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category Image</label>

                <?php if (!empty($excist['image'])): ?>
                    <div>
                        <p>Current file: <?php echo htmlspecialchars($excist['image']); ?></p>
                        <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($excist['image']); ?>">
                    </div>
                <?php endif; ?>

                <input type="file" class="form-control" name="fimage" id="exampleInputPassword1" value="<?php echo $excist['Image']?>">
            </div>

    </div>

    <button type="submit" class="btn btn-primary" name="fetch_btn">Add Category</button>

</div>
</div>
</div>

<?php

if (isset($_POST['fetch_btn'])) {
    // Retrieve form data
    $fetch_cat_name = $_POST['fname'];
    $fetch_cat_disc = $_POST['fdiscription']; // Corrected spelling here
    $fetch_cat_img = $_FILES['fimage']['name'];
    $temp_cat = $_FILES['fimage']['tmp_name']; // Corrected variable name

    // Define the destination path for the uploaded file
    $destination = "img/" . $fetch_cat_img;

    // Move the uploaded file to the destination
    if (move_uploaded_file($temp_cat, $destination)) {
        // Prepare and execute the SQL query
        $query = mysqli_query($con, "UPDATE `category` SET `Name`=' $fetch_cat_name',`Description`='$fetch_cat_disc',`image`='$fetch_cat_img' WHERE id=$up");
        // Make sure $mysqli is a valid connection object
        echo "<script>alert('succecfully Added')
        window.location.href='view_cat.php';</script>";
    } else {
        echo "Failed Updated.";
    }
}



?>

<!-- Footer -->
<?php
// include('footer.php');
?>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>