<?php 
include("asside.php");
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

        $fet2 = mysqli_query($con, "SELECT * FROM orderss WHERE id=$uppro");
        $excistpro = mysqli_fetch_assoc($fet2);
    } ?>

    <!-- Form -->
    <form action="" method="post" enctype="multipart/form-data">
       
       
        

        <select name="upcat">
                <option value="pending/Processing">pending/Processing</option>
                <option value="Delivered">Delivered</option>
                <option value="Cancelled">Cancelled</option>
        </select>

        <button type="submit" class="btn btn-primary" name="probtn">Update Product</button>
    </form>
</div>

<?php
if (isset($_POST['probtn'])) {
    // Retrieve form data
    $cat = $_POST['upcat'];

    
    // Prepare and execute the SQL query
    $query = mysqli_query($con, "UPDATE `orderss` 
        SET `Statement_pr`='$cat' 
        WHERE id=$uppro");

    if ($query) {
        echo "<script>alert('Product updated successfully');
        window.location.href='view_orders.php';</script>";
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
