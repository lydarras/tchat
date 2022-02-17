<?php

$host='localhost';
$bd='tchat';
$login='root';
$password='';
$options= array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

$pdo = new PDO('mysql:host='.$host.';dbname='.$bd, $login, $password,$options);