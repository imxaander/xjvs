<?php
namespace App\Controllers;
use App\Models\ServerModel;
use App\Helper\FilesHelper;

class ServerController{
    public function createServer($name, $seed){
        $serverModel = new ServerModel();
        $id = $serverModel->createNewServer($name, $seed);

        $dir = '../../servers/';
        FilesHelper::copy($dir . 'templates/1.21', $dir . "$id");

        $serverFilesDir = $dir . "$id";
        echo FilesHelper::getProperties(readfile($serverFilesDir . "/server.properties"));
    }
    public function startServer($id){

    }
}