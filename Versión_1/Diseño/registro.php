<?php
session_start();

// Verifica si el usuario ya está autenticado, en ese caso redirige al dashboard
if (isset($_SESSION['usuario'])) {
    header("Location: dashboard.php");
    exit();
}

// Verifica si se ha enviado el formulario de registro de usuarios
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conexión a la base de datos (asegúrate de cambiar los valores a los de tu base de datos)
    $conexion = new mysqli("localhost", "root", "", "datosks");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Recupera los datos del formulario de registro de usuarios
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta para verificar si el usuario ya existe
    $sql = "SELECT id FROM usuarios WHERE usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verifica si el usuario ya existe
    if ($resultado->num_rows > 0) {
        $mensaje_error = "El usuario ya está registrado";
    } else {
        // Inserta el nuevo usuario en la base de datos
        $sql_insert = "INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)";
        $stmt_insert = $conexion->prepare($sql_insert);
        $stmt_insert->bind_param("ss", $usuario, $contrasena);
        $stmt_insert->execute();

        // Redirige al login
        header("Location: login.php");
        exit();
    }

    // Cierra la conexión
    $stmt->close();
    if (isset($stmt_insert)) {
        $stmt_insert->close();
    }
    $conexion->close();
}

// Verifica si se ha enviado el formulario de registro de participantes
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre_participante'])) {
    // Conexión a la base de datos (asegúrate de cambiar los valores a los de tu base de datos)
    $conexion = new mysqli("localhost", "root", "", "datosks");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Recupera los datos del formulario de registro de participantes
    $nombre_participante = $_POST['nombre_participante'];
    // Agregar aquí el procesamiento de otros datos del participante

    // Consulta para insertar el participante en la base de datos
    $sql_insert = "INSERT INTO participantes (nombre) VALUES (?)";
    $stmt_insert = $conexion->prepare($sql_insert);
    $stmt_insert->bind_param("s", $nombre_participante);
    $stmt_insert->execute();

    // Verifica si se insertó correctamente
    if ($stmt_insert->affected_rows > 0) {
        $mensaje_participante = "Participante agregado exitosamente.";
    } else {
        $mensaje_participante = "Error al agregar participante.";
    }

    // Cierra la conexión
    $stmt_insert->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco transparente */
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: white; /* Fondo blanco */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        /* Estilos adicionales */
        .error-message {
            color: red;
        }

        form {
            margin-top: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php 
    include 'navegador.php'
    ?>

    <!-- Formulario de registro de usuarios -->
    <div class="container">
        <h2>Registro de Usuarios</h2>
        <?php if (isset($mensaje_error)) { echo "<p class='error-message'>$mensaje_error</p>"; } ?>
        <form method="post" action="">
            <label for="usuario">Usuario:</label><br>
            <input type="text" id="usuario" name="usuario" required><br>
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena" required><br><br>
            <input type="submit" value="Registrarse">
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
        <p>Agregar participante: <a href="agregar_participantes.php">Haz clic aquí</a>.</p>
    </div>


