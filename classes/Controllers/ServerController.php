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
    }
    public function startServer($id){

    }
}