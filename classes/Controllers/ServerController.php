<?php
namespace App\Controllers;
use App\Models\ServerModel;
use App\Helper\FilesHelper;
use App\Controllers\PIGController;

class ServerController{
    public function createServer($name, $seed){
        $serverModel = new ServerModel();

        // now create a tunnel for this server.
        $pigc = new PIGController();

        // get tunnel with no pending
        $randport = rand(49152, 65530);
        $tunnel_id =  $pigc->newTunnel();
        $pigc->changeTunnelPort($tunnel_id, $randport);
        $tunnel = $pigc->getTunnelInfo($tunnel_id);
        $tunnel_address = $tunnel->{'alloc'}->{'data'}->{'assigned_domain'};
        var_dump($tunnel);
        $id = $serverModel->createNewServer($name, $seed, $randport, $tunnel_address, $tunnel_id);

        $dir = '../../servers/';
        FilesHelper::copy($dir . 'templates/1.21', $dir . "$id");

        $serverFilesDir = $dir . "$id";
        $serverProperties = parse_ini_file($serverFilesDir . "/server.properties", true, INI_SCANNER_TYPED);

        $serverProperties["motd"] = $name;
        $serverProperties["seed"] = $seed;
        $serverProperties["server-port"] = $randport;
        
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
        system("cmd /c " . $batchFileLocation . '/start.bat');
    }
    public function startServer($sid){
        $batchFileLocation =  __DIR__ . '/../../servers/' . $sid . '/start.bat';
        echo $batchFileLocation;
        
        $cmd = 'c:\WINDOWS\system32\cmd.exe /c START ' . $batchFileLocation . " $sid";
        pclose(popen("start /B ".$cmd, "r")); 
    }

    public function fetchUserServers($uid){
        $serverModel = new ServerModel();
        $userServers = $serverModel->getUserServers($uid);

        return $userServers;
    }

    public function deleteServer($sid){
        $serverModel = new ServerModel();
        $serverModel->destroyServer($sid);

    }
}