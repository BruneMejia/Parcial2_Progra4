<?php
include 'conexion.php';
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST["guardar"])){
    $nombre_cliente = trim($_POST['nombre_cliente']);
    $cantidad_boletos = $_POST['cantidad_boletos'];
    $tipo_sala = $_POST['tipo_sala'];
    $formato = $_POST['formato'];
    $fecha_funcion = !empty($_POST['fecha_funcion']) ? $_POST['fecha_funcion'] : NULL;

    if(empty($nombre_cliente) || empty($cantidad_boletos) || empty($tipo_sala) || empty($formato)){
        die("Todos los campos obligatorios deben completarse.");
    }

    if(!is_numeric($cantidad_boletos) || $cantidad_boletos <= 0){
        die("La cantidad de boletos debe ser un número mayor que cero.");
    }

    $stmt = $conexionmysql->prepare("INSERT INTO reservas (nombre_cliente, cantidad_boletos, tipo_sala, formato, fecha_funcion) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sisss", $nombre_cliente, $cantidad_boletos, $tipo_sala, $formato, $fecha_funcion);
    $stmt->execute();
    $stmt->close();

    header("Location: panel.php");
}
?>