<?php

function getConnection() {

   /* $hostname = "localhost:3306";
    $database = "u772957127_bayes";
    $usuario = "u772957127_exper"; 
    $password = "gamma26";*/
    $hostname = "163.178.107.130";
    $database = "b43478-2";
    $usuario = "adm"; 
    $password = "saucr.092";
    /*$hostname = "localhost:3306";
    $database = "tarea2-expertos"; 
    $usuario = "root"; 
    $password = "gamma26";*/

    $connection = mysqli_connect($hostname, $usuario, $password,$database);
            if (!$connection) {
                die("Connection failed: " . mysql_error());
            }

    
    return $connection;
    
}

