<?php require_once('../Connections/conexion.php'); 

if (isset($_SESSION['MM_Id']))
{
  header("Location: " . $urlWeb); //si ya ha iniciado sesión no ha de entrar a login.php asi que le sacamos
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['nombre'])) {
  $loginUsername=$_POST['nombre'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "../index.php";
  $MM_redirectLoginFailed = "error-login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexion, $conexion);
  
  $LoginRS__query=sprintf("SELECT nombre, password, id, rango FROM z_users WHERE nombre=%s AND password=%s AND rango>0", //rango 0 estan baneados, el resto pueden entrar
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexion) or die(mysql_error());
  $row_ObtenerIdUser = mysql_fetch_assoc($LoginRS);
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}

    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
    $_SESSION['MM_Id'] = $row_ObtenerIdUser['id']; //guardamos en variable de sesion la id del usuario

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pagina web php, ajax y jquery</title>
<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<!-- <link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css'> -->
</head>

<body>
<div id="principal">
  <div id="head">
    <div id="logo">
      <a href="<?php echo $urlWeb ?>"><h1>cursoweb</h1></a>
      Tutorial pagina web con php,ajax y jquery
    </div>
    <div id="add468"><img src="../img/add468.png" width="468" height="60" /></div>
  </div>
    <?php include("../inc/menu.php"); ?>
  <div id="leftt">
	  <div id="section_l">
    <form action="<?php echo $loginFormAction; ?>" method="POST" name="formLogin">
    	    <table border="0" width="281" align="center">
	      <tr>
	        <td>Usuario:</td>
	        <td><label for="nombre"></label>
            <input name="nombre" type="text" id="nombre" size="30" /></td>
          </tr>
	      <tr>
	        <td>Contrase&ntilde;a:</td>
	        <td><label for="password"></label>
            <input name="password" type="text" id="password" size="30" /></td>
          </tr>
	      <tr>
	        <td>&nbsp;</td>
	        <td align="right"><input type="submit" name="button2" id="button2" value="Iniciar Sesi&oacute;n" /></td>
          </tr>
        </table>
    </form>
    </div>
  </div>
  <div id="rigthh">
    <?php include("../inc/buscador.php"); ?>

    <?php include("../inc/estadisticas.php"); ?>
        
    <?php include("../inc/ultimos-comentarios.php"); ?>

    <?php include("../inc/tags.php"); ?>
  </div>
</div>
<div id="footer">
  <div id="txt_fo">
    <a href="#">Pagina1</a> <a href="#">Pagina2</a> <a href="#">Pagina3</a> <a href="#">Pagina4</a>
  </div>
</div>
</body>
</html>