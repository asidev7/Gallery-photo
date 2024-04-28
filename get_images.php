<?php
// Include database configuration
include_once 'db_config.php';

// Query to fetch images from database
$query = "SELECT * FROM images";
$result = mysqli_query($conn, $query);

// Fetch images as associative array
$images = array();
while ($row = mysqli_fetch_assoc($result)) {
    $images[] = $row;
}

// Return images as JSON
header("Content-type: application/json");
echo json_encode($images);
?>
