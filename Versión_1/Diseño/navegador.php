<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="stylelogin.css">
    <title>Kingsoft</title>
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
    </style>
<div class="background-slider">
        <img src="img/1.png" alt="Background Image">
        <img src="img/2.png" alt="Background Image">
        <img src="img/3.png" alt="Background Image">
        <img src="img/4.png" alt="Background Image">
    </div>

<nav class="navbar">
        <div class="navbar-container">
            <h1><a href="#"><img id="logo" src="k.jpeg" alt="Logo"></a></h1>
            <ul class="nav-links">
                <li><a href="menu.html">Inicio</a></li> 
                <li><a href="#inicio">CONTROL <i class="fas fa-caret-down"></i></a>
                    <ul class="sub-menu">
                        <li><a href="ClubRoboticaView.php">Club Robotica</a></li>
                        <li><a href="CompetenciaView.php">Competencia</a></li>
                        <li><a href="GradoEstudioView.php">Grado Estudio</a></li>
                        <li><a href="NombreInstitucionView.php">Nombre Institucion</a></li>
                        <li><a href="ParticipanteView.php">Participante</a></li>
                        <li><a href="ParticipanteGeneroView.php">Genero</a></li>
                        <li><a href="RobotView.php">Robot</a></li>
                        <li><a href="RobotCompetenciaView.php">Robot Competencia</a></li>
                        <li><a href="TipoCompetenciaView.php">Tipo competencia</a></li>
                    </ul>
                </li>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="#sobre-mi">ROBOT</a></li>
                <li><a href="#servicios"></a></li>
                <li><a href="#curriculum"></a></li>
                <li><a href="#contacto"></a></li>
            </ul>
        </div>
        <div id="bienvenida">
    <!-- Aquí aparecerá el mensaje de bienvenida -->
</div>
    </nav>


</html>

    