<?php
include 'conexion.php';
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conexionmysql->prepare("SELECT id, nombre_cliente, cantidad_boletos, tipo_sala, formato, fecha_funcion FROM reservas WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$reserva = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar reserva</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
        }
        form{
            width:500px;
            margin:40px auto;
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        input, select{
            width:100%;
            padding:10px;
            margin:10px 0;
        }
        button{
            padding:10px 15px;
            background:#b30000;
            color:white;
            border:none;
            border-radius:5px;
        }
        h2{
            text-align:center;
        }
        .radio-group input{
            width:auto;
        }
    </style>
</head>
<body>

<form action="editarreserva.php" method="post">
    <h2>Editar reserva</h2>

    <input type="hidden" name="id" value="<?php echo $reserva['id']; ?>">

    <label>Nombre del cliente</label>
    <input type="text" name="nombre_cliente" value="<?php echo $reserva['nombre_cliente']; ?>" required>

    <label>Cantidad de boletos</label>
    <input type="number" name="cantidad_boletos" min="1" value="<?php echo $reserva['cantidad_boletos']; ?>" required>

    <label>Tipo de sala</label>
    <select name="tipo_sala" required>
        <option value="Sala tradicional" <?php if($reserva['tipo_sala']=="Sala tradicional") echo "selected"; ?>>Sala tradicional</option>
        <option value="Sala VIP" <?php if($reserva['tipo_sala']=="Sala VIP") echo "selected"; ?>>Sala VIP</option>
        <option value="Sala XD" <?php if($reserva['tipo_sala']=="Sala XD") echo "selected"; ?>>Sala XD</option>
    </select>

    <label>Formato</label>
    <div class="radio-group">
        <input type="radio" name="formato" value="2D" <?php if($reserva['formato']=="2D") echo "checked"; ?> required> 2D
        <input type="radio" name="formato" value="3D" <?php if($reserva['formato']=="3D") echo "checked"; ?> required> 3D
    </div>

    <label>Fecha de función</label>
    <input type="date" name="fecha_funcion" value="<?php echo $reserva['fecha_funcion']; ?>">

    <button type="submit" name="guardar">Editar</button>
</form>

</body>
</html>