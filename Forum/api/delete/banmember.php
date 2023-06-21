<?php
 include("../../pages/session.php");
 require("../db.php");
 
 $guildid = $_GET["guildid"];
 $userid = $_GET["userid"];
 $sql4 =  "SELECT guildids FROM users WHERE Id='$userid'";
 $result = $conn->query($sql4);
 $sql2 =  "UPDATE users set guildids = NULL where  Id= $userid";
 $sql = "INSERT INTO banned (userid, guildid) VALUES ($userid,$guildid)";
 $result = $conn->query($sql4);
 while($i = $result->fetch_assoc()) {
 $j = $i['guildids'];
  }
 if ($conn->query($sql2) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
    echo 'sukces';
    }

 if ($conn->query($sql) !== TRUE) {
 echo "Error: " . $sql . "<br>" . $conn->error;
 } else {
 echo 'sukces';
 }
 $conn->close();
 header("Location: ../../pages/details.php?Id=".$j);
?>
