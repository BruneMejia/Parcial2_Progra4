<?php
session_start();
include 'conexion.php';

if(isset($_POST['ingresar'])){
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    if(empty($correo) || empty($password)){
        $error = "Todos los campos son obligatorios";
    } else {
        $stmt = $conexionmysql->prepare("SELECT * FROM usuarios WHERE correo=? AND password=?");
        $stmt->bind_param("ss", $correo, $password);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado->num_rows > 0){
            $_SESSION['usuario'] = $correo;
            header("Location: panel.php");
            exit();
        } else {
            $error = "Correo o contraseña incorrectos";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Cinemark</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
        }
        form{
            width:350px;
            margin:100px auto;
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        input{
            width:100%;
            padding:10px;
            margin:10px 0;
        }
        button{
            width:100%;
            padding:10px;
            background:#b30000;
            color:white;
            border:none;
            border-radius:5px;
        }
        h2{
            text-align:center;
        }
        p{
            color:red;
            text-align:center;
        }
    </style>
</head>
<body>

<form method="post">
    <h2>Iniciar sesión</h2>

    <?php if(isset($error)) echo "<p>$error</p>"; ?>

    <label>Correo</label>
    <input type="email" name="correo" required>

    <label>Contraseña</label>
    <input type="password" name="password" required>

    <button type="submit" name="ingresar">Entrar</button>
</form>

</body>
</html>