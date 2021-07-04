<?php

include "controller/config.php";

date_default_timezone_set('Africa/Maputo');

try 
{
  $conn = new PDO("$drive:host=$servername;dbname=$base", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>