<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
<title>Gold-Zone.pl</title>
</head>
<body>
<?php
 include("../../pages/session.php");
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
<?php
 require("../db.php");
 $sql = "SELECT Id, name FROM category";
 $result = $conn->query($sql);
 
 ?>
    <div class="guilds-add">
    <form action="insert.php" method="post" enctype="multipart/form-data">
    <label for="message">Dodaj swoją gildie!</label>
    <p>Kategoria: <select  name="categoryid"><p>
    <?php while($row = $result->fetch_object()) {
    echo " <option value='{$row->Id}'> {$row->name}</option>"; 
    }?>
    </select>
    <select name="leader" hidden> <option> 
      <?php
     echo $_SESSION['login'];?>
     </option>
    </select>
   <p> <input name="name" type="text" placeholder="Nazwa"></p>
   <p> Obrazek: <input type="file" name="picture"></p>
   <p><textarea name="description" col="30" rows="10" placeholder=" Opis"></textarea></p>
   <p><input name="capacity" type="number" placeholder="Pojemnosc" ></p>
   <p><input type="submit" value="Dodaj Gildie"></p>
   <button><a href="../../pages/guilds.php">Anuluj</a></button>
</form>
  </div>
        
        </table>

</article>
<footer>
<a href="../../pages/sendreport.php"><img src="../../img/reports.png" alt="Goldzone" width="20" height="20"></a>
  Wszelkie Prawa Zastrzeżone 2022.
</footer>
</body>
</html>

