<?php
require("../db.php");

$picture = basename($_FILES["picture"]["name"]);
move_uploaded_file($_FILES["picture"]["tmp_name"], "../../img/" . $picture);

$name = $_POST["name"];
$description = $_POST["description"];
$categoryid=$_POST["categoryid"];
$capacity = $_POST["capacity"];
$leader = $_POST["leader"];
$spr="SELECT name FROM guilds";
 $result1 = $conn->query($spr);
$temp=0;
while($row = $result1->fetch_object()) {
    if($row->name==$name){
$temp=1;
    }
}
    if($temp==1){
        
    }else{
$sql = "INSERT INTO guilds (categoryid,name,picture, description, capacity, leader) VALUES ($categoryid,'$name','$picture','$description', $capacity, '$leader')";
echo $sql;
$conn->query($sql);
$conn->close();
    }
header('Location: ../../pages/guilds.php');
?>