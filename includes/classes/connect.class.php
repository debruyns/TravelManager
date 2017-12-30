<?php

class Connect {

    public static function getConnection() {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=TRAVELMANAGER', 'travelmanager', 'CTOtm2017!@#');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return NULL;
        }
    }

}
