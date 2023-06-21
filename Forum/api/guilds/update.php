<?php
 include("../../pages/session.php");
 require("../db.php");
$name = $_POST["name"];    
$picture = basename($_FILES["picture"]["name"]);
move_uploaded_file($_FILES["picture"]["tmp_name"], "../../img/" . $picture);      
$description = $_POST["description"];           
$capacity = $_POST["capacity"]; 
$id = $_POST["Id"];         
$sql = "UPDATE guilds SET name='$name', description='$description', capacity=$capacity,
picture='$picture' WHERE Id=$id";
if ($conn->query($sql) !== TRUE) {     echo "Error: " . $sql . "<br>" . $conn->error;     } else {     echo 'sukces';     }  
$conn->close();     
header("location: ../../pages/details.php?Id=$id"); 
?>