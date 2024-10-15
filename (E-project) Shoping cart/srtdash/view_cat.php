<?php 
include("asside.php");
include("connection.php");
?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
        <style>
        .image-container {
            width: 80px;
            
            height: 80px;
            overflow: hidden;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f4f4f4;
        }

        .image-container img {
            width: 100%;
            height: auto;
        }

        th {
            color: black;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .panel-container {
            max-width: 1000px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .panel-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 15px 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .table-container {
            padding: 20px;
        }

        .table th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table thead th {
            border-bottom: 2px solid #dee2e6;
        }

        .btn-action {
            display: inline-block;
            margin-right: 5px;
        }

        i {
            margin-left: 10px;
        }

        .demo {
            background-color: yellow;
            
        }
    </style>
</head>

<body>
    <div class="panel-container">
        <div class="panel-header">
            User Information
        </div>
        <div class="table-container">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Discription</th>
                        <th>image</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- Data rows will be populated here -->
                    <?php
                    $fet = mysqli_query($con, "SELECT `id`, `Name`, `Description`, `image` FROM `category`");
                    while ($row = mysqli_fetch_assoc($fet)) {

                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['Description'] ?></td>
                            <td><img src="img/<?php echo $row['image']?>" style="height: 100px;
                            width: 150px; border-radius: 8px; border: solid 2px black;" alt=""></td>


                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info btn-action">Edit</a>
                                <a href="view_cat.php?id=<?php echo $row['id']; ?>" onclick="return confirm ('Are you sure you want to delete this record?')" class="btn btn-sm btn-danger btn-action" name="delt"> Delete<i class="fas fa-trash-alt"></i></a>
                            </td>

                        </tr>
                    <?php
                    } ?>
                    <!-- More data rows -->
                </tbody>
            </table>
        </div>
    </div>

    <?php
    if (isset($_GET['id'])) {

        $del = $_GET['id'];
        $delrow = mysqli_query($con, "DELETE FROM `category` WHERE id=$del");
    
        if($delrow){
            echo "<script>alert('succecfully Deleted')
            window.location.href='view_cat.php';</script>";
        }else{
            echo "<script>alert ('data not Deleted')</script>";

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
