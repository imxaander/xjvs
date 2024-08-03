<?php
require_once '../../helper/functions.php';
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
    switch ($_GET["request"]){
        case 'server-list':
            break;
    }
}