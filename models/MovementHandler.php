<?php
class MovementHandler extends model {
    public function insert($movement) {
        $sql = "INSERT INTO movement (installment_id, name, price, desccount, addition, type, due_date) VALUES (:installment_id, :name, :price, :desccount, :addition, :type, :due_date)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue('installment_id', $movement->getInstallmentId());
        $sql->bindValue('name', $movement->getName());
        $sql->bindValue('price', $movement->getPrice());
        $sql->bindValue('desccount', $movement->getDesccount());
        $sql->bindValue('addition', $movement->getAddition());
        $sql->bindValue('type', $movement->getType());
        $sql->bindValue('due_date', $movement->getDueDate());
        $sql->execute();
    }

    public function getList($month, $year) {
        $array = [];
        $sql = "SELECT * FROM movement WHERE MONTH(due_date) = :m AND YEAR(due_date) = :y ORDER BY due_date DESC";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':m', $month);
        $sql->bindValue(':y', $year);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $list = $sql->fetchAll();
            foreach($list as $item) {
                $newMovement = new Movement();
                $newMovement->setId($item['id']);
                $newMovement->setInstallmentId($item['installment_id']);
                $newMovement->setName($item['name']);
                $newMovement->setPrice($item['price']);
                $newMovement->setDesccount($item['desccount']);
                $newMovement->setAddition($item['addition']);
                $newMovement->setType($item['type']);
                $newMovement->setPaid($item['paid']);
                $newMovement->setDueDate($item['due_date']);
                $newMovement->setNamePaid($this->getTextNamePaid($item['paid']));
                $array[] = $newMovement;
            }
        }
        return $array;
    }

    public function getTotal($month, $year) {
        $sql = "SELECT COUNT(*) as t FROM movement WHERE MONTH(due_date) = :m AND YEAR(due_date) = :y";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':m', $month);
        $sql->bindValue(':y', $year);
        $sql->execute();
        $sql = $sql->fetch();
        return $sql['t'];
    }

    public function getTotalDesccount($month, $year, $c = '') {
        $sql = "SELECT SUM(desccount) as t FROM movement WHERE MONTH(due_date) = :m AND YEAR(due_date) = :y";
        if(!empty($c)) {
            $sql .= " AND paid = :c";
        }
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':m', $month);
        $sql->bindValue(':y', $year);
        if(!empty($c)){
            $sql->bindValue(':c',$c);
        }
        $sql->execute();
        $sql = $sql->fetch();
        return $sql['t'];
    }

    public function getTotalAddition($month, $year, $c = '') {
        $sql = "SELECT SUM(addition) as t FROM movement WHERE MONTH(due_date) = :m AND YEAR(due_date) = :y";
        if(!empty($c)) {
            $sql .= " AND paid = :c";
        }
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':m', $month);
        $sql->bindValue(':y', $year);
        if(!empty($c)){
            $sql->bindValue(':c',$c);
        }
        $sql->execute();
        $sql = $sql->fetch();
        return $sql['t'];
    }

    public function getTotalExpenses($month, $year, $c = '') {
        $sql = "SELECT SUM(price) as p, SUM(desccount) as d, SUM(addition) as a FROM movement WHERE MONTH(due_date) = :m AND YEAR(due_date) = :y AND type = 'debit'";
        if(!empty($c)) {
            $sql .= " AND paid = :c";
        }
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':m', $month);
        $sql->bindValue(':y', $year);
        if(!empty($c)){
            $sql->bindValue(':c',$c);
        }
        $sql->execute();
        $sql = $sql->fetch();
        $total = floatval($sql['p']) - floatval($sql['d']) + floatval($sql['a']);
        return $total;
    }

    public function getTotalRecipes($month, $year, $c = '') {
        $sql = "SELECT SUM(price) as p, SUM(desccount) as d, SUM(addition) as a FROM movement WHERE MONTH(due_date) = :m AND YEAR(due_date) = :y AND type = 'credit'";
        if(!empty($c)) {
            $sql .= " AND paid = :c";
        }
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':m', $month);
        $sql->bindValue(':y', $year);
        if(!empty($c)){
            $sql->bindValue(':c',$c);
        }
        $sql->execute();
        $sql = $sql->fetch();
        $total = floatval($sql['p']) - floatval($sql['d']) + floatval($sql['a']);
        return $total;
    }

    private function getTextNamePaid($paid) {

        switch($paid) {
            case 1:
                return 'Não Consolidado';
            break;
            case 2:
                return 'Consolidado';
            break;
            default:
                return 'Não Consolidado';
            break;
        }
    }
}