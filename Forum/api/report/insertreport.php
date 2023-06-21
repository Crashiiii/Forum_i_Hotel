<?php
include("../../pages/session.php");
require("../db.php");

$id = $_SESSION['id'];
$contents = $_POST['contents'];
$sql = "INSERT INTO reports (userid,contents) VALUES ($id,'$contents')";

if ($conn->query($sql) !== TRUE) {
   echo "Error: " . $sql . "<br>" . $conn->error;
} else {
   echo 'sukces';
}
$conn->close();
?>

