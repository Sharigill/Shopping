<?php
include('connection.php');

if (isset($_POST['probtn'])) {
    $name = trim($_POST['proname']);

    // Check if name is empty
    if (empty($name)) {
        echo "Name cannot be empty";
        return;
    }

    // Prepare a statement to get the last product_id
    $checkuid = "SELECT product_id FROM `products` ORDER BY id DESC LIMIT 1";
    $checkresult = mysqli_query($mysqli, $checkuid);

    if ($checkresult && mysqli_num_rows($checkresult) > 0) {
        $row = mysqli_fetch_assoc($checkresult);
        $uid = $row['product_id']; // Changed to product_id
        $get_numbers = str_replace("SR", "", $uid);
        $id_increase = (int)$get_numbers + 1;
        $get_string = str_pad($id_increase, 5, '0', STR_PAD_LEFT);
        $id = "SR" . $get_string;
    } else {
        $id = "SR00001";
    }

    // Prepare the insert statement
    if ($stmt = $mysqli->prepare("INSERT INTO `products`(`product_id`, `pro_name`) VALUES (?, ?)")) {
        $stmt->bind_param("ss", $id, $name);

        if ($stmt->execute()) {
            echo 'Entry added: ' . htmlspecialchars($id); // Use htmlspecialchars for output
        } else {
            echo "Error: " . htmlspecialchars($stmt->error);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . htmlspecialchars($mysqli->error);
    }
}

// Close the connection
mysqli_close($mysqli);
?>
