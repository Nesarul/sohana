<?php
if(isset($_POST)){
   $get = file_get_contents('example.json'); 
   // example.json is for the demo, it can be any of your source data
   $dump = print_r( $get, true );
   $create_webhookfile = file_put_contents( 'webhook.log', $dump );
   }