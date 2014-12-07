<?php 
$maxRows_DatosListado = 6;
$pageNum_DatosListado = 0;
if (isset($_GET['pageNum_DatosListado'])) {
  $pageNum_DatosListado = $_GET['pageNum_DatosListado'];
}
$startRow_DatosListado = $pageNum_DatosListado * $maxRows_DatosListado;

mysql_select_db($database_conexion, $conexion);
$query_DatosListado = "SELECT * FROM z_posts ORDER BY id DESC";
$query_limit_DatosListado = sprintf("%s LIMIT %d, %d", $query_DatosListado, $startRow_DatosListado, $maxRows_DatosListado);
$DatosListado = mysql_query($query_limit_DatosListado, $conexion) or die(mysql_error());
$row_DatosListado = mysql_fetch_assoc($DatosListado);

if (isset($_GET['totalRows_DatosListado'])) {
  $totalRows_DatosListado = $_GET['totalRows_DatosListado'];
} else {
  $all_DatosListado = mysql_query($query_DatosListado);
  $totalRows_DatosListado = mysql_num_rows($all_DatosListado);
}
$totalPages_DatosListado = ceil($totalRows_DatosListado/$maxRows_DatosListado)-1;


do { ?>
  <div id="section_l">
    <div id="tittle_h">
      <a href="ver-post.php?postnumero=<?php echo $row_DatosListado['id']; ?>"><?php echo $row_DatosListado['titulo']; ?></a>
    </div>
    <div id="post_info"><span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/date.png" width="14" height="14" />23 Dec, 2011</span>
      <span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/category.png" width="14" height="14" /><a href="page/categoria.php">Categoria</a></span>
      <span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/author.png" width="14" height="14" /><a href="user/usuario.php"><?php echo nombre($row_DatosListado['autor']); ?></a></span>
      <span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/permalink.png" width="14" height="14" /><a href="ver_post.php">Enlace</a></span>
      <span class="in_txt">Visitas: <?php echo $row_DatosListado['visitas'] ?></span>
    </div>
  </div>
  <?php } while ($row_DatosListado = mysql_fetch_assoc($DatosListado)); 
  
mysql_free_result($DatosListado);
?>