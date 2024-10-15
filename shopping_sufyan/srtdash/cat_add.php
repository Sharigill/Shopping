<?php 

include("connection.php");
include("asside.php");

?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
        <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Categories</h1>

</div>

<!-- Content Row -->
<div class="card-body">

    <!-- Form -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label danger">Category Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="cname" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Category Description</label>
            <input type="text" class="form-control" name="discription" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Category Image</label>
            <input type="file" class="form-control" name="cimage" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" name="catbtn" >Add Category</button>
    
</div>
</div>
</div>

<?php

if (isset($_POST['catbtn'])) {
// Retrieve form data
$cat_name = $_POST['cname'];
$cat_disc = $_POST['discription'];
$cat_img = $_FILES['cimage']['name'];
$temp_cat = $_FILES['cimage']['tmp_name']; 
$destination = "img/".$cat_img;
$extention = pathinfo($cat_img,PATHINFO_EXTENSION);
if($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg'){
    // Move the uploaded file to the destination
if (move_uploaded_file($temp_cat, $destination)) {
    // Prepare and execute the SQL query
$query = mysqli_query($con,"INSERT INTO `category`( `Name`, `description`, `image`) VALUES ('$cat_name','$cat_disc','$cat_img')")  ;   
    // Make sure $mysqli is a valid connection object
    echo "<script>alert('succecfully Added')
    window.location.href='view_cat.php';</script>";
} 
else {
    echo "Failed to upload file.";
}
}else{
    echo "<script>alert('Extention Does not Match')</script>";
}


}



?>

</div>
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
