<?php
session_start();

// Verificar si el usuario ya está autenticado
if(isset($_SESSION["nombre"])) {
    // Si el usuario ya está autenticado, redirigirlo al dashboard
    header("location: dashboard.php");
    exit;
}

// Verificar si se ha enviado el formulario de cierre de sesión
if(isset($_GET['logout'])) {
    // Destruir la sesión
    session_destroy();
    // Redirigir a la página de inicio de sesión
    header("Location: login.php");
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
        // Inicio de sesión exitoso, establecer la variable de sesión y redirigir al dashboard
        $fila = mysqli_fetch_assoc($resultado);
        $_SESSION['nombre'] = $fila['nombre'];
        header("location: dashboard.php");
        exit;
    } else {
        // Error en el inicio de sesión
        $error = "Correo o clave incorrectos.";
    }

    // Cerrar conexión
    mysqli_close($conexion);
}
?>

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
    include 'navegador.php';
?>
<div id="login-form">
    <h2>Iniciar Sesión</h2>
    <form action="login.php" method="post">
        <label for="correo">Correo:</label>
        <input type="email" name="correo" required><br>
        <label for="clave">Clave:</label>
        <input type="password" name="clave" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>

    <?php if(isset($error)) { ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php } ?>

    <!-- Mostrar botón de cerrar sesión si el usuario está autenticado -->
    <?php if(isset($_SESSION["nombre"])) { ?>
        <form action="login.php" method="get" class="logout-button">
            <input type="hidden" name="logout" value="true">
            <input type="submit" value="Cerrar Sesión">
        </form>
    <?php } ?>
</div>

</body>
</html>
