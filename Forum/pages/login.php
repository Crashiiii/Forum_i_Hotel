<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    

    <title>Document</title>
</head>
<body>
<?php
 require('../api/db.php');
 session_start();
 if (isset($_POST["login"])) {
 $login = $_POST["login"];
 $password = $_POST["password"];

 $sql = "SELECT * FROM users WHERE login='$login' AND password='" . md5($password) ."'";
 $result = $conn->query($sql);
 if ($result->num_rows == 1) {
    $_SESSION["login"] = $login;
    $row=$result->fetch_object();
    $role= $row->role;
    if($role=="admin"){
        $_SESSION["admin"]=true;}
     $_SESSION["id"] = $row->Id;
     
 header("Location: ../index.php");
 } else {
 echo "<div class='form'>
 <h3>Nieprawidłowy login/hasło.</h3><br/>
 <p class='link'>Ponów próbę <a href='login.php'>logowania</a>.</p>
 </div>";
 }
 } else {
?>
 <form class="form" method="post" name="login">
 <h1 class="login-title">Logowanie</h1>
 <input type="text" class="login-input" name="login" placeholder="Login"
autofocus="true"/>
 <input type="password" class="login-input" name="password" placeholder="Hasło"/>
 <input type="submit" value="Zaloguj" name="submit" class="login-button"/>
 <p class="link"><a href="registration.php">Zarejestruj się</a></p>
 </form>
<?php
 }
?>
</body>
</html>