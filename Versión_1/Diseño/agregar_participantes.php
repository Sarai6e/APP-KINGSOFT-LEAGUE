<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datosks";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Mensaje de éxito o error
$message = '';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $genero = $_POST["genero"];
    $grado_estudio = $_POST["grado_estudio"];
    $año_estudio = $_POST["año_estudio"];
    $especialidad = $_POST["especialidad"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $club_robotica_id = $_POST["club_robotica"];

    // Insertar datos en la tabla participantes
    $query = "INSERT INTO participantes (nombre, apellido, dni, participante_genero_id, grado_estudio_id, año_estudio, especialidad, correo, clave, fecha_nacimiento, club_robotica_id) 
              VALUES ('$nombre', '$apellido', '$dni', '$genero', '$grado_estudio', '$año_estudio', '$especialidad', '$correo', '$clave', '$fecha_nacimiento', '$club_robotica_id')";
    
    if (mysqli_query($conn, $query)) {
        $message = "Participante agregado correctamente.";
    } else {
        $message = "Error al agregar participante: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Participantes</title>
        <!-- Agregar Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos CSS */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco transparente */
        }

        form {
            width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
        }

        .message {
            text-align: center;
            padding-top: 10px;
            color: green;
        }
    </style>
</head>
<body>
    <?php include 'navegador.php'; ?>
    <div class="message"><?php echo $message; ?></div>
    <!-- Formulario de registro de participantes -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2 style="text-align: center;">Agregar Participantes</h2>
        <label  for="nombre">Nombre:</label>
        <input  type="text" name="nombre" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br>
        <label for="dni">DNI:</label>
        <input type="text" name="dni" required><br>
        <label for="genero">Género:</label>
        <select name="genero">
            <option value="1">Masculino</option>
            <option value="3">Femenino</option>
        </select><br>
        <label for="grado_estudio">Grado de Estudio:</label>
        <select name="grado_estudio">
            <option value="1">Secundaria</option>
            <option value="3">Universidad</option>
        </select><br>
        <label for="año_estudio">Año de Estudio:</label>
        <input type="number" name="año_estudio" required><br>
        <label for="especialidad">Especialidad:</label>
        <input type="text" name="especialidad"><br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" required><br>
        <label for="clave">Clave:</label>
        <input type="password" name="clave" required><br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required><br>
        <label for="club_robotica">Club de Robótica:</label>
        <select name="club_robotica">
            <!-- Opciones del club de robótica -->
            <?php
            // Consulta para obtener los clubes de robótica
            $query_clubes = "SELECT id, nombre FROM club_robotica";
            $result_clubes = mysqli_query($conn, $query_clubes);

            // Iterar sobre los resultados y mostrar las opciones
            while ($row = mysqli_fetch_assoc($result_clubes)) {
                echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
            }
            ?>
        </select><br>
        <input type="submit" value="Agregar Participante">
        <!--<p>¿Quieres volver al registro de usuarios? <a href="registro.php">Haz clic aquí</a>.</p>-->
        <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="registro.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="registro.php">1</a></li>
    <li class="page-item"><a class="page-link" href="agregar_participantes.php">2</a></li>
    <li class="page-item">
      <a class="page-link" href="agregar_participantes.php" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
    </form>


        <!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
