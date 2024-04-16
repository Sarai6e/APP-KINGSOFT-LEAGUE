<?php
// Procesar el formulario de categoría de competencia

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario correctamente
    if (isset($_POST['id_tipo_competencia']) && isset($_POST['id_categoria_jugador']) && isset($_POST['reglas']) && isset($_POST['precio'])) {
        // Recoger datos del formulario
        $id_tipo_competencia = $_POST['id_tipo_competencia'];
        $id_categoria_jugador = $_POST['id_categoria_jugador'];
        $reglas = $_POST['reglas'];
        $precio = $_POST['precio'];

        // Conexión a la base de datos (reemplaza 'nombre_de_la_base_de_datos', 'nombre_de_usuario' y 'contraseña' con los valores reales)
        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');

        // Preparar la consulta para insertar la categoría de competencia en la base de datos
        $query = "INSERT INTO categoria_competencia (id_tipo_competencia, id_categoria_jugador, reglas, precio) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $id_tipo_competencia);
        $stmt->bindParam(2, $id_categoria_jugador);
        $stmt->bindParam(3, $reglas);
        $stmt->bindParam(4, $precio);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Categoría registrada correctamente.";
        } else {
            echo "Error al registrar la categoría.";
        }
    } else {
        echo "Todos los campos son requeridos.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
