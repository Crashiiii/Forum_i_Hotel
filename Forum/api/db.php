<?php
 $conn = new mysqli("localhost", "root", "", "logowanie");
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
?>