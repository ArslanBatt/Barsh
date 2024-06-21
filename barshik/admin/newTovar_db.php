<?php
include "../connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['Name']);
    $category = mysqli_real_escape_string($con, $_POST['Category_id']);
    $price = mysqli_real_escape_string($con, $_POST['Price']);
    $description = mysqli_real_escape_string($con, $_POST['Description']);
    $image = $_FILES['Image'];

    // Checking for upload errors
    if ($image['error'] === 0) {
        // Path to the directory for image uploads
        $targetDir = "../images/";
        $targetFile = $targetDir . basename($image['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Allowed file types
        $allowedTypes = ['jpg', 'png', 'jpeg', 'gif'];
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                // Insert data into the database
                $query = "INSERT INTO Product (Name, Category_id, Price, Description, Image) VALUES ('$name', '$category', '$price', '$description', '" . mysqli_real_escape_string($con, $image['name']) . "')";
                if (mysqli_query($con, $query)) {
                    header("Location: newTovar.php");
                    exit();
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($con);
                }
            } else {
                // More detailed error messages
                if (!file_exists($targetDir)) {
                    echo "Directory does not exist: $targetDir";
                } elseif (!is_writable($targetDir)) {
                    echo "Directory is not writable: $targetDir";
                } else {
                    echo "Failed to move uploaded file.";
                }
            }
        } else {
            echo "Invalid file format. Only JPG, JPEG, PNG, and GIF are allowed.";
        }
    } else {
        echo "File upload error: " . $image['error'];
    }
}
?>
