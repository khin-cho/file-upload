<?php
require_once 'dbconn.php';


//check if the submit button was clicked
if (isset($_POST['submit'])) {
    //print_r($_FILES);
    $file_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = 'images/'.$file_name;


    $sql = "insert into images (image) values ('$file_name')";
    $stmt = mysqli_query($conn, $sql);
   if (move_uploaded_file($tmp_name, $folder)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            file uploaded successfully!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            file upload failed!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php }
}
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP File Upload</title>
</head>
<style>
    #img-container{
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
    }
    img{
        height: 200px;
        border: 5px solid #000;
    }
</style>

<body>
<div class="container my-5">
    <h1 class="text-center mb-3">PHP File Upload</h1>
    <form method="post" enctype="multipart/form-data" class="w-50 mx-auto">
        <div class="input-group">
            <input type="file" class="form-control" id="file" name="image">
            <button class="btn btn-outline-info" name="submit" type="submit" id="btnUpload">Upload</button>
        </div>
    </form>
</div>

<div id="img-container" class="container my-5">
    <?php
    $result = mysqli_query($conn, "select * from images");
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>">
    <?php }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>

