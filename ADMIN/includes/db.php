<?php 
$con = new mysqli("localhost","root","","subid_ecart");

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL DATABASE: " . $con -> connect_error;
  exit();
}

?>