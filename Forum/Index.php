<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/script.js" defer></script>
<title>Gold-Zone.pl</title>
</head>
<body>
<?php
 include("pages/session.php");
?>
<header>
  <div class="link">
    <a href="Index.php"><img src="img/goldzone.png" alt="Goldzone" width="60" height="60"></a>
  </div>
  <div class="catalog">
  <span><a href="Index.php">Aktywność</a></span>
  <span><a href="#Serwery">Serwery</a></span>
  <span><a href="pages/chatbox.php">ChatBox</a></span>
  <span><a href="pages/guilds.php">Gildie</a></span>
  <span><a href="pages/favourites.php">Ulubione</a></span>
  <?php
  if(isset($_SESSION["admin"]) ){
  echo"<span><a href='pages/reports.php' >Zgłoszenia</a></span>";}?>
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
  <a href="pages/logout.php"> Wyloguj się</a>
  </div>
</header>

<article>
  <div class="flex">
    <div class="flex-item colours">
      <h2>Informacje:</h2>
      <hr>
      <p>Witam was wszystkich na mojej serwerowni Gold-Zone.pl. Jest to serwerownia zrobiona dla was możecie na niej znależc rózne
        serwery które przypadną wam na pewno do gustu, jestesmy wam wdzięczni ze możemy gościc takich ludzi jak wy.</p>
    </div>

    <div class="flex-item colours">
      <h2>GoldZone to:</h2>
      <hr>
      <li>Prężnie rozwijająca się sieć serwerów gier, która została stworzona przez graczy, dla graczy.</li>
      <li>Wyjątkowe serwery na których administracja dokłada codziennie wiele starań.</li>
      <li>Nasze forum tętni życiem i panuje na nim niezwykła atmosfera - sprawdź sam.</li>
    </div>
  </div>

  <div class="flex">
      <a name="Serwery">
        <div class="flex-Servers colours">
        <h2>Nasze Serwery:</h2>
        <hr>
      <p><a href="https://www.gametracker.com/server_info/91.224.117.153:27015/"><img src="https://cache.gametracker.com/server_info/91.224.117.153:27015/banner_560x95.png?random=939226" alt="Goldzone"style="height:auto;"></a></p>
      <p>Własciciel:Crash</p>
      <p>Opiekun:Polka</p>
      <p>IP Serwera: 91.224.117.153</p>
      <p>Rekrutacja:[OFF]</p>
      <p><a href="https://www.gametracker.com/server_info/jb.csgo.edgegamers.cc:27015/"><img src="https://cache.gametracker.com/server_info/jb.csgo.edgegamers.cc:27015/banner_560x95.png?random=485502" alt="Goldzone"style="height:auto;"></a></p> 
      <p>Własciciel:Crash</p>
      <p>Opiekun:EdgeGamer</p>
      <p>IP Serwera: 74.91.113.83</p>
      <p>Rekrutacja:[OFF]</p>
    </div>
    
      <div class="flex-table colours">
        <h2>Administracja Serwera:</h2>
        <hr>
        <table class="tableadm">
          <tr>
            <td><a href="index.php"><img src="img/crash.png" alt="Goldzone"style="height:85px;"></a>
            <td><p>Nick:Crash</p>
              <p>Steam: <a href="https://steamcommunity.com/id/7656613824497548/"><img src="img/steam.png" style="height:20px"></a></p>
              <p>Discord:Crash#6688</p>
          <tr>
            <td><a href="index.php"><img src="img/wojtku.png" alt="Goldzone"style="height:85px;"></a>
            <td><p>Nick:Wojtek</p>
              <p>Steam: <a href="https://steamcommunity.com/id/_Jimmi_"><img src="img/steam.png" style="height:20px"></a></p>
              <p>Discord:Wojtek#6534</p>
          <tr>
            <td><a href="index.php"><img src="img/wasted.png" alt="Goldzone"style="height:85px;"></a>
            <td><p>Nick:Wasted</p>
              <p>Steam: <a href="https://steamcommunity.com/id/NightEvo"><img src="img/steam.png" style="height:20px"></a></p>
              <p>Discord:Wasted#6567</p>
          <tr>
            <td><a href="index.php"><img src="img/blejz.png" alt="Goldzone"style="height:85px;"></a>
            <td><p>Nick:Blejzu</p>
              <p>Steam: <a href="https://steamcommunity.com/id/piesellek"><img src="img/steam.png" style="height:20px"></a></p>
              <p>Discord:Blejzu#6890</p>
        </table>
      </div> 
    </div>


</article>
<footer>
<a href="pages/sendreport.php"><img src="img/reports.png" alt="Goldzone" width="20" height="20"></a>
  Wszelkie Prawa Zastrzeżone 2022.
</footer>
</body>
</html>