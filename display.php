<?php
include ('./connect.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $mobile=$_POST['mobile'];
    $image=$_FILES['file'];
    // echo $username;
    // echo "<br>";
    // echo $mobile;
    // echo "<br>";
    // echo $image;
    // print_r($image);
    $imagefilename=$image['name'];
    // echo $imagefilename; //works
    // echo "<br>";
    // print_r($imagefilename); //works
    // echo "<br>";
    $imagefileerror=$image['error'];
    // print_r($imagefileerror);
    // echo "<br>";
    $imagefiletemp=$image['tmp_name'];
    // print_r($imagefiletemp);
    // echo "<br>";
    $filename_separate=explode('.',$imagefilename); //separate by '.' to access the extension
    // print_r($filename_separate);
    // echo "<br>";
    $file_extension=strtolower($filename_separate[1]);
    // print_r($file_extension);
    // echo "<br>";

    //other method to access file_extension
    // $file_extension=strtolower(end($filename_separate)); //want to access the end part
    // print_r($file_extension);

    $extension=array('jpeg','jpg','png');
    if(in_array($file_extension,$extension)){
        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `registration` (name,mobile,image) values ('$username','$mobile','$upload_image')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<div class="alert alert-success" role="alert">
                    <strong>Success! </strong>Data inserted successfully
                 </div>';
        }
        else{
            die(mysqli_error($con));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img{
            width: 100px;
        }
    </style>
</head>
<body>
    <h1 class="text-center my-4">User Data</h1>
    <div class="container mt-5 d-flex justify-content-center">
    <table class="table table-border w-50 ">
  <thead class="table-dark">
    <tr>
      <th scope="col">Sl No.</th>
      <th scope="col">Username</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="select * from `registration`";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $image=$row['image'];
        echo '<tr>
        <td>'.$id.'</td>
        <td>'.$name.'</td>
        <td><img src='.$image.'></td>
      </tr>';
    }
    ?>  
  </tbody>
</table>
    </div>
</body>
</html>