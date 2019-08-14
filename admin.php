<?php
 
 $inpuser = $_POST['user'];
 $inppsw = $_POST['psw'];
 #echo "$inpuser";
 
         if( $inpuser == "Priyom" && $inppsw == "Iforgotmypassword") 
         {
             header("location:data.html");
          }
        else
            {
             
              alert("wrong user name or password");
            }
?>