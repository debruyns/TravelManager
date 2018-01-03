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

    // Delete user by email
    public static function deleteUserByEmail($email) {

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("DELETE USERS WHERE EMAIL=:email");
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false;
        }
    }

    // Update last login
    public static function updateLastLogin($id) {

        $lastlogin = Date("Y-m-d H:i:s");

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("UPDATE USERS SET LASTLOGIN=:lastlogin WHERE ID=:id");
            $stmt->bindParam(':lastlogin', $lastlogin);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false;
        }
    }

    // Create new user
    public static function createUser($firstname, $lastname, $email, $password) {

        $created = Date("Y-m-d H:i:s");
        $secret = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 10);
        $language = $_SESSION['CTO_LANG'];

        $db = Connect::getConnection();

        try {
            $stmt = $db->prepare("INSERT INTO USERS (FIRSTNAME, LASTNAME, EMAIL, PASSWORD, SECRET, ACTIVE, STATUS, CREATIONDATE, LASTLOGIN, PREMIUM, PREMIUMEND, LANGUAGE, DUALSTEP, DUALSTEPCODE) VALUES (:firstname, :lastname, :email, :password, :secret, '0', '1', :created, NULL, '0', NULL, :language, '0', '')");
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':secret', $secret);
            $stmt->bindParam(':created', $created);
            $stmt->bindParam(':language', $language);
            $stmt->execute();
            return new User('', $firstname, $lastname, $email, $password, $secret, '0', '1', $created, null, '0', null, $language, '0', '');
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return NULL;
        }
    }

}
