<?php
session_start();

if (isset($_SESSION['id_participante'])) {
    $id_sesion=$_SESSION['id_participante'];
    $sql_usuarios= "SELECT * from participantes
    where id = '$id_sesion'";
    $query_usuarios=$pdo->prepare($sql_usuarios);
    $query_usuarios->execute();
    $usuarios=$query_usuarios->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($usuarios as $usuario){
      $usuario_logeado=$usuario['nombre'];
      $id=$usuario['id'];
      $grado=$usuario["año_estudio"];
      $id_institucion=$usuario["id_institucion"];
      $id_competencia=$usuario["id_competencia"];
    }

} else {
    header('Location:./login.php');
    exit();
}
?>