<?php
include 'conexion.php';
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

if(isset($_GET["eliminar"])){
    $id = $_GET["eliminar"];
    $stmt = $conexionmysql->prepare("DELETE FROM reservas WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: panel.php");
}
?>