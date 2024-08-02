<?php
namespace App\Database;

use PDO;
class Database {
    private $username = 'root';
    private $password = '';
    private $host = 'localhost';
    private $dbname = 'xjvs';

    public $conn;
    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host=". $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //connection success
        }catch(PDOException $e){
            echo "Database Connection Failed.";
        }
    }
}