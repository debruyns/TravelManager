<?php


class Language {
    
    // Properties
    
    private $id;
    private $name;
    private $code;
    private $status;
    
    // Constructor
    
    public function __construct($id, $name, $code, $status) {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->status = $status;
    }
    
    // Getters
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCode() {
        return $this->code;
    }

    public function getStatus() {
        return $this->status;
    }
    
    // Setters
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
