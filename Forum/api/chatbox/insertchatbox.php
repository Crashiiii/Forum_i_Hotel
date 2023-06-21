<?php
include("../../pages/session.php");
require("../db.php");

$id = $_SESSION['id'];
$text = $_POST['text'];
$guildid = $_POST['guildid'];
if($guildid == null){
$sql = "INSERT INTO chatbox (userid,text) VALUES ($id,'$text')";
}else{
   $sql = "INSERT INTO chatbox (userid,guildid,text) VALUES ($id,$guildid,'$text')";
}
if ($conn->query($sql) !== TRUE) {
   echo "Error: " . $sql . "<br>" . $conn->error;
} else {
   echo 'sukces';
}
$conn->close();
?>

