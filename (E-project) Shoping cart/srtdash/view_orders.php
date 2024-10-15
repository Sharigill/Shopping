<?php 
include("asside.php");
include('connection.php');
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
            overflow-x: auto;
            white-space: nowrap;
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
            font-weight: 300;
            font-size: 1rem;
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
            Orders Fetch
        </div>
        <div class="table-container" >
            <table class="table table-striped table-hover" style="">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Email</th>
                        <th>tel Num</th>
                        <th>Whatsapp</th>
                        <th>Address</th>
                        <th>Apart</th>
                        <th>City</th>
                        <th>Postal</th>
                        <th>Country</th>
                        <th>Payment</th>
                        <th>Order_ID</th>
                        <th>User_ID</th>
                        <th>Product_ID</th>
                        <th>Product_Name</th>
                        <th>Product_price</th>
                        <th>Product_qualty</th>
                        <th>statement</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- Data rows will be populated here -->
                    <?php
                    $fet = mysqli_query($con, "SELECT `id`, `u_name`, `fnam`, `lnam`, `uemaill`, `tel`, `comp`, `address`, `apart`, `city`, `postal`, `country`, `payment`, `order_id`, `uid`, `prrid`, `pnam`, `ppric`, `pqt`, `order_at`, `Statement_pr` FROM `orderss` ");
                    while ($row = mysqli_fetch_assoc($fet)) {
                        
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['u_name'] ?></td>
                            <td><?php echo $row['fnam'] ?></td>
                            <td><?php echo $row['lnam'] ?></td>
                            <td><?php echo $row['uemaill'] ?></td>
                            <td><?php echo $row['tel'] ?></td>
                            <td><?php echo $row['comp'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['apart'] ?></td>
                            <td><?php echo $row['city'] ?></td>
                            <td><?php echo $row['postal'] ?></td>
                            <td><?php echo $row['country'] ?></td>
                            <td><?php echo $row['payment'] ?></td>
                            <td><?php echo $row['order_id'] ?></td>
                            <td><?php echo $row['uid'] ?></td>
                            <td><?php echo $row['prrid'] ?></td>
                            <td><?php echo $row['pnam'] ?></td>
                            <td><?php echo $row['ppric'] ?></td>
                            <td><?php echo $row['pqt'] ?></td>
                            <td><?php echo $row['Statement_pr'] ?></td>


                            <td>
                                <a href="upd2.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info btn-action">Edit</a>
                                <a href="view_orders.php?id=<?php echo $row['id']; ?>" onclick="return confirm ('Are you sure you want to delete this record?')" class="btn btn-sm btn-danger btn-action" name="delt"> Delete<i class="fas fa-trash-alt"></i></a>
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
        $delrow = mysqli_query($con, "DELETE FROM `orderss` WHERE id=$del");
    
        if($delrow){
            echo "<script>alert('Order succecfully Deleted')
            window.location.href='view_orders.php';</script>";
        }else{
            echo "<script>alert ('Order not Deleted')</script>";

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