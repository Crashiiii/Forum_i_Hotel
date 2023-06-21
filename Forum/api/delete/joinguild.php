<?php
require("../db.php");
include("../../pages/session.php");

$id = $_GET["Id"];
$userid = $_SESSION["id"];
$sql2 =  "UPDATE users set guildids ='$id' where Id='$userid'";
$sql3 =  "UPDATE chatbox set guildid ='$id' WHERE Id='$userid'";
$sql4 =  "SELECT guildids FROM users WHERE Id='$userid'";
$conn->query($sql2);
$conn->query($sql3);
$result = $conn->query($sql4);
while($i = $result->fetch_assoc()) {
$j = $i['guildids'];
 }
$conn->close();
header("Location: ../../pages/details.php?Id=".$j);
?>