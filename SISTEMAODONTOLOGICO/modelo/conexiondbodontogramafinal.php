<?php
 
class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=bd_hc_odontologia", "root","");

		$link->exec("set names utf8");

		return $link;

		

	}

}  