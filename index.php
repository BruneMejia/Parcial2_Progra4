<?php
include 'conexion.php';
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinemark El Salvador</title>
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
        .top{
            text-align:center;
            margin-bottom:20px;
        }
        a{
            text-decoration:none;
        }
        button{
            background:#b30000;
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:5px;
            cursor:pointer;
        }
        button:hover{
            background:#800000;
        }
    </style>
</head>
<body>

    <img src="image.png" alt="Logo" style="display:block; margin:0 auto; max-width:450px; height:auto; max-width:450px; height:auto;">
    <h3>Sistema web de reserva de boletos</h3>

    <div class="top">
        <?php if(isset($_SESSION['usuario'])): ?>
            <a href="panel.php"><button>Ir al panel</button></a>
            <a href="logout.php"><button>Cerrar sesión</button></a>
        <?php else: ?>
            <a href="login.php"><button>Iniciar sesión</button></a>
        <?php endif; ?>
    </div>

    <h2>Cartelera disponible</h2>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Genero</th>
                <th>Clasificacion</th>
                <th>Fecha de estreno</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM peliculas ORDER BY titulo ASC";
            $resultado = $conexionmysql->query($query);
            while($row = $resultado->fetch_assoc()):
            ?>
            <tr>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['genero']; ?></td>
                <td><?php echo $row['clasificacion']; ?></td>
                <td>
                    <?php
                    if($row['fecha_estreno'] == NULL || $row['fecha_estreno'] == "0000-00-00"){
                        echo "Proximamente";
                    } else {
                        echo $row['fecha_estreno'];
                    }
                    ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Reservas registradas</h2>
    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Cantidad de boletos</th>
                <th>Tipo de sala</th>
                <th>Formato</th>
                <th>Fecha de funcion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query2 = "SELECT * FROM reservas ORDER BY nombre_cliente ASC";
            $resultado2 = $conexionmysql->query($query2);
            while($row = $resultado2->fetch_assoc()):
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
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>