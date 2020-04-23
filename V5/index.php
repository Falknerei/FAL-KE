<?php
// PHP-Funktion, damit über mehrere Seiten hinweg
// eine Session/Sitzung ermöglicht wird.
// Wir benötigen Sie auf allen unseren Seiten
session_start();

?>
<?php
include 'includes/class-autoload.inc.php';
?>


//erstmal ein einfacher login ohne Datenbank:

<?php
// Erlaubter Benutzername und Passwort
$user = 'testuser';
$pass = 'password';

// Wenn auf den Button "Einloggen" geklickt wurde
if (isset($_POST['btnlogin'])) {

    // Überprüfen der eingegebenen Daten mit den erlaubten

    if (isset($_POST['username']) && $_POST['username'] == $user
        && isset($_POST['password']) && $_POST['password'] == $pass) {
        $_SESSION['eingeloggt'] = true;





    }
} else if (isset($_POST['btnlogout'])) {
    // Ausloggen
    unset($_SESSION['eingeloggt']);
}
?>






<html>
  <head>
    <title>Loginformular</title>
    <link rel="stylesheet" href="src/css/startseite.css" type="text/css"></link>
  </head>




<?php
// Wenn der Benutzer nicht eingeloggt ist, dann das Formuar anzeigen
if (!$_SESSION['eingeloggt']) {
    ?>

    <div class="container">
      <img src="src/img/minifalcon.png" class="icon" width=100 height =100>
        <h1>Login</h1>
          <form name="login_mit_php" method="post">

            <input type="text" name="username" placeholder="Benutzername">
            <input type="password" name="password" placeholder="Passwort"><br>
            <button type="submit" name="btnlogin" class="button">Login</button>

    </form>

    <a href="php/signup.php">Registrieren (funktioniert noch nicht)</a>
    <br/>
    <br/>
    <a href="php/aufnahme.php">Ohne Registrierung gleich weiter zur Aufnahme</a>

    </div>
    <?php
} else {
    // Logout Button anzeigen


    ?>

      <form name="logout_mit_php" method="post">
      <input type="submit" name="btnlogout" value="Ausloggen">
      <br/>
      <a href="php/aufnahme.php">Ich will aufnehmen!</a>

    </form>










    <?php
}
?>



<body>



</body>
</html>
