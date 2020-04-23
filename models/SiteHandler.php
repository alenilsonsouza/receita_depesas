<?php
class SiteHandler extends model {
    
    public function getSite() {
        $array = [];
        $sql = "SELECT * FROM site WHERE id = 1";
        $sql = $this->db->query($sql);
        if($sql->rowCount()>0) {
            $data = $sql->fetch();
            $site = new Site();
            $site->setId($data['id']);
            $site->setName($data['name']);
            $site->setDescription($data['description']);
            $site->setKeywords($data['keywords']);
            $site->setScript($data['script']);
            $site->setEmail($data['email']);
            $array = $site;
        }
        return $array;
    }

    public function updateById($site) {
        $sql = "UPDATE site SET name = :name, description = :description, keywords = :keywords, script = :script, email = :email WHERE id = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $site->getName());
        $sql->bindValue(':description', $site->getDescription());
        $sql->bindValue(':keywords', $site->getKeywords());
        $sql->bindValue(':script', $site->getScript());
        $sql->bindValue(':email', $site->getEmail());
        $sql->execute();
    }
}