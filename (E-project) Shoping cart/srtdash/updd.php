<?php 
include("connection.php");
include("asside.php");
?>

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

            $fet2 = mysqli_query($con, "SELECT * FROM register WHERE id=$up");
            $excist = mysqli_fetch_assoc($fet2);
        }

        ?>

        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label danger">Category Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="fname" aria-describedby="emailHelp" value="<?php echo $excist['fname'] ?>">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category Description</label>
                <input type="text" class="form-control" name="flname" id="exampleInputPassword1" value="<?php echo $excist['lname'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category Description</label>
                <input type="text" class="form-control" name="femail" id="exampleInputPassword1" value="<?php echo $excist['emaill'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category Description</label>
                <input type="text" class="form-control" name="fpass" id="exampleInputPassword1" value="<?php echo $excist['pass'] ?>">
            </div>

    </div>

    <button type="submit" class="btn btn-primary" name="fetch_btn">Add Category</button>

</div>
</div>
</div>

<?php

if (isset($_POST['fetch_btn'])) {
    // Retrieve form data
    $fname = $_POST['fname'];
    $flname = $_POST['flname']; // Corrected spelling here
    $femail = $_POST['femail'];
    $fpass = $_POST['fpass'];

    $query = mysqli_query($con, "UPDATE `register` SET `fname`='$fname',`lname`='$flname',`emaill`='$femail',`pass`='$fpass' WHERE id=$up");

    // Move the uploaded file to the destination
   
        // Prepare and execute the SQL query
        
        // Make sure $mysqli is a valid connection object
        echo "<script>alert('succecfully Added')
        window.location.href='user_view.php';</script>";
  
}
else {
    echo "Failed Updated.";
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









