<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
<title>Gold-Zone.pl</title>
</head>
<body>

<?php
 include("session.php");
 require("../api/db.php");
?>

<header>
  <div class="link">
    <a href="../Index.php"><img src="../img/goldzone.png" alt="Goldzone" width="60" height="60"></a>
  </div>

  <div class="catalog">
  <span><a href="../Index.php">Aktywność</a></span>
  <span><a href="../index.php#Serwery">Serwery</a></span>
  <span><a href="chatbox.php">ChatBox</a></span>
  <span><a href="guilds.php">Gildie</a></span>
  <span><a href="favourites.php">Ulubione</a></span>
  <?php
  if(isset($_SESSION["admin"]) ){
  echo"<span><a href='reports.php' >Zgłoszenia</a></span>";}?>
  <span><a href="https://www.paypal.com/pl/webapps/mpp/home">Dotacje</a></span>
  <span><a href="https://discord.gg/bYEajfz8">Discord</a></span>
  </div>

  <div class="user">
  <?php
  echo "Witaj ";
  echo $_SESSION['login'];
  echo "! <br>";
?>
</div>

  <div class="loginn">
  <a href="logout.php"> Wyloguj się</a>
  </div>
</header>

<article>
  <div class="guilds">
        <div class="guilds-servers colours">
        <h2>Wszystkie Gildie:</h2>
        <hr>
        <?php

$spr = $_SESSION["id"];
$sql3 = "SELECT guildids FROM users WHERE Id = $spr";
$result = $conn->query($sql3);
$guil=0;
while($row=$result->fetch_object()){
if($row->guildids == NULL && $guil != 1){
  echo "<span><a href='../api/guilds/insertForm.php'>Dodaj nową gildie</a></span>";
}
}

$sql = "SELECT id, name FROM category";
$result = $conn->query($sql);
echo "<span><a href='guilds.php'> Wszystkie Gildie</a></span>";
while($row = $result->fetch_object()) {
echo "<span><a href='guilds.php?catid={$row->id}'>{$row->name}</a></span>";
}

$sql = "SELECT Id, name, picture FROM guilds";
 if (isset($_GET["catid"])) {
 $catid = $_GET["catid"];
 $sql .= " WHERE categoryid = $catid";
 }
 $result = $conn->query($sql);
 echo"<table class='guilds-names'>";
  while($row = $result->fetch_object()) {
  echo "<tr><td>{$row->name}</td><td><img src='../img/{$row->picture}' height='100px' width='150px'></td><td><a href='details.php?Id={$row->Id}'>Szczegóły</a></td></tr>";  
  }
echo"</table>";
?>  
</div>
</div>
</article>

<footer>
<a href="sendreport.php"><img src="../img/reports.png" alt="Goldzone" width="20" height="20"></a>
  Wszelkie Prawa Zastrzeżone 2022.
</footer>
</body>
</html>

