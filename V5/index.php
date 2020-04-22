<?php
// PHP-Funktion, damit über mehrere Seiten hinweg
// eine Session/Sitzung ermöglicht wird.
// Wir benötigen Sie auf allen unseren Seiten
session_start();

?>
<html>
   <head>
     <title>Loginformular</title>
     <link rel="stylesheet" href="src/css/startseite.css" type="text/css"></link>
   </head>
<body>

<div class="container">
  <img src="src/img/minifalcon.png" class="icon" width=100 height =100>
  <h1>Login</h1>
  <form action="inc/login-inc.php" method="POST">
  <input type="text" name="user" placeholder="Benutzername">
  <input type="password" name="password" placeholder="Passwort"><br>
  <button type="submit" name="submit" class="button">Login</button>
  </form>
  <a href="php/signup.php">Registrieren (funktioniert noch nicht)</a>
  <br/>
  <br/>
  <a href="php/aufnahme.php">Ohne Registrierung gleich weiter zur Aufnahme</a>
</div>

</body>
</html>
