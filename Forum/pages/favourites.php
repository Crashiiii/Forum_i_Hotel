<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/script.js" defer></script>
<title>Gold-Zone.pl</title>
</head>
<body>
<?php
 include("session.php");
 require("../api/db.php");
?>
<header>
  <div class="link">
    <a href="../index.php"><img src="../img/goldzone.png" alt="Goldzone" width="60" height="60"></a>
  </div>

  <div class="catalog">
  <span><a href="../index.php">Aktywność</a></span>
  <span><a href="../#Serwery">Serwery</a></span>
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
  <div class="favourites">
        <div class="favourites-guilds colours">
        <h2>Moje Ulubione Gildie:</h2>
        <hr>
        <?php
        $userid = $_SESSION["id"];
        $sql = "SELECT g.Id, g.name, g.picture FROM guilds g, favourites f WHERE f.guildid = g.id AND f.userid = $userid";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
        echo "<table class='favourites-tables'";

        while($row = $result->fetch_object()) {
        echo " <tr><td><a href ='details.php?Id={$row->Id}'>{$row->name}</a></td><td><img height=100px width=150px src =../img/$row->picture></td></tr><br>";
    }
        echo "</table>";
} else {
    echo " Nie ma żadnych gildii!";
}
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