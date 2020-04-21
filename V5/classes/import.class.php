<?php


class Import {




    public function loadFile () {


        $Feld60 ="";
        $Feld61 ="";
        $Feld62 ="";
        $Feld64 ="";
        $Feld100 ="";
        $Feld104 ="";
        $Feld108 ="";

        $Felder = array();
        $Unterfelder = array();
        $InhaltderFelder = array();

        $xmlFile = '../uploads/marcxml/example2.mrcx';   //lädt das xml-File
        $xml = simplexml_load_file($xmlFile);


       foreach ( $xml->datafield as $data )   //diese Schleife geht das xml durch und lädt den Inhalt in 3 Arrays: Felder, Unterfelder und Inhalt
            {
            foreach ( $data->subfield as $data2 )
                {

                array_push($Felder,$data['tag']);
                array_push($Unterfelder,$data2['code']);
                array_push($InhaltderFelder,$data2);

                }
            }




        $anzahlfelder = count ($Felder);
        for ($x = 0; $x < $anzahlfelder; $x++)
        {

        if ($Felder[$x].$Unterfelder[$x] == '100a')
        { $Feld100 = $InhaltderFelder[$x];
        }

        elseif ($Felder[$x].$Unterfelder[$x] == '337b')
        { $Feld61 = $InhaltderFelder[$x];

        }

        elseif ($Felder[$x].$Unterfelder[$x] == '336b')
        { $Feld60 = $InhaltderFelder[$x];

        }
        elseif ($Felder[$x].$Unterfelder[$x] == '338b')
        { $Feld62 = $InhaltderFelder[$x];

            }



        else {}


        }




        echo "<div class=\"rechts\">";     /*Ist noch nicht so elegant aber naja */
        echo "<div class=\"formular\"> ";
        echo "     <form method=\"post\" action=\"aufnahme.php\"> ";

        echo " <label>060</label>";
        echo "	<input id=\"060\" name=\"Inhaltstyp\" value='".htmlspecialchars($Feld60)."'><br>";
        echo " <label>061</label>";
        echo "	<input id=\"061\" name=\"Medientyp\" value='".htmlspecialchars($Feld61)."'><br>";
        echo " <label>062</label>";
        echo "	<input id=\"062\" name=\"Datentraegertyp\" value='".htmlspecialchars($Feld62)."'><br>";
        echo " <label>064</label>";
        echo "	<input id=\"064\" name=\"AngabenzumInhalt\" value='".htmlspecialchars($Feld64)."'><br>";
        echo " <label>100</label>";
        echo "	<input id=\"100\" name=\"GeistigerSchoepfer1\" value='".htmlspecialchars($Feld100)."'><br>"; /*dieses .htmlspecialchars muss sein, damit in dem Formular auch Leerzeichen eingegeben werden */
        echo " <label>104</label>";
        echo "	<input id=\"104\" name=\"GeistigerSchoepfer2\" value='".htmlspecialchars($Feld104)."'><br>";
        echo " <label>108</label>";
        echo "	<input id=\"108\" name=\"GeistigerSchoepfer3\" value='".htmlspecialchars($Feld108)."'><br>";




        echo "  <input type=\"submit\" value=\"Eintragen\" />" ;

        echo " </form>";
        echo "  </div>";

    }

}
