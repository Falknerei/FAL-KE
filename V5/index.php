<?php
include 'includes/class-autoload.inc.php';
?>

<!DOCTYPE html> <!-- Zeigt Browser/Texteditor, dass es sich um html handelt -->

<html> <!-- Der "Root-Tag" umschließt das gesamte Dokument, sollte aus formalen Gründen da sein -->


<head> <!-- Der "Head" gibt Metadaten zur Webseite an -->
  <title>FAL:KE</title> <!-- Der "Titel" des Dokuments. Wird im Browsertab und in ggf. in Google-Ergebnissen angezeigt -->
  <link href="src/css/style.css" rel="stylesheet" type="text/css"> <!-- Die Verknüpfung zu eurem "Stylesheet", wo ihr das Design festlegt -->
  <meta charset="utf-8"> <!-- Gibt an, dass alle Buchstaben erlaubt sind (wichtig für ö,ä,ß ...) -->
</head>
<body> <!-- Der "Body" enthält das, was die Nutzer wirklich sehen -->
	<h2 class="ExerciseTitle">Titelaufnahme, Beispiel 2</h2>

  <nav> <!-- "nav" ist ein spezieller Tag. Das gleiche wie ein div, zeigt aber explizit an, dass es sich um die Navigation handelt -->
    <h1>FAL:KE</h1> <!-- Überschrift erster Ordnung, die Ordnungen (h1,h2,h3...) sollten nicht ignoriert werden (zB wichtig für Blinde, die sich vorlesen lassen) -->
  </nav>


	<div class="links">

	<div> <img src="src/img/RDA_2_Institutions.png" alt="RDA_2_Institutions.png" title="RDA_2_Institutions" width="500" height="676"></img><br /><br /></div>
    </div>





<div class="rechts">

  <div class="formular"> <!-- "div" ist einfach nur ein Trenner für einen Abschnitt. Macht Sinn, eine gewisse Struktur reinzubringen. Mit der class="formular" kann im stylesheet genauer darauf zugegriffen werden -->
    <form method="post" action="index.php"> <!-- Das Formular. "POST" ist die sicherste Variante zum Abschicken. Das Formular wird wieder an die gleiche Datei geschickt. Verarbeitung siehe unten! -->

    <form action="index.php" method="post">





		<!-- das ist der Code von Luis	<input id="titel" name="titel" placeholder="Haupttitel" /><br> <!-- Eingabefeld mit Platzhalter für Haupttitel. id="" wird für Stylesheet gesetzt, name="" für Verarbeitung (siehe unten) -->
    <!-- immer noch  <p id="titelHinweis">"a" sollte nicht im Titel vorkommen!</p>
    <!-- immer noch <input id="autor" name="autor" placeholder="Autor" /><br> <!-- Eingabefeld mit Platzhalter für Autor -->
    <!--  immer noch <input id="seiten" name="seiten" placeholder="Seitenzahl" /><br> <!-- Eingabefeld mit Platzhalter für Seitenzahl -->

      <input name="Import" value="Nein"/>

    </form>
  </div>

</div>



<?php

$import = "";

if (isset($_POST["Import"]))
{
  $import = $_POST["Import"];
}

if ("Ja" == ($import))
{
  $testImport = new Import();
  $testImport->loadFile ();
}

else {
  echo "Import Passwort";
}

?>





<?php

  if (isset($_POST["GeistigerSchoepfer3"])) {


  $Feld60 = htmlspecialchars($_POST["Inhaltstyp"]);
  $Feld61 = htmlspecialchars($_POST["Medientyp"]);
  $Feld62 = htmlspecialchars($_POST["Datentraegertyp"]);
  $Feld64 = htmlspecialchars($_POST["AngabenzumInhalt"]);
  $Feld100 = htmlspecialchars($_POST["GeistigerSchoepfer1"]);
  $Feld104 = htmlspecialchars($_POST["GeistigerSchoepfer2"]);
  $Feld108 = htmlspecialchars($_POST["GeistigerSchoepfer3"]);


  $testObj = new Test();
//$testObj->getAufnahmenStmt("Descombes, Vincent", "Schwartz, Stephan Adam");
  $testObj->setAufnahmenStmt($Feld60, $Feld61, $Feld62, $Feld64, $Feld100, $Feld104, $Feld108);

  }
