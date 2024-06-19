<?php


// Define the upload directory
$target_dir = "images/";


// Create the upload path with filename
$target_file = $target_dir . basename($_FILES["myfile"]["name"]);


// a flag to check if upload is successful
$uploadOk = 1;


// Get file extension
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// Check if image file (for demonstration purposes)
if (isset($_POST["submit"])) {
    if ($_FILES["myfile"]["error"] === 0) {
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size (optional)
        if ($_FILES["myfile"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats (optional)
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        } ?>
        <a href="index.php">Go Back</a>
    <?php } else {
        echo "Sorry, an error occurred.";
        $uploadOk = 0;
    }
}


// If everything is OK, try to upload file
if ($uploadOk === 1) {
    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["myfile"]["name"]) . " has been uploaded."; ?>
        <a href="index.php">Go Back</a>
<?php } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
