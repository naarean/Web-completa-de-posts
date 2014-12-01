<?php require_once('../Connections/conexion.php'); ?>
<?php


mysql_select_db($database_conexion, $conexion);
$query_Recordset1 = "SELECT * FROM z_datos";
$Recordset1 = mysql_query($query_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


mysql_free_result($Recordset1);
?>
