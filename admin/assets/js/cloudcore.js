$("#loginForm").validate({

	submitHandler: function(form) {
		$("#loginBtn").html('<i class="fa fa fa-spinner fa-spin"></i> Ingresando');

		$.ajax({
            type: "POST",
            url: "ajax/login.php",
            data: $("#loginForm").serialize(),
            success: function(msg) {
            	console.log(msg);
            	if(msg==1){
	            	window.location.replace('index.php');
            	}else{
                	sweetAlert("Oops...", "Los datos de usuario son erroneos.", "error");
					$("#loginBtn").html('Ingresar');
            	}
            },
            error: function(xhr, status, error) {
				//alert(status);
			}
		
		
		});

	    //form.submit();
	}
}); // fin validate

$('a#logoutBtn').on('click', function() {
	swal({
	  title: "Realmente desea cerrar la sesión?",
	  text: "",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-blue",
	  confirmButtonText: "Si",
	  cancelButtonText: "No",
	  closeOnConfirm: true,
	  closeOnCancel: true
	},
	function(isConfirm) {
		if (isConfirm) {
	    	var url = "logout.php";
	    	$.ajax({
	           type: "POST",
	           url: url,
	            success: function(data) {
					console.log(data);
					if(data == "logout") {
						window.location.replace('login.php');
					}else{
						swal('Ha ocurrido un error, por favor vuelva a intentarlo.');
					}
	            }
	         });
		} else {
		    txt = "You pressed Cancel!";
		}
	});
});




// manejo de sesión
var refreshSn = function ()
	{	console.log('entra refresh!');
	    var time = 60000; // 1 mins
	    setTimeout(
	        function ()
	        {
		        console.log('refresh');
	        $.ajax({
	           url: "ajax/refresh_session.php",
	           cache: false,
	           success: function(msg) {
		          console.log(msg);
	           },
	           complete: function () {refreshSn();}
	        });
	    },
	    time
	);
};
refreshSn();


$("#formGanador").validate({
	  submitHandler: function(form) {
		$("#btnSubir").html('<i class="fa fa fa-spinner fa-spin"></i>');

		var data = $('#formGanador').serialize();

		$.ajax({
            type: "POST",
            url: "ajax/graba.php",
            data: data,
            success: function(msg) {
				console.log(msg);
            	if(msg=='ok'){
            						
	            	swal({   title: "¡Listo!",   text: "Se ha quitado la foto del sitio",   type: "success",     confirmButtonColor: "#DD6B55",   confirmButtonText: "OK",   cancelButtonText: "Banear Otra",  showCancelButton: false,   closeOnConfirm: false,   closeOnCancel: false , allowOutsideClick: true}, 
	            	function(isConfirm){   
	            	if (isConfirm) {  
	            		window.location.replace("index.php");   
	            	} else {     
	            		window.location.replace("formulario.php");      
	            	} });
            	}else{
					swal('Ha ocurrido un error, por favor vuelva a intentarlo.');
            	}
            	$("#btnSubir").html('<i class="fa fa-dot-circle-o"></i> Guardar');
            	
            },
            error: function(xhr, status, error) {
				//alert(status);
			}
		
		
		});
	}
}); // fin validate
 
$('a.btn-borrar').on('click', function() {
	var ganID = $(this).data('id');
	swal({
	  title: "¿Realmente desea borrar este registro?",
	  text: "",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-blue",
	  confirmButtonText: "Si",
	  cancelButtonText: "No",
	  closeOnConfirm: true,
	  closeOnCancel: true
	},
	function(isConfirm) {
		if (isConfirm) {
	    	var url = "ajax/borra.php";
	    	$.ajax({
	           type: "POST",
	           url: url,
			   data: { "id": ganID },
	            success: function(data) {
					console.log(data);
					if(data == "ok") {
						swal('Se ha eliminado el registro');
						location.reload();
					}else{
						swal('Ha ocurrido un error, por favor vuelva a intentarlo.');
					}
	            }
	         });
		} else {
		    txt = "You pressed Cancel!";
		}
	});
});
