<?php
// Procesar el formulario de inscripción

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario correctamente
    if (isset($_POST['id_participante']) && isset($_POST['id_categoria']) && isset($_POST['id_robot']) && isset($_POST['confirmacion']) && isset($_FILES['boucher'])) {
        // Recoger datos del formulario
        $id_participante = $_POST['id_participante'];
        $id_categoria = $_POST['id_categoria'];
        $id_robot = $_POST['id_robot'];
        $confirmacion = $_POST['confirmacion'];
        $puntaje = $_POST['puntaje'];
        $posicion = $_POST['posicion'];
        $descalificacion = $_POST['descalificacion'];

        // Verificar si el archivo se ha subido correctamente
        if ($_FILES['boucher']['error'] === UPLOAD_ERR_OK) {
            // Obtener información sobre el archivo
            $file_name = $_FILES['boucher']['name'];
            $file_tmp = $_FILES['boucher']['tmp_name'];

            // Generar un nombre de archivo único que incluya el ID del usuario
            $file_name_with_id =  $id_participante . "_" . $file_name;

            // Mover el archivo a la carpeta deseada (se recomienda sanitizar el nombre del archivo para evitar posibles ataques)
            $destination = "./VOUCHER/" . $file_name_with_id;
            move_uploaded_file($file_tmp, $destination);

            // Aquí mostrar "Guardado" junto con el ID del usuario
            echo "Guardado con éxito. ID de Usuario:  $id_participante";
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
