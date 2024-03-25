<?php
session_start();

// Función para registrar eventos
function registrarEvento($tipo, $id_usuario = null) {
    // Conexión a la base de datos (asegúrate de cambiar los valores a los de tu base de datos)
    $conexion = new mysqli("localhost", "root", "", "datosks");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Obtiene la dirección IP del usuario
    $ip_usuario = $_SERVER['REMOTE_ADDR'];

    // Obtiene la fecha y hora actual
    $fecha_hora = date("Y-m-d H:i:s");

    // Consulta para insertar el registro del evento
    $sql_registro = "INSERT INTO registros (tipo_evento, id_usuario, ip_usuario, fecha_hora) VALUES (?, ?, ?, ?)";
    $stmt_registro = $conexion->prepare($sql_registro);
    $stmt_registro->bind_param("siss", $tipo, $id_usuario, $ip_usuario, $fecha_hora);
    $stmt_registro->execute();

    // Cierra la conexión
    $stmt_registro->close();
    $conexion->close();
}

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

        // Registra el evento de inicio de sesión exitoso
        registrarEvento("Inicio de sesión exitoso", $_SESSION['id_usuario']);

        // Redirige al dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Usuario o contraseña incorrectos
        $mensaje_error = "Usuario o contraseña incorrectos";

        // Registra el evento de inicio de sesión fallido
        registrarEvento("Inicio de sesión fallido");
    }

    // Cierra la conexión
    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Estilos CSS -->
</head>
<body>
    <!-- Contenido HTML -->HFJDJ
</body>
</html>
