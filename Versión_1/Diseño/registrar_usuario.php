<?php
session_start();

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "datosks");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Obtener datos del formulario de registro
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$genero_id = $_POST['genero_id'];
$grado_estudio_id = $_POST['grado_estudio_id'];
$año_estudio = $_POST['año_estudio'];
$especialidad = $_POST['especialidad'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$robot_id = $_POST['robot_id'];
$club_robotica_id = $_POST['club_robotica_id'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

// Consulta para insertar los datos en la tabla participantes
$query = "INSERT INTO participantes (nombre, apellido, dni, participante_genero_id, grado_estudio_id, año_estudio, especialidad, correo, clave, robot_id, club_robotica_id, fecha_nacimiento) 
          VALUES ('$nombre', '$apellido', '$dni', $genero_id, $grado_estudio_id, $año_estudio, '$especialidad', '$correo', '$clave', $robot_id, $club_robotica_id, '$fecha_nacimiento')";

if (mysqli_query($conexion, $query)) {
    // Registro exitoso, redireccionar a la página de inicio de sesión o mostrar un mensaje de éxito
    echo "Registro exitoso. Por favor, inicia sesión <a href='login.php'>aquí</a>.";
} else {
    // Error en el registro
    echo "Error al registrar el usuario: " . mysqli_error($conexion);
}

// Cerrar conexión
mysqli_close($conexion);
?>
