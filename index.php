<?php
require_once("admin/_lib/config.php");
require_once("admin/_lib/MysqliDb.php");
$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Barrio Arte - Tuborg</title>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    
	<link rel="stylesheet" href="https://use.typekit.net/lkd1qvb.css">
	<link href="assets/instashow/jquery.instashow.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.css" >
    <link rel="stylesheet" href="assets/css/tuborg.css?v=1.5" >
    
    <link rel="icon" type="image/png" href="assets/img/favicon.png?v=2" />
    
  </head>
  <body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col s12" id="cabecera">
					<img src="assets/img/logo-barrio_arte.png" id="logo_ba" class="animated slideInDown">
				</div>
			</div>
		</div>
	</header>
	<div class="container-fluid">
		<div class="row">
			<div class="col s12">
				<div class="carousel carousel-slider center" data-indicators="true">
					<a class="carousel-item" href="http://www.gam.cl" target="_blank"><img src="assets/img/slide-1.jpg"></a>
					<a class="carousel-item" href="http://www.mnba.cl/" target="_blank"><img src="assets/img/slide-2.jpg"></a>
					<a class="carousel-item" href="https://www.mavi.cl/" target="_blank"><img src="assets/img/slide-3.jpg?v=2"></a>
					<a class="carousel-item" href="http://www.mac.uchile.cl/" target="_blank"><img src="assets/img/slide-4.jpg"></a>
					<a class="carousel-item" href="https://www.instagram.com/cervezatuborgchile/" target="_blank"><img src="assets/img/slide-5.jpg?v=2"></a>
				</div>				
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row info">
			<div class="col s12 m3" id="somos">
				<h2>Somos</h2>
			</div>
			<div class="col s12 m9">
<!--
				<p>¡Bienvenidos a BARRIO ARTE!<br>
					Somos una alianza cultural impulsada por los más importantes Museos de Chile para la promoción de la cultura y las artes en su territorio común. BARRIO ARTE propone un encuentro con la comunidad porque creemos que el desarrollo cultural se logra con el trabajo colaborativo,
					la generación de pertenencia y la valoración de nuestro patrimonio urbano y arquitectónico.<br>
					¡No te quedes fuera, súmate y #explorabarrioarte!
				</p>
-->
				<p>Una alianza cultural impulsada por espacios vinculados a las artes en el perímetro Lastarria - Parque Forestal, con el objetivo de promocionar la cultura en su territorio común. Barrio Arte propone un encuentro con la comunidad porque creemos que el desarrollo integral se logra con la generación del sentido de pertenencia y la valoración de nuestro patrimonio urbano y arquitectónico, a través del trabajo colaborativo.</p>
			</div>
		</div>
		<div class="row info" id="socios">
			<div class="col s12 m3 valign-wrapper">
				<h2>Invitan</h2>
			</div>
			<div class="col s12 m9 valign-wrapper">
				<p><a href="http://www.gam.cl" target="_blank">gam</a> - <a href="https://www.mavi.cl/" target="_blank">mavi</a> - <a href="http://www.mac.uchile.cl/" target="_blank">mac</a> - <a href="http://www.mnba.cl/" target="_blank">mnba</a></p>
			</div>
		</div>
		<div class="row info" id="participan">
			<div class="col s12 m3 valign-wrapper">
				<h2>Participan</h2>
			</div>
			<div class="col s12 m9 valign-wrapper">
				<p>
					<a href="http://www.elbiografo.cl/wordpress/" target="_blank">El Biógrafo</a> - 
					<a href="http://www.plopgaleria.com/" target="_blank">Plop Galería</a> - 
					<a href="http://ekho.cl/" target="_blank">Eckho Gallery</a> - 
					<a href="http://metalespesados.cl/#/" target="_blank">Metales Pesados</a> - 
					<a href="https://www.facebook.com/pages/Libros-Prologo/1429093774039694" target="_blank">Libros Prólogo</a> - 
					<a href="http://www.galerialira.com/" target="_blank">Galería Lira</a> - 
					<a href="https://www.facebook.com/latiendanacional.cl/" target="_blank">Tienda Nacional</a> - 
					<a href="http://www.uliseslastarria.cl/" target="_blank">Librería Ulises</a> - 
					<a href="http://www.libroselcid.cl/" target="_blank">El Cid Campeador</a> - 
					<a href="http://www.teatroictus.cl/" target="_blank">Teatro Ictus</a> - 
					<a href="http://www.santiagocultura.cl/posada-del-corregidor-2/" target="_blank">Posada del Corregidor</a>  - 
					<a href="https://www.casaodelastarria.com/" target="_blank">Espacio O</a>
				</p>
			</div>
		</div>
		<div class="row" id="hashtag">
			<h3><span>#ExploraBarrioArte</span></h3>
		</div>
	</div>
	<div class="container-fluid">
        <div class="row nomarbot">
			<div class="col s12">
			<?php
				$ok = 0;
				$resultado = $db->rawQuery('select * from tuborg_ig');
				if($resultado){
					foreach ($resultado as $r) {
						$url  .= $r["url"]. ' ';
						$ok = 1; 
					}
				}                           
			?>	
				<div data-is
				    data-is-api="assets/instashow/api/"
					data-is-source="#explorabarrioarte" 
				    data-is-width="auto"
				    data-is-height="auto"
				    data-is-columns="3"
					data-is-drag-control="true"
					data-is-effect="slide"
				    data-is-rows="2"
				    data-is-gutter="0" 
				    data-is-direction="horizontal"
				    data-is-speed="1100" 
				    data-is-easing="ease-in-out" 
				    data-is-auto="2000" 
				    data-is-popup-easing="ease-in-out" 
				    data-is-lang="es"
				    data-is-info="likesCounter, description"
					data-is-color-gallery-overlay="rgba(0,87,167,0.9)"
					data-is-color-popup-controls ="rgb(0,87,167)"
					data-is-color-popup-controls-hover ="rgb(0,87,167)"
					data-is-popup-deep-linking="true"
					data-is-color-popup-overlay="rgba(255,255,255,.9)"
					data-is-popup-info="username, instagramLink"
					data-is-responsive='{ "600": { "columns": 2, "rows": 3, "gutter": 0 }}'
					data-is-scrollbar="false"
					data-is-easing="ease-in-out"
					data-is-arrows-control="false"
					<?php if($ok==1){ ?>data-is-filter-except="<?php echo $url; ?>"<?php } ?>
					
				>				
			</div>
        </div>
        <!-- / row -->
    </div>
	  <!-- Content here -->
	</div>

    <footer>
        <div class="row nomarbot">
			<div class="col s12 hide-on-small-only">
        		<img src="assets/img/footer-15.png" class="responsive-img">
			</div>
			<div class="col s12 hide-on-med-and-up	">
        		<img src="assets/img/footer-15_m.png" class="responsive-img">
			</div>
        </div>
    </footer>	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.runtime.min.js"></script>
	<script src="assets/instashow/jquery.instashow.js"></script>

    <script src="assets/js/tuborg.js"></script>
  </body>
</html>