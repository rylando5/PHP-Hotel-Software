<?php 
require 'config.php';

try{

    $dsn = "mysql:host=$host;dbname=$db; charset=UTF8";
    
    $pdo = new PDO($dsn, $user, $pass); 
    
    
    if($pdo){
        //echo "connected successfully";
    }
    
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    ?>

