<?php
include('asside.php'); // Include your database connection file

if (isset($_GET['aid'])) {
    $id = $_GET['aid'];

    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($mysqli, $id);

    // Fetch the order date from the database
    $query = "SELECT order_at FROM orderss WHERE id = '$id'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        $order = mysqli_fetch_assoc($result);

        // Check if the order exists
        if ($order) {
            // Create DateTime objects for comparison
            $orderDate = new DateTime($order['order_at']);
            $currentDate = new DateTime();
            $interval = $currentDate->diff($orderDate); // Calculate the difference

            // Debugging Output (uncomment if needed)
            // echo "Order Date: " . $order['order_at'] . "<br>";
            // echo "Current Date: " . $currentDate->format('Y-m-d H:i:s') . "<br>";
            // echo "Days Difference: " . $interval->days . "<br>";

            // Check if the order is older than 3 days
            if ($interval->days <= 3) {  // Change here to allow cancellation within 3 days
                // Delete the order from the database
                $deleteQuery = "DELETE FROM orderss WHERE id = '$id'";

                if (mysqli_query($mysqli, $deleteQuery)) {
                    // Redirect after successful deletion
                    echo "<script>alert('Order deleted successfully!'); location.assign('home7-shoes.php');</script>";
                } else {
                    echo "<script>alert('Error deleting order: " . mysqli_error($mysqli) . "'); location.assign('home7-shoes.php');</script>";
                }
            } else {
                echo "<script>alert('Order cannot be deleted as it is older than 3 days.'); location.assign('home7-shoes.php');</script>";
            }
        } else {
            echo "<script>alert('Order not found.'); location.assign('home7-shoes.php');</script>";
        }
    } else {
        echo "<script>alert('Error fetching order: " . mysqli_error($mysqli) . "'); location.assign('home7-shoes.php');</script>";
    }
} else {
    echo "<script>alert('No order ID provided.'); location.assign('home7-shoes.php');</script>";
}
?>
