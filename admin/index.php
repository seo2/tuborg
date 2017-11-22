<?php
		include('header.php');
		include('sidebar.php');

	function total_codigos($mk125_ID){
$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
		$total = 0;
	  	$resultado = $db->rawQuery("select count(*) as total from mckay125_codigos where codUS = $mk125_ID");
		if($resultado){
			foreach ($resultado as $r) {
				$total   = $r["total"];
		
			}
		} 
		return $total;
	}                          
?>
		<!-- start: Content -->
		<div class="main">
			
				
			<div class="row">		
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading" data-original-title>
							<h2><i class="fa fa-user"></i><span class="break"></span>Ganadores</h2>
							<div class="panel-actions">
								<a href="table.html#" class="btn-setting"><i class="icon-settings"></i></a>
								<a href="table.html#" class="btn-minimize"><i class="icon-arrow-up"></i></a>
								<a href="table.html#" class="btn-close"><i class="icon-close"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-bordered datatable">
							  <thead>
								  <tr>
									  <th>ID</th>
									  <th>Nombre</th>
									  <th>RUT</th>
									  <th>Códgigo</th>
									  <th>Fecha</th>
									  <th>Acciones</th>
								  </tr>
							  </thead>   
							  <tbody>
								  <?php
								  	$resultado = $db->rawQuery('select * from mckay125_ganadores');
									if($resultado){
										foreach ($resultado as $r) {
											$mk125_ID   = $r["ganID"];
											$mk125_Nom  = $r["ganNom"];
											$mk125_Rut  = $r["ganRut"];
											$mk125_Fec  = $r["ganFec"];
											$ganCod 	= $r["ganCod"];
											$ganHor 	= $r["ganHor"];
									?>
								<tr>
									<td><?php echo $mk125_ID; ?></td>
									<td><?php echo $mk125_Nom; ?></td>
									<td><?php echo $mk125_Rut; ?></td>
									<td><?php echo $ganCod .' '.$ganHor; ?></td>
									<td><?php echo $mk125_Fec; ?></td>

									<td>
										<a class="btn btn-info" href="formulario-ganador.php?ganID=<?php echo $mk125_ID; ?>" title="Editar">
											<i class="fa fa-edit"></i>  
										</a>
										<a class="btn btn-danger btn-borrar" data-id="<?php echo $mk125_ID; ?>" href="javascript:void(0);" title="Eliminar">
											<i class="fa fa-trash-o"></i> 
										</a>
									</td>
								</tr>   
								<?php  
										}
									}                           
								?>
							  </tbody>
							</table>  
   
						</div>
					</div>
				</div><!--/col-->
			</div><!--/row-->
			

			<div class="row">			    
				<div class="col-lg-6">
			                <form role="form" action="codigos_x_fecha.php" method="post" id="formSorteo"> 
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2><i class="fa fa-edit"></i>Sacar Ganador</h2>
			            </div>
			            <div class="panel-body">
				                <div class="row">
				                    <div class="form-group col-sm-12">
				                        <label for="nf-email">Nombre</label>
				                        <input type="text" id="nombre" name="nombre" class="form-control" disabled>
				                        <input type="hidden" name="desde" value="<?php echo $desde; ?>" class="form-control">
				                        <input type="hidden" name="hasta" value="<?php echo $hasta; ?>"class="form-control">
				                    </div>
				                    <div class="form-group col-sm-12">
				                        <label for="nf-password">RUT</label>
				                        <input type="text" id="rut" name="rut" class="form-control" disabled>
				                    </div>
				                    <div class="form-group col-sm-12">
				                        <label for="nf-password">Código</label>
				                        <input type="text" id="codigo" name="codigo" class="form-control" disabled>
				                    </div>
				                    <div class="form-group col-sm-12">
				                        <label for="nf-password">Hora</label>
				                        <input type="text" id="hora" name="hora" class="form-control" disabled>
				                    </div>
				                </div>


			            </div>

			            <div class="panel-footer">
			                        <button type="submit" class="btn btn-sm btn-success" id="btnSorteo">Aleatorio</button>
			            </div>
			        </div>
			                </form>
			    </div><!--/col-->

			    <div class="col-md-6">
			        <form action="" method="post" enctype="multipart/form-data" id="formGanador" readonly>
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2><i class="fa fa-edit"></i> Agregar Ganador</h2>
			            </div>
			            <div class="panel-body">
		                    <div class="row">
				                <div class="form-group col-sm-12">
			                        <label class="control-label" for="text-input">Nombre</label>
		                            <input type="text" class="form-control" placeholder=""  name="ganNom" required value="<?php echo $mk125_Nom; ?>"	>
		                            <? if($_GET['ganID']){ ?>
		                            <input type="hidden" name="ganID" value="<?php echo $_GET['ganID']; ?>">
									<? } ?>
			                    </div>		
				                <div class="form-group col-sm-12">
			                        <label class="control-label" for="text-input">RUT</label>
		                            <input type="text" class="form-control"  value="<?php echo $mk125_Rut; ?>" name="ganRut">
			                    </div>
				                <div class="form-group col-sm-12">
			                        <label class="control-label" for="text-input">Código</label>
		                            <input type="text" class="form-control" placeholder=""  name="ganCod" required >
			                    </div>	
				                <div class="form-group col-sm-12">
			                        <label class="control-label" for="text-input">Hora</label>
		                            <input type="text" class="form-control" placeholder=""  name="ganHor" required >
			                    </div>	
				                <div class="form-group col-sm-12">
			                        <label class="control-label" for="text-input">Fecha</label>
		                            <input type="date" class="form-control" placeholder=""  name="ganFec" required >
			                    </div>	
		                    </div>
									
			            </div>    		
			            

			            <div class="panel-footer">
			            	<button type="submit" class="btn btn-sm btn-primary" id="btnSubir"  ><i class="fa fa-dot-circle-o"></i> Guardar</button>
			            </div>
			        </div>

			        </form>

			    </div>
			</div><!--/row-->
				
		</div>
		<!-- end: Content -->
		
		
		<footer>

			<div class="row">

				<div class="col-sm-5">
					&copy; 2017 Modo
				</div><!--/.col-->

				
			</div><!--/.row-->	

		</footer>
		
		<!-- start: JavaScript-->
		<!--[if !IE]>-->

				<script src="assets/js/jquery-2.1.1.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>

			<script src="assets/js/jquery-1.11.1.min.js"></script>

		<![endif]-->

		<!--[if !IE]>-->

			<script type="text/javascript">
				window.jQuery || document.write("<script src='assets/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
			</script>

		<!--<![endif]-->

		<!--[if IE]>

			<script type="text/javascript">
		 	window.jQuery || document.write("<script src='assets/js/jquery-1.11.1.min.js'>"+"<"+"/script>");
			</script>

		<![endif]-->
		<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<script src="assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js"></script>
		<script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script> 
		<script src="assets/plugins/datatables/js/dataTables.bootstrap.min.js"></script>
	

		<!-- theme scripts -->
		<script src="assets/plugins/pace/pace.min.js"></script>
		<script src="assets/js/jquery.mmenu.min.js"></script>
		<script src="assets/js/core.min.js"></script>
		
	<!-- inline scripts related to this page -->
	<script src="assets/js/pages/table.js"></script>
		<script src="assets/plugins/jquery-cookie/jquery.cookie.min.js"></script>
		<script src="assets/js/demo.min.js"></script>

		<!-- Scritps de Seo2 -->
		<script src="assets/js/sweetalert.min.js"></script>
		<script src="assets/js/jquery.validate.js"></script>
		<script src="assets/js/jquery.Rut.min.js"></script>
		<script src="assets/js/cloudcore.js"></script>
		<!-- end: JavaScript-->

	</body>
</html>
