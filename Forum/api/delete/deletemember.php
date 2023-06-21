<?php
require("../db.php");
include("../../pages/session.php");

$id = $_GET["Id"];
$sql4 =  "SELECT guildids FROM users WHERE Id='$id'";
$result = $conn->query($sql4);
$sql2 =  "UPDATE users set guildids = NULL where  Id= $id";
$conn->query($sql2);

while($i = $result->fetch_assoc()) {
$j = $i['guildids'];
 }
$conn->close();
header("Location: ../../pages/details.php?Id=".$j);
?>