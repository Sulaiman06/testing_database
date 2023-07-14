<?php

class OOP_and_PDO {
    protected $host = 'localhost', $dbname = 'test', $username = 'root', $password = '';

    public function __construct() {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->db = new PDO($dsn, $this->username, $this->password);
        } catch(PDOException $e) {
            echo "Terjadi Galat ". $e->getMessage();
            die;
        }
    }
    
    public function index() {
        $query = "SELECT * FROM students";
        $store = $this->db->prepare($query);
        $store->execute();
        $data = $store->fetchAll(PDO::FETCH_ASSOC);
        foreach($data as $student):
            echo $student['name'] . PHP_EOL;
        endforeach;
    }
}

$x = new OOP_and_PDO;
$x->index();
