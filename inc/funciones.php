<?php

//FORMATEO DE CARACTERES???
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

//CONSULTA A BBDD para crear variables globales que usaremos en todo el proyecto
mysql_select_db($database_conexion, $conexion);
$query_DatosWeb = "SELECT * FROM z_datos";
$DatosWeb = mysql_query($query_DatosWeb, $conexion) or die(mysql_error());
$row_DatosWeb = mysql_fetch_assoc($DatosWeb);
$totalRows_DatosWeb = mysql_num_rows($DatosWeb);

$urlWeb = $row_DatosWeb['url'];
$nombreWeb = $row_DatosWeb['nombre'];


mysql_free_result($DatosWeb);


//TRANSFORMA ID USUARIO EN EL NOMBRE DE USUARIO
function nombre($iduser)
{
  global $database_conexion, $conexion;

  mysql_select_db($database_conexion, $conexion);
  $query_ObtenerNombre = sprintf("SELECT nombre FROM z_users WHERE id = %s", $iduser, "int");
  $ObtenerNombre = mysql_query($query_ObtenerNombre, $conexion) or die(mysql_error());
  $row_ObtenerNombre = mysql_fetch_assoc($ObtenerNombre);
  $totalRows_ObtenerNombre = mysql_num_rows($ObtenerNombre);

  return $row_ObtenerNombre['nombre'];

  mysql_free_result($ObtenerNombre);
}


//CERRAR SESION
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['MM_Id'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['MM_Id']);
  unset($_SESSION['PrevUrl']);
  
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}


?>