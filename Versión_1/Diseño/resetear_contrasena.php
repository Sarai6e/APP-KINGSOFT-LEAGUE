<?php
// Verificar si se proporcionó un token en la URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Verificar el token en la base de datos
    // Aquí debes implementar la lógica para verificar el token en tu base de datos
    
    // Si el token es válido, mostrar el formulario para restablecer la contraseña
    if ($token_valido) {
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Restablecer contraseña</title>
            <!-- Estilos CSS -->
        </head>
        <body>
            <h2>Restablecer contraseña</h2>
            <form action="guardar_nueva_contrasena.php" method="post">
                <input type="hidden" name="token" value="' . $token . '">
                <label for="contrasena">Nueva contraseña:</label><br>
                <input type="password" id="contrasena" name="contrasena" required><br><br>
                <input type="submit" value="Guardar nueva contraseña">
            </form>
        </body>
        </html>
        ';
    } else {
        echo 'El token de restablecimiento de contraseña no es válido.';
    }
} else {
    echo 'Token no proporcionado.';
}
?>
