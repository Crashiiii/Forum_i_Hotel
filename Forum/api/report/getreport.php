<?php
require("../db.php");


$sql = "SELECT  u.login, r.contents, r.data FROM reports as r LEFT JOIN users as u ON r.userid=u.Id";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
   echo"<table class='reportcol'>";
   echo"<tr><th>Nick Użytkownika:</th><th>Treść:</th><th>Data:</th></tr>";
   while($row = $result->fetch_object()) {
   echo"<tr><td>{$row->login}</td><td>{$row->contents}</td><td>{$row->data}</td></tr>";
   } 
   echo"</table>";
} else {
   echo "0 results";
 }
$conn->close();
?>
