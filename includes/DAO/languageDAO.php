<?php

class LanguageDAO {

    // Get all languages
    public static function getAll() {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM LANGUAGES");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $resultSet = array();
            foreach ($results as $result) {
                $resultSet[] = new Language($result['ID'], $result['NAME'], $result['CODE'], $result['STATUS']);
            }
            return $resultSet;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    
    // Get all active languages
    public static function getActive() {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM LANGUAGES WHERE STATUS='1'");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $resultSet = array();
            foreach ($results as $result) {
                $resultSet[] = new Language($result['ID'], $result['NAME'], $result['CODE'], $result['STATUS']);
            }
            return $resultSet;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    // Get a language by ID
    public static function getById($id) {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM LANGUAGES WHERE ID=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($results) == 1) {
                $result = $results[0];
                return new Language($result['ID'], $result['NAME'], $result['CODE'], $result['STATUS']);
            }
            return NULL;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return NULL;
        }
    }
    
    // Get a language by Code
    public static function checkActive($code) {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM LANGUAGES WHERE CODE=:code AND STATUS='1'");
            $stmt->bindValue(':code', $code, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($results) == 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return NULL;
        }
    }

}