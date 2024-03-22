<?php
session_start();

// Verifica si el usuario no está autenticado, en ese caso redirige al inicio de sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h2>
    <p>Esta es la página de inicio (dashboard).</p>
    <a href="logout.php">Cerrar sesión</a>
    
    <!-- Aquí puedes agregar el resto del contenido de tu página web -->
    
</body>
</html>
