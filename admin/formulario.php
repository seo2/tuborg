<?
include('header.php');
include('sidebar.php');

if($_GET['ganID']){ 
	
	$ganID = $_GET['ganID'];
  	$resultado = $db->rawQuery("select * from tuborg_ganadores where ganID = $ganID");
	if($resultado){
		foreach ($resultado as $r) {
			$mk125_Nom  = $r["ganNom"];
			$mk125_Rut  = $r["ganRut"];
			$mk125_Fec  = $r["ganFec"];
		}		
			
	}
}else{
	$mk125_Fec = date('Y-m-d');
}
?>

		<!-- start: Content -->
		<div class="main">


			<div class="row">
			    <div class="col-md-12">
			        <form action="" method="post" class="form-horizontal" id="formGanador">
				        <div class="panel panel-default">
				            <div class="panel-heading">
				                <h2>Banear Foto</h2>
				            </div>
				            <div class="panel-body">
			                    <div class="row">
			                    	<div class="col-sm-12">
					                    <div class="form-group">
					                        <label class="col-md-2 control-label" for="text-input">URL</label>
					                        <div class="col-md-10">
					                            <input type="text" class="form-control" placeholder=""  name="url" required>
					                        </div>
					                    </div>			                    		
			                    	</div>
			                    </div>
										
				            </div>   
	
				            <div class="panel-footer">
				            	<button type="submit" class="btn btn-sm btn-primary" id="btnSubir"  ><i class="fa fa-dot-circle-o"></i> Guardar</button>
				            </div>
				        </div>

			        </form>

			    </div>
			</div>
			<!--/.row-->


				
		</div>
		<!-- end: Content -->
		
		
		<footer>

			<div class="row">

				<div class="col-sm-5">
					&copy; 2017 Tuborg
				</div><!--/.col-->

				<div class="col-sm-7 text-right">
					
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
		<script src="assets/plugins/select2/js/select2.min.js"></script>
	

		<!-- theme scripts -->
		<script src="assets/plugins/pace/pace.min.js"></script>
		<script src="assets/js/jquery.mmenu.min.js"></script>
		<script src="assets/js/core.min.js"></script>
		
		<!-- inline scripts related to this page -->
		<script src="assets/js/pages/form-elements.js"></script>
		<script src="assets/plugins/jquery-cookie/jquery.cookie.min.js"></script>
		<script src="assets/js/demo.min.js"></script>
		
		<!-- Scritps de Seo2 -->
		<script src="assets/js/sweetalert.min.js"></script>
		<script src="assets/js/jquery.validate.js"></script>
		<script src="assets/js/cloudcore.js"></script>
		<!-- end: JavaScript-->

	</body>
</html>