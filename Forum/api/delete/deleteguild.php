<?php
require("../db.php");

$id = $_GET["Id"];
$sql1 =  "DELETE FROM guilds where Id = $id";
$sql2 =  "UPDATE users set guildids = NULL where guildids = $id";
$conn->query($sql1);
$conn->query($sql2);
$conn->close();
header('Location: ../../pages/guilds.php');
?>