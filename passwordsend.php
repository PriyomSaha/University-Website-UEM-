<?php
session_start();
$servername = "localhost";
 $user = "id7017369_priyom";
 $password = "Mypassword1#";
 $database = "id7017369_university";
 $conn = mysqli_connect($servername,$user,$password,$database);
 
 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $variable = array();
    $variable['email'] = $_SESSION['email'];
    $variable['name'] = "";
    $variable['password'] = "";
	$variable['mobile']= "";
	$sql = "SELECT `firstname`, `lastname`, `email`, `mobile`,`password` FROM `Students` WHERE email = '".$variable['email']."'";
		$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        if($row["email"] == $variable['email'])
        {
            $variable['name']= $row['firstname']. " " .$row['lastname'];
			$variable['password']=$row['password'];
			$variable['mobile']=$row['mobile'];
		}
	}
}

		/*	$variable['name']= "Priyom Saha";
			$variable['password']="abcd";
			$variable['mobile']="9804465884";
			$variable['email']="priyom1499@gmail.com";*/
			
	$subject = "Password";
    $from = "priyom1499@gmail.com";
    $headers = "MIME-Version: 1.0" . "\n";
    $headers = "Content-type:text/html;charset=UTF-8" . "\n"; 
    $template = file_get_contents("email.html");
    
	$template = str_replace('##% email %##',$variable['email'],$template);
    $template = str_replace('##% name %##',$variable['name'],$template);
    $template = str_replace('##% password %##',$variable['password'],$template);
    $template = str_replace('##% mobile %##',$variable['mobile'],$template);
	
   mail($variable['email'],$subject,$template,$headers);
        //return();


mysqli_close($conn);
?>