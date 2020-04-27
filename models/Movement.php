<?php
class Movement {
    private $id;
    private $installment_id;
    private $name;
    private $price;
    private $desccount;
    private $addition;
    private $type;
    private $due_date;
    private $paid;
    private $namePaid;

    public function setId(int $id) {
        $this->id = $id;
    }
    public function setInstallmentId(int $installment_id) {
        $this->installment_id = $installment_id;
    }
    public function setName(string $name) {
        $this->name = trim($name);
    }
    public function setPrice($price) {
        $this->price = $this->parseFloat($price);
    }
    public function setDesccount($desccount) {
        $this->desccount = $this->parseFloat($desccount);
    }
    public function setAddition($addition) {
        $this->addition = $this->parseFloat($addition);
    }
    public function setType(string $type) {
        $this->type = trim($type);
    }
    public function setDueDate($date) {
        $this->due_date = $date;
    }
    public function setPaid(int $paid) {
        $this->paid = $paid;
    }
    public function setNamePaid($paid) {
        $this->namePaid = $paid;
    }

    public function getId() {
        return $this->id;
    }
    public function getInstallmentId() {
        return $this->installment_id;
    }
    public function getName() {
        return $this->name;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getDesccount() {
        return $this->desccount;
    }
    public function getAddition() {
        return $this->addition;
    }
    public function getType() {
        return $this->type;
    }
    public function getDueDate() {
        return $this->due_date;
    }
    public function getPaid() {
        return $this->paid;
    }
    public function getNamePaid() {
        return $this->namePaid;
    }

    public function parseFloat($val) {
        $val = str_replace(',','.',$val);
        return $val;
    }
}