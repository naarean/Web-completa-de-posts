<div id="menu">
    <div id="item_me">Inicio</div>
    <div id="item_me">Staff</div>
    <div id="item_me">Tops <img class="arrow" src="<?php echo $urlWeb ?>img/arrows-down.png" width="9" height="5" /></div>
    <div id="item_me">Crear post</div>

	<?php if (isset($_SESSION['MM_Id']))  //si la sesión está iniciada, menu privado
		{ ?>  
		    <div id="item_op"><a href="<?php echo $logoutAction ?>"><img src="<?php echo $urlWeb ?>img/out.png" width="16" height="16" /></a></div>
		    <div id="item_op" style="margin-top:1px"><?php echo nombre($_SESSION['MM_Id']);?></div>  <!-- invocamos la funcion user con la variable de sesion que tiene el id de usuario -->
		    <div id="item_op"><img src="<?php echo $urlWeb ?>img/fav.png" width="16" height="16" /></div>
		    <div id="item_op"><div id="notifica_msn">3</div><img  src="<?php echo $urlWeb ?>img/msn.png" width="16" height="16" /></div>
		    <div id="item_op"><div id="notifica_msn">1</div><img src="<?php echo $urlWeb ?>img/notifica.png" width="16" height="16" /></div>
		<?php 
		}
		else  //si la sesión no está iniciada, menu público
		{ ?>
			<div id="item_op"><a href="#" onClick="mostrar_capa_login();">Iniciar sesi&oacute;n</a></div> <!-- con la almuadilla impide la recarga de la página -->
			<div id="item_op"><a href="<?php echo $urlWeb ?>user/resgistro.php">Registro</a></div>
		<?php 
		} ?>
</div>