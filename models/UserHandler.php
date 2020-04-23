<?php
class UserHandler extends model {

    public function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $sql = "SELECT * FROM users WHERE token = :token";
            $sql = $this->db->prepare($sql);
            $sql->bindValue('token', $token);
            $sql->execute();
            if($sql->rowCount()>0) {
                $item = $sql->fetch();
                $user = new User();
                $user->setId($item['id']);
                $user->setName($item['name']);
                $user->setEmail($item['email']);
                $user->setCreatedAt($item['created_at']);
                $user->setType($item['type']);
                $user->setTypeName($this->getTypeName($item['type']));
                return $user;
            }

        }
        return false;
    }

    public function signin($email, $password) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount()>0) {
            $user = $sql->fetch();
            if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0.99).rand(0.999));
                $_SESSION['token'] = $token;
                $this->updateTokenByEmail($email, $token);
                return true;
            }
        }
        return false;
    }

    public function updateTokenByEmail($email, $token) {
        $sql = "UPDATE users SET token = :token WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':token', $token);
        $sql->bindValue(':email', $email);
        $sql->execute();
    }

    public function verifyExists($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount()>0) {
            return true;
        }
        return false;
    }

    public function add($user) {
        $sql = "INSERT INTO users (name, email, type, password, created_at) VALUES (:name, :email, :type, :password, :created_at)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $user->getName());
        $sql->bindValue(":email", $user->getEmail());
        $sql->bindValue(':type', $user->getType());
        $sql->bindValue(":password", $user->getPassword());
        $sql->bindValue(":created_at", date('Y-m-d'));
        $sql->execute();
    }

    public function findById($id) {
        $array = [];
        $sql = "SELECT * FROM users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount()>0) {
            $item = $sql->fetch();
            $user = new User();
            $user->setId($item['id']);
            $user->setName($item['name']);
            $user->setEmail($item['email']);
            $user->setType($item['type']);
            $user->setTypeName($this->getTypeName($item['type']));
            $array = $user;
        }
        return $array;
    }

    public function list($user) {
        $array = [];
        //Verifica o tipo de usuário para mostrar os tipo de users
        if($user->getType() == 3) {
            $sql = "SELECT * FROM users WHERE type = 3 AND id <> :loggeduser ORDER BY id DESC";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':loggeduser', $user->getId());
            $sql->execute();
        }elseif($user->getType() == 2){
            $sql = "SELECT * FROM users WHERE type IN (2,3) AND id <> :loggeduser ORDER BY id DESC";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':loggeduser', $user->getId());
            $sql->execute();
        }else{
            $sql = "SELECT * FROM users WHERE id <> :loggeduser ORDER BY id DESC";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':loggeduser', $user->getId());
            $sql->execute();
        }
        if($sql->rowCount()>0) {
            $lista = $sql->fetchAll();
            foreach($lista as $item) {
                $user = new User();
                $user->setId($item['id']);
                $user->setName($item['name']);
                $user->setEmail($item['email']);
                $user->setCreatedAt($item['created_at']);
                $user->setType($item['type']);
                $user->setTypeName($this->getTypeName($item['type']));
                $array[] = $user;
            }
        }
        return $array;
    }

    public function updateById($user) {
        $sql = "UPDATE users SET name = :name, email = :email, type = :type WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $user->getName());
        $sql->bindValue(':email', $user->getEmail());
        $sql->bindValue(':type', $user->getType());
        $sql->bindValue(':id', $user->getId());
        $sql->execute();
    }
    public function updatePassById($user) {
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':password', $user->getPassword());
        $sql->bindValue(':id', $user->getId());
        $sql->execute();
    }
    public function deleteById($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    private function getTypeName($type) {
        switch($type) {
            case 1:
                return "Desenvolvedor";
            break;
            case 2:
                return "Administrador";
            break;
            case 3:
                return "Usuário";
            break;
            default: 
                return "Desenvolvedor";
        }
    }
}