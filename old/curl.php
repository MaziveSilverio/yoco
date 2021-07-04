<?php

$URL  = 'http://www.google.com';
$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $URL);
curl_setopt($curlHandle, CURLOPT_HEADER, true);
curl_setopt($curlHandle, CURLOPT_NOBODY  , true);  // we don't need body
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
curl_exec($curlHandle);
$response = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
curl_close($curlHandle); // Don't forget to close the connection

echo $response,""; 
?>