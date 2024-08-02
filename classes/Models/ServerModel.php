<?php 
namespace App\Models;
use App\Database\Database;
use PDO;
class ServerModel extends Database{

    // this function returns id of that particular shit man....
    public function createNewServer($name, $seed){
        $stmt = $this->conn->prepare("INSERT INTO servers(user_id, name, seed, status) VALUES(1, '$name', '$seed', 'stopped'); ");
        $stmt->execute();
        $id = $this->conn->lastInsertId();
        return $id;
    }
}