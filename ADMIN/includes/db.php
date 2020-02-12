<?php 
$con = mysqli_connect("localhost","root","","subid_ecart");

// Check connection
if (!$con) {
  die("Mysqli Query error: ".mysqli_error());
}

?>