<?php
class Conexion{
    public function conectarPagina(){
		$pdo = new PDO("mysql:host=148.113.168.25;dbname=creati12_creativepagina","creati12_root","xdPhAU{8Q;i!");
		// Establece el modo de error de PDO para que las excepciones se lancen en caso de error
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Configura la codificación de caracteres para la conexión
		$pdo->exec("set names utf8mb4");
		return $pdo;
	}
	public function conectar(){
		$pdo = new PDO("mysql:host=148.113.168.25;dbname=creati12_creativa","creati12_root","xdPhAU{8Q;i!");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Configura la codificación de caracteres para la conexión
		$pdo->exec("set names utf8mb4");
		return $pdo;
	}
}