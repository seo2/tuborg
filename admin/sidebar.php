<?php
if($_SESSION['ccid']){
	$db->where ('usuID', $_SESSION['ccid']);
	$usuario = $db->getOne ("tuborg_usuarios");
	
	$_usuID			= $usuario['usuID'];
    $_usuNom		= $usuario['usuNom'];
    $_usuMail		= $usuario['usuMail'];
    $_usuTipo		= $usuario['usuTipo'];
    $_usuEmp		= $usuario['usuEmp'];

 } elseif($_COOKIE['id']) { 
	 
	$db->where ('usuID', $_COOKIE['id']);
	$usuario = $db->getOne ("tuborg_usuarios");
	
	$_usuID			= $usuario['usuID'];
    $_usuNom		= $usuario['usuNom'];
    $_usuMail		= $usuario['usuMail'];
    $_usuTipo		= $usuario['usuTipo'];
    $_usuEmp		= $usuario['usuEmp'];

 }else{ ?>
 <script>
 		window.location.replace("login.php");
 </script>
 <?php exit; 
	 }  
 ?>


		<!-- start: Main Menu -->
		<div class="sidebar">

			<div class="sidebar-collapse">

				<div class="sidebar-header">
					<h2><?php echo  $_usuNom; ?> <small><?php echo  $tipousuario; ?></small></h2>
					<h3><?php echo  $_usuMail; ?></h3>
				</div>

				<div class="sidebar-menu">	
					<ul class="nav nav-sidebar">

						<li><a href="index.php"><i class="icon-speedometer"></i><span class="text"> Fotos Baneadas</span></a></li>
						<li><a href="formulario.php"><i class="icon-speedometer"></i><span class="text"> Banear Foto</span></a></li>

						<li><a href="javascript:void(0);" id="logoutBtn"><i class="icon-logout"></i><span class="text"> Salir</span></a></li>


					</ul>
				</div>					
			</div>
			<div class="sidebar-footer">


			</div>	
		</div>
		<!-- end: Main Menu -->