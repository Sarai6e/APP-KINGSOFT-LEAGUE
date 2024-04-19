<?php
// Procesar el formulario de categoría

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario correctamente
    if (isset($_POST['descripcion'])) {
        // Recoger datos del formulario
        $descripcion = $_POST['descripcion'];

        // Conexión a la base de datos (reemplaza 'nombre_de_la_base_de_datos', 'nombre_de_usuario' y 'contraseña' con los valores reales)
        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');

        // Preparar la consulta para insertar la categoría en la base de datos
        $query = "INSERT INTO categoria (descripcion) VALUES (?)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $descripcion);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redireccionar con mensaje de éxito
            header("Location: agregar_categoria.php?success=true");
            exit();
        } else {
            // Redireccionar con mensaje de error
            header("Location: agregar_categoria.php?error=true");
            exit();
        }
    } else {
        // Redireccionar con mensaje de error si faltan campos
        header("Location: agregar_categoria.php?error=true");
        exit();
    }
} else {
    // Redireccionar si no se accede mediante POST
    header("Location: agregar_categoria.php");
    exit();
}
?>
