<?php 

$host = 'localhost';
$db = 'attendance_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$sdn = "mysql:host=$host;dbname=$db;charset=$charset";

try{
    $pdo = new PDO($sdn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    throw new PDOException($e->getMessage());
    
}
require_once 'crud.php';
require_once 'user.php';
$crud = new crud($pdo);
$user = new user($pdo);
$user->insertUser("Poirot","Jebus");









?>