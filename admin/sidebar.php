<?php
if($_SESSION['ccid']){
	$db->where ('usuID', $_SESSION['ccid']);
	$usuario = $db->getOne ("sn_usuarios");
	
	$_usuID			= $usuario['usuID'];
    $_usuNom		= $usuario['usuNom'];
    $_usuMail		= $usuario['usuMail'];
    $_usuTipo		= $usuario['usuTipo'];
    $_usuEmp		= $usuario['usuEmp'];

 } elseif($_COOKIE['id']) { 
	 
	$db->where ('usuID', $_COOKIE['id']);
	$usuario = $db->getOne ("sn_usuarios");
	
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

						<li><a href="index.php"><i class="icon-speedometer"></i><span class="text"> Bruno Mars</span></a></li>
						<li><a href="125.php"><i class="icon-speedometer"></i><span class="text"> Landing 125</span></a></li>
						<li><a href="formulario-sueno-millonario.php"><i class="icon-cloud-upload"></i><span class="text"> Sueño Millonario</span></a></li>
						<li><a href="participantes.php"><i class="icon-speedometer"></i><span class="text"> Participantes</span></a></li>
						<li><a href="exportar_participantes.php"><i class="icon-speedometer"></i><span class="text"> Excel Participantes</span></a></li>
						<li><a href="exportar_codigos.php"><i class="icon-speedometer"></i><span class="text"> Excel Códigos</span></a></li>
						<li><a href="instawins.php"><i class="icon-speedometer"></i><span class="text"> Instawins</span></a></li>
						<li><a href="exportar_instawins.php"><i class="icon-speedometer"></i><span class="text"> Excel Instawins</span></a></li>
						<li><a href="ganadores.php"><i class="icon-speedometer"></i><span class="text"> Ganadores</span></a></li>
						<li><a href="formulario-ganador.php"><i class="icon-speedometer"></i><span class="text"> Agregar Ganador</span></a></li>
						<li><a href="formulario-subir.php"><i class="icon-speedometer"></i><span class="text"> Subir Códigos</span></a></li>

						<li><a href="javascript:void(0);" id="logoutBtn"><i class="icon-logout"></i><span class="text"> Salir</span></a></li>


					</ul>
				</div>					
			</div>
			<div class="sidebar-footer">


			</div>	
		</div>
		<!-- end: Main Menu -->