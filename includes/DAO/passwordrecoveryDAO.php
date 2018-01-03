<?php

class PasswordRecoveryDAO {

    // Get all password recovery entries
    public static function getAll() {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM PASSWORDREC");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $resultSet = array();
            foreach ($results as $result) {
                $resultSet[] = new PasswordRecovery($result['ID'], $result['USER'], $result['SECRET'], $result['CODE'], $result['VALIDUNTIL'], $result['CREATED'], $result['USED']);
            }
            return $resultSet;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    // Check if password recovery is allowed
    public static function checkRecoveryAllowed($user) {

        $created = Date('Y-m-d');

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM PASSWORDREC WHERE USER=:user AND CREATED=:created");
            $stmt->bindValue(':user', $user, PDO::PARAM_INT);
            $stmt->bindValue(':created', $created, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($results) < 3){
              return true;
            } else {
              return false;
            }
        } catch (PDOException $e) {
            return false;
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    // Get a recovery by reset code
    public static function getPasswordRecovery($resetCode) {

        $secret = substr($resetCode, 0, 10);
        $code = substr($resetCode, 10, 10);
        $user = substr($resetCode, 20);

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM PASSWORDREC WHERE USER=:user AND SECRET=:secret AND CODE=:code");
            $stmt->bindValue(':user', $user, PDO::PARAM_INT);
            $stmt->bindValue(':secret', $secret, PDO::PARAM_STR);
            $stmt->bindValue(':code', $code, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($results) == 1) {
                $result = $results[0];
                return new PasswordRecovery($result['ID'], $result['USER'], $result['SECRET'], $result['CODE'], $result['VALIDUNTIL'], $result['CREATED'], $result['USED']);
            }
            return NULL;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return NULL;
        }
    }

    // Check if unique combination
    public static function checkCombination($user, $secret, $code) {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM PASSWORDREC WHERE USER=:user AND SECRET=:secret AND CODE=:code");
            $stmt->bindValue(':user', $user, PDO::PARAM_INT);
            $stmt->bindValue(':secret', $secret, PDO::PARAM_STR);
            $stmt->bindValue(':code', $code, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->rowCount();
            return $results;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return 1;
        }
    }

    // Delete by combination combination
    public static function deleteByCombination($user, $secret, $code) {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("DELETE PASSWORDREC WHERE USER=:user AND SECRET=:secret AND CODE=:code");
            $stmt->bindValue(':user', $user, PDO::PARAM_INT);
            $stmt->bindValue(':secret', $secret, PDO::PARAM_STR);
            $stmt->bindValue(':code', $code, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false;
        }
    }

    // Set recovery as used
    public static function setAsUsed($id) {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("UPDATE PASSWORDREC SET USED='1' WHERE ID=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false;
        }
    }

    // Create new recovery
    public static function createRecovery($user) {

        $validuntil = Date('Y-m-d H:i:s', strtotime("+24 hours"));
        $created = Date("Y-m-d");

        $validCombination = false;

        while ($validCombination == false){

          $secret = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 10);
          $code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 10);

          if (PasswordRecoveryDAO::checkCombination($user, $secret, $code) == 0){
            $validCombination = true;
          }

        }

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("INSERT INTO PASSWORDREC (ID, USER, SECRET, CODE, VALIDUNTIL, CREATED, USED) VALUES ('', :user, :secret, :code, :validuntil, :created, '0')");
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':secret', $secret);
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':validuntil', $validuntil);
            $stmt->bindParam(':created', $created);
            $stmt->execute();
            return new PasswordRecovery('', $user, $secret, $code, $validuntil);
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return NULL;
        }
    }

}
