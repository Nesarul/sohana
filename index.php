<?php
if($webhook = json_decode(file_get_contents("webhook.log"), true)){
$response = $webhook; 
 }
   echo "<pre>";
   print_r($response);
   echo "</pre>";
?>