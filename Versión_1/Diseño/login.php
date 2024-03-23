<?php
session_start();

// Verifica si el usuario ya está autenticado, en ese caso redirige al dashboard
if (isset($_SESSION['usuario'])) {
    header("Location: dashboard.php");
    exit();
}

// Verifica si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conexión a la base de datos (asegúrate de cambiar los valores a los de tu base de datos)
    $conexion = new mysqli("localhost", "root", "", "datosks");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Recupera los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta para verificar el usuario y la contraseña
    $sql = "SELECT id, usuario FROM usuarios WHERE usuario = ? AND contrasena = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verifica si se encontró un usuario con la contraseña proporcionada
    if ($resultado->num_rows > 0) {
        // Inicia la sesión y guarda el nombre de usuario y el ID
        $fila = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $fila['usuario'];
        $_SESSION['id_usuario'] = $fila['id'];
        
        // Registra el ID del usuario que inició sesión en la tabla de registros (logs)
        $id_usuario = $fila['id'];
        $ip_usuario = $_SERVER['REMOTE_ADDR']; // Obtén la dirección IP del usuario
        $fecha_hora = date("Y-m-d H:i:s"); // Obtiene la fecha y hora actual

        $sql_registro = "INSERT INTO registros (id_usuario, ip_usuario, fecha_hora) VALUES (?, ?, ?)";
        $stmt_registro = $conexion->prepare($sql_registro);
        $stmt_registro->bind_param("iss", $id_usuario, $ip_usuario, $fecha_hora);
        $stmt_registro->execute();
        
        // Redirige al dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Usuario o contraseña incorrectos
        $mensaje_error = "Usuario o contraseña incorrectos";
    }

    // Cierra la conexión
    $stmt->close();
    if (isset($stmt_registro)) {
        $stmt_registro->close();
    }
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        #login-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        h2 {
            color: #333;
        }
        
        label {
            color: #333;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .error-message {
            color: #ff0000;
        }
    </style>
</head>
<body>
<?php 
    include 'navegador.php'
    ?>
    <div id="login-form">
        <h2>Iniciar sesión</h2>
        <?php if (isset($mensaje_error)) { echo "<p class='error-message'>$mensaje_error</p>"; } ?>
        <form method="post" action="">
            <label for="usuario">Usuario:</label><br>
            <input type="text" id="usuario" name="usuario" required><br>
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena" required><br><br>
            <input type="submit" value="Iniciar sesión">
        </form>
    </div>
</body>
</html>
