<?php
namespace App\Controllers;

DEFINE ("PIGSESSION","eyJzZXNzaW9uIjoiQUFBQUFRQUFBQUFBQUFBQUFBck1Qd0FBQVpFcmwzWUtBQUFBQXdBQUFBRUFBQUFBQUFBQUFPYkkzVHFlWnpDRlZKVHZlX0o5dWRxVEdUWGVMd3RPM3I1bG5BWU1WLVIzIn0%3D.%2FDDIUJEfd7x8ToYUZkYLT99mv22V%2FEeGJ%2FmjNQNgYJI");
DEFINE ("AGENTID", "ff78b597-de93-45bb-be6b-7c0b5d24846c");
class PIGController {
    public function newTunnel() {
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://playit.gg/account/agents/". AGENTID ."/tunnels/add?index=&_data=routes%2Faccount%2Fagents%2F%24agentId%2Ftunnels%2Fadd%2Findex",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('region' => 'global','tunnel_type' => 'minecraft-java','enabled' => 'on'),
          CURLOPT_HTTPHEADER => array(
            'Cookie: __session=' . PIGSESSION
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);

        // now we return the tunnel id looks like tunnels/2c492370-9acc-41a7-a9d7-270aee405e19
        // we select the last element of the array of tunnels.tunnels to get the newest tunnel added!
        // returns the id of the playitgg tunnel
        return end(json_decode($this->getAccountInfo())->{'tunnels'}->{'tunnels'})->{'id'};
    }

    public function getTunnelInfo($id){
      $resultFlag = false;
      while(true){
        $tunnels = json_decode($this->getAccountInfo())->{'tunnels'}->{'tunnels'};

        $result = null;
        foreach ($tunnels as $object) {
          if ($object->{'id'} === $id) {
            $result = $object;
            break;
          }
        }
        unset($object);
        $tunnelObj = $result ?? false;

        if ($tunnelObj->{'alloc'}->{'status'} == 'allocated') {
          break;
        }
      }
      var_dump($tunnelObj);
      return $tunnelObj;
    }
    public function getAccountInfo(){
      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://playit.gg/account/tunnels?_data=routes%2Faccount',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_POSTFIELDS => array('region' => 'global','tunnel_type' => 'minecraft-java','enabled' => 'on'),
      CURLOPT_HTTPHEADER => array(
        'Cookie: __session=' . PIGSESSION
      ),
      ));

      $response = curl_exec($curl);
      curl_close($curl);

      return $response;

    }
    public function changeTunnelPort($tunnel_id, $port){
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://playit.gg/account/tunnels/$tunnel_id?_data=routes%2Faccount%2Ftunnels%2F%24tunnelId",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('_action' => 'local-address','agent_id' => AGENTID,'local_ip_og' => '127.0.0.1','local_port_og' => '','local_ip' => '','local_port' => $port),
        CURLOPT_HTTPHEADER => array(
          'Cookie: __session=' . PIGSESSION
        ),
      ));

      $response = curl_exec($curl);
      curl_close($curl);
    }
    public function deleteTunnel() {

    }
}