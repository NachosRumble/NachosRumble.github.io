<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
    $res = mysqli_query($conn, $query);
    if($res){
        $_SESSION['username'] = $username;
        header("Location: indexBis.php");
    }
}else{
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title></title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <form class="box" action="" method="post">
        <h1 class="box-logo box-title">Nachos Rumble</h1>
        <h1 class="box-title">S'inscrire</h1>
        <label>
            <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
            <input type="text" class="box-input" name="email" placeholder="Email" required />
            <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
            <input type="submit" name="submit" value="S'inscrire" class="box-button" />
        </label>
        <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
    </form>
<?php } ?>
</body>
</html>

