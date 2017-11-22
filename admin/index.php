<?php
		include('header.php');
		include('sidebar.php');
?>
		<!-- start: Content -->
		<div class="main">
			
				
			<div class="row">		
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading" data-original-title>
							<h2><i class="fa fa-user"></i><span class="break"></span>Fotos Baneadas</h2>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-bordered datatable">
							  <thead>
								  <tr>
									  <th>ID</th>
									  <th>URL</th>
									  <th>Acciones</th>
								  </tr>
							  </thead>   
							  <tbody>
								  <?php
								  	$resultado = $db->rawQuery('select * from tuborg_ig');
									if($resultado){
										foreach ($resultado as $r) {
											$id   = $r["id"];
											$url  = $r["url"];
											$ts   = $r["ts"];
											$est = $r["est"];
									?>
								<tr>
									<td><?php echo $id; ?></td>
									<td><a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a></td>

									<td>
										<a class="btn btn-danger btn-borrar" data-id="<?php echo $id; ?>" href="javascript:void(0);" title="Eliminar">
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
			
				
		</div>
		<!-- end: Content -->
		
		
		<footer>

			<div class="row">

				<div class="col-sm-5">
					&copy; 2017 Tuborg
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
