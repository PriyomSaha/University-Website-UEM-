<?php
session_start();
 $inpfname = $_POST['fname'];
 $inplname = $_POST['lname'];
 $inpgender = $_POST['gender'];
 $inpknowledge = $_POST['knowledge'];
 $inpemail = $_POST['email'];
 $inpmob = $_POST['mob'];
 $inpaddress = $_POST['address'];
 $inpsalary = $_POST['salary'];
 #$inpjoining = $_POST['joining'];
 
$target_dir = "image/teacher/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        rename ("image/teacher/".basename( $_FILES["fileToUpload"]["name"]), "image/teacher/".$inpemail.".".$imageFileType);
        $imgname=$inpemail.".".$imageFileType;
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 
 $servername = "localhost";
 $user = "id7017369_priyom";
 $password = "Mypassword1#";
 $database = "id7017369_university";
 $conn = mysqli_connect($servername,$user,$password,$database);
 
 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
  //$_SESSION["email"] =$inpemail ;
   // $imgname=basename( $_FILES["fileToUpload"]["name"]);
      $sql = "INSERT INTO Teachers(firstname, lastname,gender,speciality,email, mobile,address ,salary,image )
   VALUES ('$inpfname' , '$inplname' , '$inpgender' ,'$inpknowledge', '$inpemail' , '$inpmob','$inpaddress','$inpsalary', '$imgname')";
   
if (mysqli_query($conn, $sql))
{
     
     header('Location:https://uemk.000webhostapp.com/index.html');  
} 
else
{
   header('Location:https://uemk.000webhostapp.com/newteacher.html');
   echo '<script language="javascript">';
    echo 'alert("Not uploaded")';
    echo '</script>';
    
}
}


mysqli_close($conn);
?>