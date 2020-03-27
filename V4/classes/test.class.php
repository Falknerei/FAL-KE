<?php

class Test extends Dbh {

    public function getAufnahmen() {
        $sql = "SELECT * FROM aufnahmen";
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch()) {
            echo $row['f100'] . '<br>';
        }
    }
/*
    public function getAufnahmenStmt($f100, $f104) {
        $sql = "SELECT * FROM aufnahmen WHERE f100 = ? AND f104 = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$f100, $f104]);
        $felder = $stmt->fetchALL();

        foreach ($felder as $feld) {
            echo $feld['f100'] . '<br>';
        }
    }
*/

    public function setAufnahmenStmt($f60, $f61, $f62, $f64, $f100, $f104, $f108) {
        $sql = "INSERT INTO aufnahmen(f60, f61, f62, f64, f100, f104, f108) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$f60, $f61, $f62, $f64, $f100, $f104, $f108]);
    }
}