<?php
session_start();
?>
	<!DOCTYPE html>
	<html>
	<head>
	  <title>University Database (UEMK)</title>
	
	<link rel="shortcut icon"  type="image/png" href="favicon.png">

 <!-- you should always add your stylesheet (css) in the head tag so that it starts loading before the page html is being displayed -->	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	* {box-sizing: border-box;}

	.topnav input[type=text] {
	margin-left:35%;
	padding: 6px;
	margin-top: 2%;
	font-size: 17px;
	}
	.topnav input[type=text] {
	border: 1px solid #ccc;  
	}
	.topnav button[type=submit]
	{
		background:#1F1275;
		color:white;
		padding:0.40%;	
		width:6%;
	}
	.container
	{
	margin:15% 15% 25% 15%;
		padding-left:30%;
		padding-top:5%;
		padding-bottom:5%;
		border:1px solid black;
	}
	img{
	    left:10%;
	}
	</style>
	</head>
	<body>
		<form action="search.php" method="POST">
			<div class="topnav">
				<input type="text" placeholder="Search by mobile number..." name="search">
				<button type="submit">Search</button>
			</div>
		</form>
        <div class="container">
            <?php
            echo "<img src='image/student/".$_SESSION["imgname"]."'/>";
            ?>
        </div>
        
	</body>
	</html>
