<?php
class Site {
    private $id;
    private $name;
    private $description;
    private $keywords;
    private $script;
    private $email;

    public function setId($id) {
        $this->id = intval($id);
    }
    public function setName($name) {
        $this->name = ucfirst(trim($name));
    }
    public function setDescription($description) {
        $this->description = trim($description);
    }
    public function setKeywords($keywords) {
        $this->keywords = trim($keywords);
    }
    public function setScript($script) {
        $this->script = trim($script);
    }
    public function setEmail($email) {
        $this->email = strtolower($email);
    }

    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getKeywords() {
        return $this->keywords;
    }
    public function getScript() {
        return $this->script;
    }
    public function getEmail() {
        return $this->email;
    }

}