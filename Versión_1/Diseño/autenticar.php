<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <style>
        /* Estilos CSS aquí */
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
            color: yellow; /* Color amarillo para mensaje de bienvenida */
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
            color: yellow; /* Color amarillo para mensajes de error */
        }

        .logout-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
session_start();

// Verificar si se envió el formulario de cierre de sesión
if(isset($_GET['logout'])) {
    // Destruir la sesión
    session_destroy();
    // Redirigir a la página de inicio de sesión
    header("Location: inicio_sesion.php");
    exit;
}

// Verificar si se enviaron datos del formulario
if(isset($_POST['correo']) && isset($_POST['clave'])) {
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "datosks");

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Obtener datos del formulario de inicio de sesión
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    // Consulta para verificar el correo y la clave en la base de datos
    $query = "SELECT * FROM participantes WHERE correo='$correo' AND clave='$clave'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        // Inicio de sesión exitoso, establecer la variable de sesión y dar la bienvenida
        $fila = mysqli_fetch_assoc($resultado);
        $_SESSION['nombre'] = $fila['nombre'];
        echo "<h2>Bienvenido, <span>". $_SESSION['nombre'] ."</span>. Tine acceso a toda la página.</h2>";
        
        echo "<form action='login.php' method='get' class='logout-button'>";
        echo "<input type='hidden' name='logout' value='true'>";
        echo "<input type='submit' value='Cerrar sesión'>";
        echo "</form>";
    } else {
        // Error en el inicio de sesión
        echo "<h2 class='error-message'>Correo o clave incorrectos.</h2>";
    }

    // Cerrar conexión
    mysqli_close($conexion);
} else {
    // Mostrar mensaje si no se enviaron datos del formulario
    echo "<h2 class='error-message'>No se recibieron datos del formulario.</h2>";
}
?>

<?php include 'navegador.php'; ?>

</body>
</html>
