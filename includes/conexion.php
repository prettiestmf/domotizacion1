<?php

$host = 'localhost';
$user = 'root';
$db = 'sistema-escolar2';
$pass = 'Chocolate123';

    try {
        $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8',$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e) {
        'error: '.$e->getMessage();  
    }