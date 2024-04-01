<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Participantes</title>
</head>
<body>
  <h2>Formulario de Participantes</h2>
  <form action="procesar_formulario.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required maxlength="50"><br><br>
    
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required maxlength="50"><br><br>
    
    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" required maxlength="10"><br><br>
    
    <label for="genero">Género:</label>
    <select id="genero" name="genero" required>
      <option value="1">Masculino</option>
      <option value="2">Femenino</option>
      <option value="3">Otro</option>
    </select><br><br>
    
    <label for="grado_estudio">Grado de Estudio:</label>
    <input type="number" id="grado_estudio" name="grado_estudio" required><br><br>
    
    <label for="año_estudio">Año de Estudio:</label>
    <input type="number" id="año_estudio" name="año_estudio" required><br><br>
    
    <label for="especialidad">Especialidad:</label>
    <input type="text" id="especialidad" name="especialidad" required maxlength="50"><br><br>
    
    <label for="correo">Correo Electrónico:</label>
    <input type="email" id="correo" name="correo" required maxlength="100"><br><br>
    
    <label for="clave">Clave:</label>
    <input type="password" id="clave" name="clave" required maxlength="50"><br><br>
    
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>
    
    <button type="submit">Enviar</button>
  </form>
  <?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer conexión con la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "datosks";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $genero = $_POST['genero'];
    $grado_estudio = $_POST['grado_estudio'];
    $año_estudio = $_POST['año_estudio'];
    $especialidad = $_POST['especialidad'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO participantes (nombre, apellido, dni, participante_genero_id, grado_estudio_id, año_estudio, especialidad, correo, clave, fecha_nacimiento) VALUES ('$nombre', '$apellido', '$dni', '$genero', '$grado_estudio', '$año_estudio', '$especialidad', '$correo', '$clave', '$fecha_nacimiento')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "¡Los datos se han insertado correctamente!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión con la base de datos
    $conn->close();
}
?>
</body>




</html>
