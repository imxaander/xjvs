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
        $serverProperties = parse_ini_file($serverFilesDir . "/server.properties", true, INI_SCANNER_TYPED);

        $serverProperties["motd"] = $name;
        $serverProperties["seed"] = $seed;
        
        // var_dump($serverProperties);
        // echo '<br><br>';
        // var_dump(FilesHelper::array_to_ini($serverProperties) );
        // echo '<br><br>';

        $serverPropertiesFile = fopen($serverFilesDir . '/server.properties', 'w');
        ftruncate($serverPropertiesFile, 0);
        fwrite( $serverPropertiesFile, FilesHelper::array_to_ini($serverProperties));
        fclose($serverPropertiesFile);
        
        $batchFileLocation =  __DIR__ . '/../../servers/' . $id . '/start.bat';
        echo $batchFileLocation;
        
        $cmd = 'c:\WINDOWS\system32\cmd.exe /c START ' . $batchFileLocation . " $id";
        pclose(popen("start /B ".$cmd, "r")); 

        header('Location: /xjvs');
        // system("cmd /c " . $batchFileLocation . '/start.bat');
    }
    public function startServer($id){
        $batchFileLocation =  __DIR__ . '/../../servers/' . $id . '/start.bat';
        echo $batchFileLocation;
        
        $cmd = 'c:\WINDOWS\system32\cmd.exe /c START ' . $batchFileLocation . " $id";
        pclose(popen("start /B ".$cmd, "r")); 
    }

    public function fetchServers($uid){
        
    }
}