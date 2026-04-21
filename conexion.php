<?php
$host = "localhost";
$username = "root";
$db = "parcial2";
$pass = "";
$port = 3306;

$conexionmysql = new mysqli($host, $username, $pass, $db);

if ($conexionmysql->connect_error) {
    die("Error de conexion: " . $conexionmysql->connect_error);
}
?>