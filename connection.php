<?php
    $host = 'localhost';
    $port = 5432;
    $db = 'crime';
    $user = 'postgres';
    $password = 'swathi@123';

    try {
        $con = pg_connect("host = $host port = $port dbname = $db user = $user password = $password");
    }
    catch (Exception $e) {
        echo $e;
    }
?>
