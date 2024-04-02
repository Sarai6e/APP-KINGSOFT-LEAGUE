<?php
session_start();

// Verifica si el usuario no está autenticado, en ese caso redirige al inicio de sesión
if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

// Verificar si se ha enviado el formulario de cierre de sesión
if(isset($_GET['logout'])) {
    // Destruir la sesión
    session_destroy();
    // Redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #333; /* Color de fondo oscuro */
            color: white; /* Color de texto blanco */
        }
        .container {
            text-align: center;
        }
        h2 {
            color: yellow; /* Color de texto amarillo */
            margin-bottom: 20px; /* Agregamos margen inferior para separarlo del botón */
        }
        a {
            color: white; /* Color de texto blanco para el enlace */
            text-decoration: none;
            background-color: #000; /* Color de fondo negro */
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block; /* Hacemos que el botón sea un bloque en línea */
            margin-top: 20px; /* Agregamos margen superior para separarlo del texto */
        }
        a:hover {
            background-color: #191919; /* Cambia el color de fondo al pasar el ratón por encima */
        }
    </style>
</head>
<body>
<?php 
    include 'navegador.php';
?>
    <div class="container">
        <h2>Bienvenido, <?php echo $_SESSION['nombre']; ?>!</h2>
        <p></p>
        <!-- Agregar enlace para cerrar sesión -->
        <a href="dashboard.php?logout=true">Cerrar sesión</a>
    
        <!-- Aquí puedes agregar el resto del contenido de tu página web -->
    </div>
</body>
</html>
