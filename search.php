<?php
session_start();

$inpsearch = $_POST['search'];

//$inp  search = "8420316576";

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
$sql = "SELECT `firstname`, `lastname`, `gender`, `email`, `mobile`, `parent`, `parentmob`, `address`, `course`, `image` FROM `Students` WHERE mobile = '".$inpsearch."'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row["mobile"] == $inpsearch)
        {
            $name= $row['firstname']. " " .$row['lastname'];
            $template = file_get_contents("searchcopy.html");
    
    $template = str_replace('##% name %##',$name,$template);
    $template = str_replace('##% gender %##',$row['gender'],$template);
    $template = str_replace('##% course %##',$row['course'],$template);
    $template = str_replace('##% email %##',$row['email'],$template);
    $template = str_replace('##% mobile %##',$row['mobile'],$template);
    $template = str_replace('##% parent %##',$row['parent'],$template);
    $template = str_replace('##% parentmob %##',$row['parentmob'],$template);
    $template = str_replace('##% address %##',$row['address'],$template);
    
    //echo ($row['course']);
    
   echo $template;
    $_SESSION["imgname"]=$row['image'];
    }
    }
       // header('Location:https://uemk.000webhostapp.com/searchcopy.html');  

} else {
    echo "0 results";
}
}
mysqli_close($conn);
?>
