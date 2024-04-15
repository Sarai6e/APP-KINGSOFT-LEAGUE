<?php
// Procesar el formulario de inscripción

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario correctamente
    if (isset($_POST['id_usuario']) && isset($_POST['id_categoria']) && isset($_FILES['boucher'])) {
        // Recoger datos del formulario
        $id_usuario = $_POST['id_usuario'];
        $id_categoria = $_POST['id_categoria'];

        // Verificar si el archivo se ha subido correctamente
        if ($_FILES['boucher']['error'] === UPLOAD_ERR_OK) {
            // Obtener información sobre el archivo
            $file_name = $_FILES['boucher']['name'];
            $file_tmp = $_FILES['boucher']['tmp_name'];

            // Generar un nombre de archivo único que incluya el ID del usuario
            $file_name_with_id = $id_usuario . "_" . $file_name;

            // Mover el archivo a la carpeta deseada (se recomienda sanitizar el nombre del archivo para evitar posibles ataques)
            $destination = "./uploads/" . $file_name_with_id;
            move_uploaded_file($file_tmp, $destination);

            // Aquí deberías guardar los datos de la inscripción en la base de datos, incluido el nombre del archivo
            // Conexión a la base de datos
            $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');

            // Preparar la consulta para insertar la inscripción en la base de datos
            $query = "INSERT INTO inscripcion (id_usuario, id_categoria_competencia, boucher) VALUES (?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(1, $id_usuario);
            $stmt->bindParam(2, $id_categoria);
            $stmt->bindParam(3, $file_name_with_id);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Inscripción registrada correctamente.";
            } else {
                echo "Error al registrar la inscripción.";
            }
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Todos los campos son requeridos.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
