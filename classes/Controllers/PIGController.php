<?php
namespace App\Controllers;

DEFINE ("PIGSESSION","eyJzZXNzaW9uIjoiQUFBQUFRQUFBQUFBQUFBQUFBck1Qd0FBQVpFaTM5XzJBQUFBQXdBQUFBRUFBQUFBQUFBQUFLRVUxOVdXNWZmejVYQlZMMHBKVGtlYkJjZmVCZ0dSTFR3SkVfOWJBSlM1In0%3D.dbAyHm9V16hbdOplcf00A5Tj2SIODQyF3FWa6OkxFmU");
class PIGController {
    public function newTunnel() {
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://playit.gg/account/agents/ff78b597-de93-45bb-be6b-7c0b5d24846c/tunnels/add?index=&_data=routes%2Faccount%2Fagents%2F%24agentId%2Ftunnels%2Fadd%2Findex',
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
        
    }

    public function deleteTunnel() {

    }
}