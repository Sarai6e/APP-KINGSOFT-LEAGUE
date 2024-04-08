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

// Después de verificar las credenciales y antes de redirigir al usuario al dashboard
if (mysqli_num_rows($resultado) == 1) {
    // Inicio de sesión exitoso, establecer la variable de sesión y redirigir al dashboard
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['id_participante'] = $fila['id'];
     // Almacenar el ID del participante en la sesión
    // Redirigir a la página principal correspondiente después del inicio de sesión
    if ($fila['rol'] == 'normal') {
        header("location: menu.html");
    } else {
        header("location: menulogin.php");
    }
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
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #333;
        }

        label {
            color: #333;
            display: block;
            margin-top: 10px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: calc(100% - 22px); /* 22px para considerar el padding y el borde */
            padding: 10px;
            margin: 5px 0;
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
            margin-top: 5px;
        }

        /* Estilos para el enlace de mostrar contraseña */
        .show-password {
            margin-top: 5px;
            display: inline-block;
            text-decoration: none;
            color: #007bff; /* Cambia el color del enlace */
            font-size: 14px; /* Ajusta el tamaño del texto */
        }

        /* Estilos para el enlace de registrarse y olvidar contraseña */
        .link {
            color: #007bff;
            text-decoration: none;
            margin-top: 10px;
            display: block;
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
            <input type="password" name="clave" id="password" required>
            <!-- Enlace para mostrar la contraseña -->
            <a href="#" class="show-password" onclick="togglePassword()">Ver Contraseña</a><br>
            <!-- Enlaces para registrarse y recuperar contraseña -->
            <a href="registro.php" class="link">Registrarse</a>
            <a href="recuperar_contrasena.php" class="link">¿Olvidaste tu contraseña?</a>
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
<script>
        // Función para alternar la visibilidad de la contraseña
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
</body>
</html>
