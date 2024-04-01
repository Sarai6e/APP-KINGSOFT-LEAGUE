<?php


// Incluir el archivo de conexión a la base de datos si es necesario
// include 'conexion.php';

// Función para obtener la dirección IP del usuario
function obtenerIP() {
    // Comprobación de la dirección IP desde el proxy de Internet compartido
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } 
    // Comprobación de la dirección IP desde el proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } 
    // Comprobación de la dirección IP desde la conexión remota
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Iniciar sesión si no está iniciada
session_start();

// Verificar si el usuario ya está autenticado
if(isset($_SESSION["id_usuario"])) {
    // Si el usuario ya está autenticado, redirigirlo a la página de inicio
    header("location: inicio.php");
    exit;
}

// Verificar si se ha enviado el formulario de inicio de sesión
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Procesar los datos del formulario
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    // Validar los datos y autenticar al usuario (agrega tu lógica de autenticación aquí)

    // Ejemplo de autenticación simple (por favor, implementa un método más seguro en tu aplicación)
    if($correo == 'usuario@example.com' && $clave == 'contraseña') {
        // Usuario autenticado con éxito

        // Obtener la dirección IP del usuario
        $ip_usuario = obtenerIP();

        // Obtener el ID del usuario (esto dependerá de cómo manejas las sesiones y la autenticación en tu aplicación)
        $id_usuario = 1; // Aquí deberías obtener el ID del usuario autenticado

        // Insertar registro en la tabla 'registros'
        // NOTA: Asegúrate de manejar las consultas de forma segura para evitar inyección de SQL
        // $sql = "INSERT INTO registros (id_usuario, ip_usuario) VALUES ('$id_usuario', '$ip_usuario')";
        // mysqli_query($conexion, $sql); // Ejecutar la consulta en tu conexión a la base de datos

        // Redirigir al usuario a la página de inicio después de iniciar sesión
        header("location: inicio.php");
        exit;
    } else {
        // Autenticación fallida
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
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
            width: 300px; /* Ajusta el ancho del formulario */
        }
        
        h2 {
            color: #333;
        }
        
        label {
            color: #333;
        }
        
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
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
        }

        /* Estilos para el enlace de mostrar contraseña */
        .show-password {
            margin-top: 5px;
            display: inline-block;
            text-decoration: none;
            color: #007bff; /* Cambia el color del enlace */
            font-size: 14px; /* Ajusta el tamaño del texto */
        }
    </style>

</head>
<body>
<?php include 'navegador.php'; ?>
<form id="login-form" action="autenticar.php" method="post">
    <h2>Iniciar Sesión</h2>
    <label for="correo">Correo:</label>
    <input type="email" name="correo" required><br>
    <label for="clave">Clave:</label>
    <input type="password" name="clave" id="password" required>
    <!-- Enlace para mostrar la contraseña -->
    <a href="#" class="show-password" onclick="togglePassword()">Ver Contraseña</a><br>
    <!-- Enlace para recuperar contraseña -->
    <a href="recuperar_contrasena.php" style="font-size: 14px; color: #007bff; text-decoration: none; margin-top: 10px; display: block;">¿Olvidaste tu contraseña?</a>
    <input type="submit" value="Iniciar Sesión">
    <p>¿No tienes una cuenta? <a href="registro.php">Regístrate</a></p>
</form>

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
    </script>
</body>
</html>
