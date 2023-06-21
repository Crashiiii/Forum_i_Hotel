<?php
require("../db.php");
include("../../pages/session.php");
$id = $_GET["Id"];
$userid = $_SESSION["id"];
$sql1 =  "UPDATE users set guildids =NULL where Id='$userid'";
$conn->query($sql1);
$conn->close();
header('Location: ../../pages/guilds.php');
?>