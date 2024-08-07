<?php 
namespace App\Models;
use App\Database\Database;
use PDO;
class ServerModel extends Database{

    // this function returns id of that particular shit man....
    public function createNewServer($name, $seed, $port, $address, $tunnel_id){
        $stmt = $this->conn->prepare("INSERT INTO servers(user_id, name, seed, port, address, tunnel_id, status) VALUES(1, '$name', '$seed', '$port', '$address','$tunnel_id', 'stopped'); ");
        $stmt->execute();
        $id = $this->conn->lastInsertId();
        return $id;
    }
    public function destroyServer($sid){
        $stmt = $this->conn->prepare("DELETE FROM servers WHERE id = $sid ");
        $stmt->execute();
        $id = $this->conn->lastInsertId();
        return $id;
    }

    public function getUserServers($uid){
        $stmt = $this->conn->prepare("SELECT * FROM servers WHERE user_id = $uid");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
        return $result;
    }
}