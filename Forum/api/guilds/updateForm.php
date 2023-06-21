<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<title>Gold-Zone.pl</title>
</head>
<body>
<?php
 include("../../pages/session.php");
 require("../db.php");
?>

<header>
  <div class="link">
  <a href="../../Index.php"><img src="../../img/goldzone.png" alt="Goldzone" width="60" height="60"></a>
  </div>
  
  <div class="catalog">
  <span><a href="../../Index.php">Aktywność</a></span>
  <span><a href="../../index.php#Serwery">Serwery</a></span>
  <span><a href="../../pages/chatbox.php">ChatBox</a></span>
  <span><a href="../../pages/guilds.php">Gildie</a></span>
  <span><a href="../../pages/favourites.php">Ulubione</a></span>
  <?php
  if(isset($_SESSION["admin"]) ){
  echo"<span><a href='../../pages/reports.php' >Zgłoszenia</a></span>";}?>
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
  <a href="../../pages/logout.php"> Wyloguj się</a>
  </div>
</header>

<article>
  <div class="update">
        <h2>Edycja Gildii:</h2>
        <hr>
        <article>
        <?php
         $id = $_GET["Id"];  
         $sql = "SELECT * FROM guilds WHERE Id=$id";    
         $result = $conn->query($sql);  
         $row = $result->fetch_object(); 
         
    ?>
    
    <form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="Id" value="<?= $row->Id ?>">
    <p> <input name="name" type="text" placeholder="Nazwa"></p>
   <p> Obrazek: <input type="file" name="picture"></p>
   <p><textarea name="description" col="30" rows="10" placeholder=" Opis"></textarea></p>
   <p><input name="capacity" type="number" placeholder="Pojemnosc" ></p>
   <p><input type="submit" value="Zapisz Gildie"></p>
   <button><a href="../../pages/guilds.php">Anuluj</a></button>
  </form>
</article>
<footer>
<a href="../../pages/sendreport.php"><img src="../../img/reports.png" alt="Goldzone" width="20" height="20"></a>
  Wszelkie Prawa Zastrzeżone 2022.
</footer>
</body>
</html>

