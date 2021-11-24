$(document).ready(function(){
	var getMuebles = function(){
		$.post('/mercadomuebles/muebles/getMuebles','clasificacion=' + $("#clasif").val(), function(datos){
			$("#mueble").html('');
			for(var i = 0;i < datos.length;i++){
				$("#mueble").append('<option value="' + datos[i].id + '">' + datos[i].nombre + '</option>');
			}
		}, 'json');
	}

	$("#clasif").change(function(){
		if(!$("#clasif").val()){
			$("#mueble").html('');
		}else{
			getMuebles();
		}
	});

	var getTipos = function(){
		$.post('/mercadomuebles/muebles/getTipos','mueble=' + $("#mueble").val(), function(datos){
			$("#tipo").html('');
			for(var i = 0;i < datos.length;i++){
				$("#tipo").append('<option value="' + datos[i].id + '">' + datos[i].nombre + '</option>');
			}
		}, 'json');
	}

	$("#mueble").change(function(){
		if(!$("#mueble").val()){
			$("#tipo").html('');
		}else{
			getTipos();
		}
	});

	var getDestinos = function(){
		$.post('/mercadomuebles/muebles/getDestinos','tipo=' + $("#tipo").val(), function(datos){
			$("#destino").html('');
			for(var i = 0;i < datos.length;i++){
				$("#destino").append('<option value="' + datos[i].id + '">' + datos[i].nombre + '</option>');
			}
		}, 'json');
	}

	$("#tipo").change(function(){
		if(!$("#tipo").val()){
			$("#destino").html('');
		}else{
			getDestinos();
		}
	});
});