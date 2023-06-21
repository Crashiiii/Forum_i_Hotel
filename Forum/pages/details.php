<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../js/favourites.js" defer></script>
  <script src="../js/dynamicscript.js" defer></script>
  <script src="../js/dynamicchatbox.js" defer></script>
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
  <span><a href="#Serwery">Serwery</a></span>
  <span><a href="../pages/chatbox.php">ChatBox</a></span>
  <span><a href="../pages/guilds.php">Gildie</a></span>
  <span><a href="../pages/favourites.php">Ulubione</a></span>
  <?php
  if(isset($_SESSION["admin"]) ){
  echo"<span><a href='../pages/reports.php' >Zgłoszenia</a></span>";}?>
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
  
  <div class="details">
        <div class="flex-details colours">
        <h2>Szczegóły gildii:</h2>
        <hr>
        <?php

      $id = $_GET["Id"];
       $sql = "SELECT g.categoryid, c.name AS namecat, g.name, g.picture, g.description, g.capacity, g.leader
       FROM guilds g, category c WHERE g.id=$id AND categoryid=c.id";
      $result = $conn->query($sql);
      echo"<section class='details-list'>";
      while($row=$result->fetch_object()){
      echo"<img src='../img/{$row->picture}' height='200px' width='400px'>";
      $userid = $_SESSION["id"];
      $sql1 = "SELECT Id FROM favourites WHERE guildid = $id AND userid = $userid";
      $added = $conn->query($sql1)->num_rows > 0;
      $text = $added ? "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIQZY1dz_ST9uLGCTmNpxB9VtJkvXoVdwxt-BSvbLhCuXQdlKT3FPv1Tqw_FCxix8v6jM&usqp=CAU" : "https://img.redro.pl/plakaty/serce-puste-400-111066273.jpg";
      echo "<img style=width:50px src=$text class='fav' data-dzban='$id'>";
      echo "<table class='details-table'";
      echo "<tr><td>Nazwa:</td>  <td class='margin-table'>{$row->name}</td></tr>";
      echo "<tr><td>Lider:</td>  <td class='margin-table'>{$row->leader}</td></tr>";
      echo "<tr><td>Kategoria: </td>  <td class='margin-table'>{$row->namecat}</td></tr>";
      echo "<tr><td>Opis:</td>  <td class='margin-table'>{$row->description}</td></tr>";
      echo "<tr><td>Pojemność:</td>  <td class='margin-table'>{$row->capacity}</td></tr>";
      echo "</table>";
    }
      $sql2 = "SELECT login,Id FROM users WHERE guildids = $id";
      $result = $conn->query($sql2);
      $sql2 = "SELECT leader FROM guilds WHERE Id = $id";
      $result2 = $conn->query($sql2);
      $lead=$result2->fetch_object();
      $log = $_SESSION['login'] ;
      echo "<p class='members'>Członkowie:</p>";
      echo "<ol class='margin-list'>";
      while($row=$result->fetch_object()){
      echo "<li >{$row->login}<span>"; 
            if($log == $lead->leader || isset($_SESSION["admin"])){
        echo"<a href='../api/delete/deletemember.php?Id={$row->Id}'> Usuń z gildii</a></span>";
      }
            if($log == $lead->leader || isset($_SESSION["admin"])){
        echo"<span><a href='../api/delete/banmember.php?userid={$row->Id}&guildid=$id'>Zablokuj</a></span></li>";
      }}
      echo "</ol>";
        $spr = $_SESSION["id"];
        $sql3 = "SELECT guildids FROM users WHERE Id = $spr";
        $result = $conn->query($sql3);
        $sql4 = "SELECT guildid, userid FROM banned WHERE userid=$spr";
        $result4 = $conn->query($sql4);
        $guil=0;
        while($row=$result4->fetch_object()){
          if($row->guildid == $id){
            $guil=1;
          }
        }
        while($row=$result->fetch_object()){
          if($row->guildids == NULL && $guil != 1){
            echo"<span><a href='../api/delete/joinguild.php?Id={$id}'>Dołącz do Gildii</a></span>";
          }else if($row->guildids == NULL && $guil == 1) {
            echo"<span>Jestes zbanowany w tej gildii!</span>";
          }else if($row->guildids == $id && $log != $lead->leader){
            echo"<span><a href='../api/delete/leaveguild.php?Id={$id}'>Odejdz z Gildii</a></span>";
          }
          
          if($log == $lead->leader || isset($_SESSION["admin"])){
            echo"<span><a href='../api/guilds/updateForm.php?Id=$id'>Edytuj Gildie</a></span>";
          }
          if($log == $lead->leader || isset($_SESSION["admin"])){
          echo"<span><a href='../api/delete/deleteguild.php?Id={$id}'>Usuń</a></span>";
        }
        echo"</section>";
        if($row->guildids == NULL){
        echo "<h2>Chat pojawi się jak dołączysz do gildii<h2>";
      }
        echo"<p class='details-chatbox'>";
        if($row->guildids == $id){
          echo "<div class='shouldbox'>";
          echo "<h2>Chatbox Dla Gildii</h2>";
          echo "<div id='result'></div>";
          echo "<form action='/' id='Formchatbox'>";
          echo "<textarea name='text' id='text' placeholder='Wpisz swoją wiadomość' required></textarea>";
          echo "<input type='submit' name='submit' value='Wyslij'>";
          echo "</form>";
          echo "</div>" ;
        }
        echo"</p>";
        }
   ?>
    </div>
    </div>
    <div id="guildid" hidden><?php echo $id;?></div>
</article>
<footer>
<a href="sendreport.php"><img src="../img/reports.png" alt="Goldzone" width="20" height="20"></a>
  Wszelkie Prawa Zastrzeżone 2022.
</footer>
</body>
</html>