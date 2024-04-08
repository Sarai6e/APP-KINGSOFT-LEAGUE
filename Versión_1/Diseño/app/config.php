<?php
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','datosks');
$servidor = 'mysql:dbname='.BD.';host='.SERVIDOR; 
try {
    $pdo =new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));   
} catch ( PDOException $th) {
  //  print $th; 
    echo 'Error en conexion a la base de datos';
}
$URL="http://localhost/"; 
//$API_CONSUMO='http://localhost/apiseguimientoconsumo/public/api';
date_default_timezone_set("America/Lima");
$fechaHora=date("Y-m-d H:i:s");