<?php
 include("../../pages/session.php");
 require("../db.php");
 $guildid = $_REQUEST["guildid"];
 $userid = $_SESSION["id"];
 $sql = "SELECT id FROM favourites WHERE guildid = $guildid AND userid =$userid";
 $result = $conn->query($sql);
 if ($result->num_rows == 1) {
 $id = $result->fetch_object()->id;
 $sql = "DELETE FROM favourites WHERE id = $id";
 } else {
 $sql = "INSERT INTO favourites (guildid, userid) VALUES ($guildid,$userid)";
 }

 if ($conn->query($sql) !== TRUE) {
 echo "Error: " . $sql . "<br>" . $conn->error;
 } else {
 echo 'sukces';
 }
 $conn->close();
?>
