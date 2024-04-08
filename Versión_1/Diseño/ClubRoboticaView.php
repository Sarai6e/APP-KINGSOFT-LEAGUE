<?php 
include("./app/config.php");
include("./layout/sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubes de Robótica</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="stylelogin.css">
    <style>
        .nav-links li {
            position: relative;
        }
        .sub-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .nav-links li:hover .sub-menu {
            display: block;
        }

        /* Estilos personalizados */
        .container {
            margin-top: 150px; /* Ajuste del margen superior */
            text-align: center; /* Centrar elementos dentro del contenedor */
        }
        .table {
            background-color: white; /* Color de fondo de la tabla */
        }
        .btn {
            color: white; /* Color del texto de los botones */
        }
        .btn-info {
            background-color: #17a2b8; /* Color de fondo del botón Ver */
        }
        .btn-primary {
            background-color: #007bff; /* Color de fondo del botón Editar */
        }
        .btn-danger {
            background-color: #dc3545; /* Color de fondo del botón Eliminar */
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
        <!-- Título y botón de agregar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mt-4 mb-4">Club Robótica</h1>
            <a href="agregar_club.php" class="btn btn-success">Agregar Club Robótica</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Logo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'ClubRoboticaController.php';

                $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
                $controller = new ClubRoboticaController($db);

                // Ver todos los clubes del usuario logeado
                $clubs = $controller->index($id);

                while ($club = $clubs->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <tr>
                        <td><?php echo $club['id']; ?></td>
                        <td><?php echo $club['nombre']; ?></td>
                        <td><?php echo $club['ciudad']; ?></td>
                        <td><?php echo $club['pais']; ?></td>
                        <td><img src="data:image/jpeg;base64,<?php echo base64_encode($club['logo']); ?>" alt="Logo del club" width="100"></td>
                        <td>
                            <a href="ver.php?id=<?php echo $club['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editar.php?id=<?php echo $club['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?php echo $club['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
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
