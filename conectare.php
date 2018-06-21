<?php

    try{
        $db=new PDO("mysql:host=localhost;dbname=login_pdo","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        $e->getMessage();
        die();
    }
?>