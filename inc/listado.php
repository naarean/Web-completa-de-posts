<?php
mysql_select_db($database_conexion, $conexion);
$query_DatosWeb = "SELECT * FROM z_posts ORDER BY id DESC";
$DatosWeb = mysql_query($query_DatosWeb, $conexion) or die(mysql_error());
$row_DatosWeb = mysql_fetch_assoc($DatosWeb);
$totalRows_DatosWeb = mysql_num_rows($DatosWeb);


mysql_free_result($DatosWeb);?>

<div id="section_l">
  <div id="tittle_h">
  	<a href="ver_post.php"><?php echo $row_DatosWeb['titulo']; ?></a>
  </div>
  <div id="post_info"><span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/date.png" width="14" height="14" />23 Dec, 2011</span>
  	<span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/category.png" width="14" height="14" /><a href="page/categoria.php">Categoria</a></span>
  	<span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/author.png" width="14" height="14" /><a href="user/usuario.php"><?php echo $row_DatosWeb['autor']; ?></a></span>
  	<span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/permalink.png" width="14" height="14" /><a href="ver_post.php">Enlace</a></span>
  </div>
</div>
