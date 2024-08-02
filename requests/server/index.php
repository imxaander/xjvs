<?php
require_once '../../helper/functions.php';
require_once '../../vendor/autoload.php';

use App\Controllers\ServerController;

if(isset($_POST["create-server"])){
    // validations
    $serverCon = new ServerController();
    $serverCon->createServer($_POST['name'], $_POST['seed']);
}