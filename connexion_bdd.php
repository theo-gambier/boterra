<?php

require_once ('conf.inc.php');

try {
    $bdd = new PDO('mysql:host=' . HOST. ';dbname=' . DBNAME, USER, PASSWORD);
}catch (PDOException $e){
    die("erreur de connexion" . $e->getMessage());
}