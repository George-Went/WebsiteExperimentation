<?php

// apache/nginx runs this code before rendering the below html
if(isset($_POST['submit'])) {
   echo "it works";
   
   $minimun = 5;
   $names = array("homer", "marge", "bart", "lisa", "maggie");

   $username = $_POST['username'];
   $password = $_POST['password'];
   echo Hello . $username;
   echo "Your password is" . $password;

   //check if name is more that 5 letters 
   if(strlen($username) < $minimun ){
      echo "username has to be longer than 5 characters";
   }

   if(!in_array($username, $name)){
      echo "you are not allowed";
   }
   else {
      echo "welcome";
   }
}
?>