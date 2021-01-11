<?php
session_start();

  $username = $_POST['usernameId'];
  $password = $_POST['senhaID'];
 
  if ($username&&$password)
  {
	 	  
  }
  else 
	  die('<script type="text/javascript">
                      alert("Please enter a username and password!");
                         location="index.php";
                           </script>');
  
	  	 
?>