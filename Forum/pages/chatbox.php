<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../js/dynamicscript.js" defer></script>
  <script src="../js/dynamicchatbox.js" defer></script>
<title>Gold-Zone.pl</title>
</head>
<body>
<?php
 include("session.php");
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
  <div class="chatbox">
        <h2>ChatBox:</h2>
        <hr>
        <article>
        <div id="result">
          </div>
        <form action="/" id="Formchatbox">
        <textarea name="text" id="text" placeholder="Wpisz swoją wiadomość" required></textarea>
        <input type="submit" name="submit" value="Wyslij">
      </form>
    </div> 

</article>
<footer>
<a href="sendreport.php"><img src="../img/reports.png" alt="Goldzone" width="20" height="20"></a>
  Wszelkie Prawa Zastrzeżone 2022.
</footer>
</body>
</html>

