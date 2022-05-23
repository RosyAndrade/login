<?php

echo 'ola mundo!';
echo '<hr>';

api_request("http://localhost/login/api/","joao","123",);

function api_request($endpoint, $user = null, $pass = null){

    $curl = curl_init($endpoint);
    $headers = array (
        'Content-Type: application/json',
        'Authorization: Basic', base64_encode("$user:$pass"),
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($curl);
    
    if(curl_errno($curl)){
        throw new Exception(curl_error($curl));
    }
    curl_close($curl);

    echo $response;
}