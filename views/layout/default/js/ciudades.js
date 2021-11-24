$(document).ready(function(){
	var getCiudades = function(){
		$.post('/mercadomuebles/personas/getCiudades','region=' + $("#region").val(), function(datos){
			$("#ciudad").html('');
			for(var i = 0;i < datos.length;i++){
				$("#ciudad").append('<option value="' + datos[i].id_ciud + '">' + datos[i].nom_ciud + '</option>');
			}
		}, 'json');
	}

	$("#region").change(function(){
		if(!$("#region").val()){
			$("#ciudad").html('');
		}else{
			getCiudades();
		}
	});
});