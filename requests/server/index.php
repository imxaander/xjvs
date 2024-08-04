<?php
require_once '../../vendor/autoload.php';

use App\Controllers\ServerController;

if(isset($_POST["request"])){
    // validations
    switch($_POST["request"]){
        case 'create-server':
            $serverCon = new ServerController();
            $serverCon->createServer($_POST['name'], $_POST['seed']);
        break;
    }

}

if(isset($_GET["request"])){
    $response = 'No Response';
    switch ($_GET["request"]){
        case 'user-server-list':
            $serverCon = new ServerController();
            $response = $serverCon->fetchUserServers($_GET['uid']);
            break;
    }
    echo json_encode($response);
}