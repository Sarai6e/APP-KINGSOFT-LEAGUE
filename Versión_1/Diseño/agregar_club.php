<?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    // Procesar el archivo de imagen del formulario (si se envió)
    $logo = $_FILES['logo']['tmp_name'] ?? null;
    if ($logo !== null) {
        $logo = file_get_contents($logo);
    }

    // Insertar los datos en la base de datos
    $query = "INSERT INTO club_robotica (nombre, ciudad, pais, logo) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $ciudad);
    $stmt->bindParam(3, $pais);
    $stmt->bindParam(4, $logo, PDO::PARAM_LOB); // PDO::PARAM_LOB se utiliza para datos binarios
    if ($stmt->execute()) {
        echo "Club agregado correctamente.";
    } else {
        echo "Error al agregar el club.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Club de Robótica</title>
</head>
<body>
    <h2>Agregar Club de Robótica</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="ciudad">Ciudad:</label><br>
        <input type="text" id="ciudad" name="ciudad" required><br><br>

        <label for="pais">País:</label><br>
        <input type="text" id="pais" name="pais" required><br><br>

        <label for="logo">Logo:</label><br>
        <input type="file" id="logo" name="logo" accept="image/*"><br><br>

        <input type="submit" value="Agregar Club">
    </form>
</body>
</html>
