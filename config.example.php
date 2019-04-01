<?php
  define("server","");
  define("username","");
  define("password","");
  define("database","");

  $connect=mysqli_connect(server,username,password,database);

  if(isset($connect))
     echo "Connection successful";
  else
     echo "Error";
?>