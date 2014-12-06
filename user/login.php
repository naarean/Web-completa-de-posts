<?php require_once('../Connections/conexion.php'); 

if (isset($_SESSION['MM_Id']))
{
  header("Location: " . $urlWeb); //si ya ha iniciado sesión no ha de entrar a login.php asi que le sacamos
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