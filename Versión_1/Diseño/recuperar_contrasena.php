<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <!-- Estilos CSS -->
</head>
<body>
    <h2>Recuperar contraseña</h2>
    <form action="enviar_correo.php" method="post">
        <label for="email">Correo electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Enviar correo de recuperación">
    </form>
</body>
</html>
