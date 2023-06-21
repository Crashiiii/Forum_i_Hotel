<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css" />
    <title>Document</title>
</head>
<body>
    <?php
 require("../api/db.php");
 if (isset($_POST["login"])) {
 $login = $_POST["login"];
 $email = $_POST["email"];
 $password = $_POST["password"];
 $spr="SELECT login,email FROM users";
 $result1 = $conn->query($spr);
$temp=0;
while($row = $result1->fetch_object()) {
    if($row->login==$login){

$temp=1;

    }
}
    if($temp==1){
        echo "<div class='form'>
 <h3>Login jest juz zajety.</h3><br/>
 <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
 </div>";
    }

    else{
        $sql = "INSERT INTO users (login, password, email) VALUES ('$login', '" . md5($password) . "','$email')";
        $result = $conn->query($sql);
        if ($result) {
        echo "<div class='form'>
        <h3>You are registered successfully.</h3><br/>
        <p class='link'>Click here to <a href='login.php'>Login</a></p>
        </div>";
        } else {
        echo "<div class='form'>
        <h3>Required fields are missing.</h3><br/>
        <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
        </div>";
        }
    }
 } else {
?>
 <form class="form" action="" method="post">
 <h1 class="login-title">Rejestracja</h1>
 <input type="text" class="login-input" name="login" placeholder="Login" required/>
 <input type="password" class="login-input" name="password" placeholder="Hasło" required/>
 <input type="text" class="login-input" name="email" placeholder="Adres email"required/>
 <input type="submit" name="submit" value="Zarejestruj" class="login-button">
 <p class="link"><a href="login.php">Zaloguj się</a></p>
 </form>
<?php
 }
?>

</body>
</html>