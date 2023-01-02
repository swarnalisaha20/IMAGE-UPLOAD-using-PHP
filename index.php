<?php
require_once('./operations.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="text-center my-3">Registration Form</h1>
    <div class="container d-flex justify-content-center">
        <form action="display.php" method="post" class="w-50" enctype="multipart/form-data">
            <!-- <div class="form-group my-4">
                <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="form-group my-4">
                <input type="text" name="mobile" placeholder="Mobile No" class="form-control">
            </div> -->

            <?php inputFields("Username","username","","text"); ?>
            <?php inputFields("Mobile No.","mobile","","text"); ?>
            <?php inputFields("","file","","file"); ?>
            <button class="btn btn-dark" type="submit" name="submit">Submit</button> 
            <!-- if submit button is clicked then I will be redirected to display.php -->
        </form>
    </div>
</body>
</html>