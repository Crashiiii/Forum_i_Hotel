<?php
require("../db.php");

$guildid = $_GET["guildid"];
if($guildid == "null"){
$sql = "SELECT  u.login, r.text, r.data FROM chatbox AS r LEFT JOIN users AS u ON r.userid=u.Id WHERE r.guildid IS ".$guildid."";
} else{
$sql = "SELECT  u.login, r.text, r.data FROM chatbox AS r LEFT JOIN users AS u ON r.userid=u.Id WHERE r.guildid = ".$guildid."";}
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
   echo"<p class='scroll'>";
   echo"<table class='chatboxx-table'>";
   while($row = $result->fetch_object()) {
   echo"<tr><td class='login-cell'>{$row->login}</td><td class='text-cell'>{$row->text}</td><td class='data-cell'>{$row->data}</td></tr>";
   } 
   echo"</table>";
   echo"</p";
} else {
   echo "$guildid";
   // echo "0 results";
 }
 
$conn->close();
?>
