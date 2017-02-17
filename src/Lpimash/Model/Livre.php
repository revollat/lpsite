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
    
    
}