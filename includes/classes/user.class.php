<?php

class User {

    // Properties

    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $secret;
    private $active;
    private $status;
    private $creationDate;
    private $lastLogin;
    private $premium;
    private $premiumEnd;
    private $language;
    private $dualStep;
    private $dualStepCode;

    // Constructor

    public function __construct($id, $firstname, $lastname, $email, $password, $secret, $active, $status, $creationDate, $lastLogin, $premium, $premiumEnd, $language, $dualStep, $dualStepCode) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->secret = $secret;
        $this->active = $active;
        $this->status = $status;
        $this->creationDate = $creationDate;
        $this->lastLogin = $lastLogin;
        $this->premium = $premium;
        $this->premiumEnd = $premiumEnd;
        $this->language = $language;
        $this->dualStep = $dualStep;
        $this->dualStepCode = $dualStepCode;
    }

    // Getters

    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSecret() {
        return $this->secret;
    }

    public function getActive() {
        return $this->active;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function getLastLogin() {
        return $this->lastLogin;
    }

    public function getPremium() {
        return $this->premium;
    }

    public function getPremiumEnd() {
        return $this->premiumEnd;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function getDualStep() {
        return $this->dualStep;
    }

    public function getDualStepCode() {
        return $this->dualStepCode;
    }

    // Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSecret($secret) {
        $this->secret = $secret;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }

    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    public function setPremium($premium) {
        $this->premium = $premium;
    }

    public function setPremiumEnd($premiumEnd) {
        $this->premiumEnd = $premiumEnd;
    }

    public function setLanguage($language) {
        $this->language = $language;
    }

    public function setDualStep($dualStep) {
        $this->dualStep = $dualStep;
    }

    public function setDualStepCode($dualStepCode) {
        $this->dualStepCode = $dualStepCode;
    }

}
