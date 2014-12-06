<?php require_once('Connections/conexion.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pagina web php, ajax y jquery</title>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
<script src="jquery.min.js"></script>
<script src="js.js"></script>
<!-- <link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css'> -->
</head>

<body>
<div id="principal">
  <div id="head">
    <div id="logo">
      <a href="<?php echo $urlWeb?>"><h1>cursoweb</h1></a>
      Tutorial pagina web con php,ajax y jquery
    </div>
    <div id="add468"><img src="img/add468.png" width="468" height="60" /></div>
  </div>
    <?php include("inc/menu.php"); ?>
  <div id="leftt">
	 <?php include("inc/listado.php"); ?>
  </div>
  <div id="rigthh">
    <?php include("inc/buscador.php"); ?>

    <?php include("inc/estadisticas.php"); ?>
        
    <?php include("inc/ultimos-comentarios.php"); ?>

    <?php include("inc/tags.php"); ?>
  </div>
</div>

<div id="footer">
  <div id="txt_fo">
    <a href="#">Pagina1</a> <a href="#">Pagina2</a> <a href="#">Pagina3</a> <a href="#">Pagina4</a>
  </div>
  <div class="irArriba"><a href="" id="irArriba">Subir Arriba</a></div>
</div>

<div id="flotanteLogin" style="display:none">
  <div id="section_l">
    <form action="<?php echo $urlWeb ?>inc/iniciar-sesion.php" method="POST" name="formLogin">
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
    <a onClick="cerrar_capa_login();" style="cursor:pointer">Cerrar</a>
  </div>
</div>

</body>
</html>