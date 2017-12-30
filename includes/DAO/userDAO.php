<?php

class UserDAO {

    // Get all users
    public static function getAll() {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM USERS");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $resultSet = array();
            foreach ($results as $result) {
                $resultSet[] = new User($result['ID'], $result['FIRSTNAME'], $result['LASTNAME'], $result['EMAIL'], $result['PASSWORD'], $result['SECRET'], $result['ACTIVE'], $result['STATUS'], $result['CREATIONDATE'], $result['LASTLOGIN'], $result['PREMIUM'], $result['PREMIUMEND'], $result['LANGUAGE'], $result['DUALSTEP'], $result['DUALSTEPCODE']);
            }
            return $resultSet;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    // Get a user by email
    public static function getByEmail($email) {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM USERS WHERE EMAIL=:email");
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($results) == 1) {
                $result = $results[0];
                return new User($result['ID'], $result['FIRSTNAME'], $result['LASTNAME'], $result['EMAIL'], $result['PASSWORD'], $result['SECRET'], $result['ACTIVE'], $result['STATUS'], $result['CREATIONDATE'], $result['LASTLOGIN'], $result['PREMIUM'], $result['PREMIUMEND'], $result['LANGUAGE'], $result['DUALSTEP'], $result['DUALSTEPCODE']);
            }
            return NULL;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return NULL;
        }
    }

    // Update user password
    public static function updatePassword($user, $hash) {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("UPDATE USERS SET PASSWORD=:hash WHERE ID=:user");
            $stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
            $stmt->bindParam(':user', $user, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false;
        }
    }

    // Get a user by ID
    public static function getById($id) {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("SELECT * FROM USERS WHERE ID=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($results) == 1) {
                $result = $results[0];
                return new User($result['ID'], $result['FIRSTNAME'], $result['LASTNAME'], $result['EMAIL'], $result['PASSWORD'], $result['SECRET'], $result['ACTIVE'], $result['STATUS'], $result['CREATIONDATE'], $result['LASTLOGIN'], $result['PREMIUM'], $result['PREMIUMEND'], $result['LANGUAGE'], $result['DUALSTEP'], $result['DUALSTEPCODE']);
            }
            return NULL;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return NULL;
        }
    }

}
