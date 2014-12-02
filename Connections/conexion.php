<?php

if (!isset($_SESSION)) {
  session_start();
}

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexion = "localhost";
$database_conexion = "curso2013";
$username_conexion = "root";
$password_conexion = "";
$conexion = mysql_pconnect($hostname_conexion, $username_conexion, $password_conexion) or trigger_error(mysql_error(),E_USER_ERROR); 


//AÑADIMOS FUNCIONES.PHP independientemente de la ruta del archivo del proyecto
if(is_file("inc/funciones.php"))
{
	include ("inc/funciones.php");
}
else
{
	include ("../inc/funciones.php");
}
?>