<?php
include 'conexion.php';
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Cinemark</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
            margin:0;
            padding:20px;
        }
        h1,h2,h3{
            text-align:center;
            color:#b30000;
        }
        table{
            width:90%;
            margin:20px auto;
            border-collapse:collapse;
            background:white;
        }
        th, td{
            border:1px solid #ccc;
            padding:10px;
            text-align:center;
        }
        th{
            background:#b30000;
            color:white;
        }
        form{
            width:80%;
            margin:20px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        input, select{
            width:100%;
            padding:10px;
            margin:8px 0;
        }
        .radio-group input{
            width:auto;
        }
        button{
            background:#b30000;
            color:white;
            border:none;
            padding:10px 15px;
            cursor:pointer;
            border-radius:5px;
        }
        button:hover{
            background:#800000;
        }
        .acciones{
            display:flex;
            gap:10px;
            justify-content:center;
        }
        .top{
            text-align:center;
            margin-bottom:20px;
        }
        a{
            text-decoration:none;
        }
    </style>
</head>
<body>

    <h1>Cinemark El Salvador</h1>
    <h3>Panel privado de reservas</h3>

    <div class="top">
        <a href="index.php"><button>Ver página pública</button></a>
        <a href="logout.php"><button>Cerrar sesión</button></a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Cantidad de boletos</th>
                <th>Tipo de sala</th>
                <th>Formato</th>
                <th>Fecha de función</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM reservas ORDER BY nombre_cliente ASC";
            $resultado = $conexionmysql->query($query);
            while($row = $resultado->fetch_assoc()):
            ?>
            <tr>
                <td><?php echo $row['nombre_cliente']; ?></td>
                <td><?php echo $row['cantidad_boletos']; ?></td>
                <td><?php echo $row['tipo_sala']; ?></td>
                <td><?php echo $row['formato']; ?></td>
                <td>
                    <?php
                    if($row['fecha_funcion'] == NULL || $row['fecha_funcion'] == "0000-00-00"){
                        echo "Sin fecha asignada";
                    } else {
                        echo $row['fecha_funcion'];
                    }
                    ?>
                </td>
                <td class="acciones">
                    <a href="editar.php?id=<?php echo $row['id']; ?>"><button>Editar</button></a>
                    <a href="eliminar.php?eliminar=<?php echo $row['id']; ?>"><button>Eliminar</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Nueva reserva</h2>
    <form action="crear.php" method="post">
        <label>Nombre del cliente</label>
        <input type="text" name="nombre_cliente" required>

        <label>Cantidad de boletos</label>
        <input type="number" name="cantidad_boletos" min="1" required>

        <label>Tipo de sala</label>
        <select name="tipo_sala" required>
            <option value="">Seleccione una sala</option>
            <option value="Sala tradicional">Sala tradicional</option>
            <option value="Sala VIP">Sala VIP</option>
            <option value="Sala XD">Sala XD</option>
        </select>

        <label>Formato</label>
        <div class="radio-group">
            <input type="radio" name="formato" value="2D" required> 2D
            <input type="radio" name="formato" value="3D" required> 3D
        </div>

        <label>Fecha de función</label>
        <input type="date" name="fecha_funcion">

        <button type="submit" name="guardar">Crear nueva reserva</button>
    </form>

</body>
</html>