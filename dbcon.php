<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'php_crud';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $conn->setAttribut(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "connected successfuly";
} catch (PDOException $e) {
 echo "Connection Failed". $e->getMessage();
}