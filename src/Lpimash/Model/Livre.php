<?php
namespace Lpimash\Model;
class Livre {
    
    protected $db;
    public function __construct(\Doctrine\DBAL\Connection $db){
        $this->db = $db;
    }
    
    public function getItems(){
        return $this->db->fetchAll('SELECT * FROM livres');
    }
    
    public function getById($id){
        return $this->db->executeQuery("SELECT * FROM livres WHERE id = ?", array($id))->fetch();
    }
    
    public function getCommentairesForId($id){
        return $this->db->fetchAll("SELECT * FROM commentaires WHERE livre_id = ?", array($id));
    }
    
}