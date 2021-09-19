<?php

try{
	
    $pdo = new PDO("mysql:host=localhost;dbname=bd_hc_odontologia", "root","");
    //echo "conectado";
} catch (PDOException $e){
    
     print "¡Error!: " . $e->getMessage() . "<br/>";
     die();
} 