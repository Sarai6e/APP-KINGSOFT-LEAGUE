<?php
session_start();
require_once 'RobotController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new RobotController($db);

// Ver todos los robots
$robots = $controller->index($_SESSION['id_usuario']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robots</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table{
            background-color:white;
        }
        .container {
            margin-top: 150px; /* Ajuste del margen superior */
            text-align: center; /* Centrar elementos dentro del contenedor */
        }
        h1{
             color:white;
        }
    </style>
</head>
<body>
<?php 
    include 'navegador.php'
    ?>
    <div class="container">
        <h1>Robots</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Peso</th>
                    <th>Ancho</th>
                    <th>Alto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($robot = $robots->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo $robot['id']; ?></td>
                        <td><?php echo $robot['nombre']; ?></td>
                        <td><?php echo $robot['peso']; ?></td>
                        <td><?php echo $robot['ancho']; ?></td>
                        <td><?php echo $robot['alto']; ?></td>
                        <td>
                            <a href="ver_robot.php?id=<?php echo $robot['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editar_robot.php?id=<?php echo $robot['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar_robot.php?id=<?php echo $robot['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