/*
  //Hier kann man PHP-Code schreiben. In diesem Fall verarbeitet der Code das Formular, wenn es abgeschickt wurde.
  //PHP wird im Browser NIE angezeigt. Bevor die Webseite dem Nutzer angezeigt wird, wird PHP-Inhalt ausgeblendet.
  //PHP wird VOR dem Laden der Webseite ausgeführt, also auf dem Server.
  //Deswegen kann man hier z.B. einfach das Passwort für die Datenbank schreiben - mehr dazu unten.

  //Ganz simpel: Dieser Teil wird nur ausgeführt, wenn beim Absenden des Formulars ein Titel eingegeben wurde.
  //Sonst würde das hier auch passieren, wenn man die Seite neu aufruft. Diesen Teil muss man natürlich noch "eleganter" gestalten ;))
  if (isset($_POST["titel"])) {
    //ALLE EINGABEN SPEICHERN
    $titel = htmlspecialchars($_POST["titel"]); //per POST wurde der Inhalt von allen inputs mit name="titel" usw. gesendet. Den fangen wir ab, sorgen mit
    $autor = htmlspecialchars($_POST["autor"]); //htmlspecialchars() dafür, dass niemand böse Sachen in die Datenbank schreibt, und
    $seiten = htmlspecialchars($_POST["seiten"]); //und speichern den Inhalt in der passenden Variable

    //VERBINDUNG ZUR DATENBANK HERSTELLEN
    //[Ich hab unter aubib.de eine dritte Datenbank angelegt ("usr_p454085_3"), mit der ihr erstmal arbeiten könnt.
    //Bitte passt auf, dass ihr den Namen unten nicht austauscht. @AlexU: Du weißt Bescheid, Wiederherstellungspunkt ;)]

    //Alle wichtigen Datenbank-Infos:    Adresse    ;      Datenbankname  ,  Nutzername, Passwort
    //In $pdo ist jetzt die "Datenbankverbindung gespeichert"
    $pdo = new PDO('mysql:host=db1503.mydbserver.com;dbname=usr_p454085_3', 'p454085', 'yGbnCWKs');

    //DATEN VERGLEICHEN
    //Mit der Verbindung können wir jetzt alle Datenbankoperationen machen! (Falls man sich noch an SQL aus dem 1. Semester erinnert ;))
    //Nur ein Beispiel: sql-query vorbereiten (Lies den Autor aus Aufnahme "1" aus)
    $sql_query = $pdo->prepare("SELECT autor FROM falke WHERE id=1");
    //sql-query ausführen, Ergebnis wird in $result gespeichert
    $sql_query->execute();
    while($row = $sql_query->fetch()) { //"Ergebnisreihe für Ergebnisreihe" (hier eben nur eine) auslesen
      $result_autor = $row["autor"]; //Das eine Feld, das wir ausgelesen haben einer Variable zuordnen
    }
    //Jetzt kann man das Ergebnis aus der Datenbank mit der Nutzereingabe vergleichen (als Beispiel hier: Ist der Autor richtig angegeben?)
    //Falls Datenbankeintrag & Nutzereingabe gleich sind
    if ($result_autor == $autor) {
      //gib eine positive Nachricht für NutzerIn aus
      echo("<p class='HinweisPositiv'>Klasse, das war richtig! :)</p>");
    //Ansonsten (falls Datenbankeintrag & Nutzereingabe nicht gleich)
    } else {
      //gib eine Fehlermeldung aus
      echo("<p class='HinweisNegativ'>Mist. Die richtige Antwort wäre $result_autor gewesen.</p>");
    }


    //TADA! Das wars schon :)
    //Das gleiche Prinzip könnt ihr für alles andere anwenden, was ihr vorhabt.
    //Zum Beispiel, wenn ihr Daten speichern müsst (interessant für die Adminsicht?), könnt ihr stattdessen schreiben:
    //DATEN SPEICHERN
    //"sql-query vorbereiten": Tabelle "falke" => den Spalten titel, autor & seiten Werte (momentan Platzhalter) zuweisen
    $sql_query_2 = $pdo->prepare("INSERT INTO falke (id, titel, autor, seiten) VALUES (:id, :wert1, :wert2, :wert3)");
    //$result speichert das Ergebnis der sql_query,
    //       die hier ausgeführt wird. Dabei werden den Platzhaltern unsere Variablen von oben zugewiesen!
    $result_2 = $sql_query_2->execute(array('id' => 2, 'wert1' => $titel, 'wert2' => $autor, 'wert3' => $seiten));
  }
*/
  ?>





  <script>
  //Hier kann man JavaScript-Code schreiben. In diesem Fall reagiert dieser Code bei jeder Eingabe im Feld Titel (auch wenn der konkrete
  //Fall hier Quatsch ist und nur ein Beispiel sein soll)
  //JS wird im Browser IMMER angezeigt, auch NutzerInnen können darauf zugreifen und ihn verändern! (Erfordert aber grundlegendes Verständis ;) Hier also keine sensiblen Daten!)
  //JS wird ausgeführt, WÄHREND die Seite geladen ist, also "beim Nutzer"

  //Eine Funktion, die den aktuellen Text im Feld "Titel" auf den Buchstaben "a" überprüft
  //(Völliger Blödsinn, aber als Beispiel reicht es...)
  function checkTitel() {
    //Den aktuellen Inhalt des Inputs "Titel" speichern
    var titelEingabe = document.getElementById("titel").value;
    //Falls die aktuelle Eingabe den Buchstaben "a" enthält
    if (titelEingabe.includes("a")) {
      document.getElementById("titelHinweis").style.display = "block"; //zeige den Hinweis an
    //Ansonsten (kein "a" in der Eingabe)
    } else {
      document.getElementById("titelHinweis").style.display = "none"; //blende den Hinweis aus
    }
  }

  //Die Funktion checkTitel() soll jedes Mal ausgeführt werden, wenn sich der Text im Eingabefeld "Titel" ändert!
  document.getElementById("titel").addEventListener("input", checkTitel);
  </script>
</body>
</html>
