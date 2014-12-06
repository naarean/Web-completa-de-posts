<?php require_once('Connections/conexion.php'); 

$iddelpost = $_GET['postnumero']; // lo recoge de listado.php

mysql_select_db($database_conexion, $conexion);
$query_DatosPost = sprintf("SELECT * FROM z_posts WHERE id=%s", $iddelpost, "int");
$DatosPost = mysql_query($query_DatosPost, $conexion) or die(mysql_error());
$row_DatosPost = mysql_fetch_assoc($DatosPost);
$totalRows_DatosPost = mysql_num_rows($DatosPost);

?>

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
	 <div id="section_l">
    <div id="tittle_h" style="border-bottom: 1px dashed #CCC"><?php echo $row_DatosPost['titulo'] ?></div>
    <div id="container"><?php echo $row_DatosPost['contenido'] ?></div> <!-- por SEO al contenido le llamamos container -->
    <div id="post_info"><span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/date.png" width="14" height="14" />23 Dec, 2011</span>
      <span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/category.png" width="14" height="14" /><a href="page/categoria.php">Categoria</a></span>
      <span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/author.png" width="14" height="14" /><a href="user/usuario.php"><?php echo nombre($row_DatosPost['autor']) ?></a></span>
      <span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/permalink.png" width="14" height="14" /><a href="ver_post.php">Enlace</a></span>
    </div>
</div>
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

<?php mysql_free_result($DatosPost); ?>