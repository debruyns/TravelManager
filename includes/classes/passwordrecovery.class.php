<?php


class PasswordRecovery {

    // Properties

    private $id;
    private $user;
    private $secret;
    private $code;
    private $validUntil;
    private $created;
    private $used;

    // Constructor

    function __construct($id, $user, $secret, $code, $validUntil, $created, $used) {
        $this->id = $id;
        $this->user = $user;
        $this->secret = $secret;
        $this->code = $code;
        $this->validUntil = $validUntil;
        $this->created = $created;
        $this->used = $used;
    }

    // Getters

    function getId() {
        return $this->id;
    }

    function getUser() {
        return $this->user;
    }

    function getSecret() {
        return $this->secret;
    }

    function getCode() {
        return $this->code;
    }

    function getValidUntil() {
        return $this->validUntil;
    }

    function getCreated() {
        return $this->created;
    }

    function getUsed() {
        return $this->used;
    }

    // Setters

    function setId($id) {
        $this->id = $id;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setSecret($secret) {
        $this->secret = $secret;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setValidUntil($validUntil) {
        $this->validUntil = $validUntil;
    }

    function setCreated($created) {
        $this->created = $created;
    }

    function setUsed($used) {
        $this->used = $used;
    }

}
