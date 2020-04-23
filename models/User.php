<?php
class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $created_at;
    private $token;
    private $type;
    private $typeName;

    public function setId($id) {
        $this->id = intval($id);
    }
    public function setName($name) {
        $this->name = ucfirst($name);
    }
    public function setEmail($email) {
        $this->email = strtolower($email);
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setCreatedAt($date) {
        $this->created_at = $date;
    }
    public function setToken($token) {
        $this->token = $token;
    }
    public function setType($type) {
        $this->type = intval($type);
    }
    public function setTypeName($typeName) {
        $this->typeName = trim($typeName);
    }

    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getCreatedAt() {
        return $this->created_at;
    }
    public function getToken() {
        return $this->token;
    }
    public function getType() {
        return $this->type;
    }
    public function getTypeName() {
        return $this->typeName;
    }
}