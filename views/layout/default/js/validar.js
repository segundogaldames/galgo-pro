$(document).ready(function(){
	$("#form").validate({
		rules:{
			nombre:{
				required:true, 
				lettersonly: true,
				minlength: 10
			},
			fono:{
				digits: true,
				minlength: 8
			},
			movil:{
				required:true,
				digits: true,
				minlength: 8
			},
			email:{
				required: true,
				email: true
			},
			dias:{
				required: true
			},
			region:{
				required: true
			},
			ciudad:{
				required: true
			},
			'pago[]':{
				required: true
			},
			'cobertura[]':{
				required: true
			},
			'cotizacion[]':{
				required: true
			},
			'despacho[]':{
				required: true
			},
			web:{
				url: true
			},
			clave:{
				required: true,
				minlength: 8
			},
			clave_dos:{
				required: true
			}, 
			password:{
				required: true
			},
			clasificacion:{
				required: true
			}, 
			mueble:{
				required: true
			},
			tipo:{
				required: true
			},
			largo:{
				digits: true
			},
			ancho:{
				digits: true
			},
			alto:{
				digits: true
			},
			diametro:{
				digits: true
			}, 
			estructura:{
				required: true
			},
			estado:{
				required: true
			},
			precio:{
				digits: true
			},
			stock:{
				digits: true
			}
		},
		messages:{
			nombre:{
				required: 'Debe ingresar su nombre',
				lettersonly: 'Solo se permiten letras',
				minlength: 'Debe ingresar al menos 10 caracteres'
			},
			fono:{
				digits: 'Solo puede ingresar numeros',
				minlength: 'Debe ingresar al menos 8 d&iacute;gitos'
			},
			movil:{
				required: 'Debe ingresar un n&uacute;mero telef&oacute;nico',
				digits: 'Solo puede ingresar numeros',
				minlength: 'Debe ingresar al menos 8 d&iacute;gitos'
			},
			email:{
				required: 'Debe ingresar un email',
				email: 'El email no es valido'
			},
			dias:{
				required: 'Debe seleccionar un d&iacute;a de atenci&oacute;n'
			},
			region:{
				required: 'Debe seleccionar una regi&oacute;n'
			},
			ciudad:{
				required: 'Debe seleccionar una ciudad'
			},
			'pago[]':{
				required: 'Debe seleccionar al menos una opci&oacute;n de pago'
			},
			'cobertura[]':{
				required: 'Debe seleccionar al menos una opci&oacute;n de cobertura'
			},
			'cotizacion[]':{
				required: 'Debe seleccionar al menos una opci&oacute;n de cotizaci&oacute;n'
			},
			'despacho[]':{
				required: 'Debe seleccionar al menos una opci&oacute;n de despacho'
			},
			web:{
				url: 'Debe ingresar una direcci&oacute;n v&aacute;lida'
			},
			clave:{
				required: 'Debe ingresar una contraseña',
				minlength: 'Debe ingresar al menos 8 caracteres'
			},
			clave_dos:{
				required: 'Debe ingresar la clave anterior'
			},
			password:{
				required: 'Debe ingresar su clave de acceso'
			},
			clasificacion:{
				required: 'Debe seleccionar una clasificaci&oacute;n'
			}, 
			mueble:{
				required: 'Debe seleccionar un mueble'
			},
			tipo:{
				required: 'Debe seleccionar un tipo'
			},
			largo:{
				digits: 'Solo puede ingresar n&uacute;meros'
			},
			ancho:{
				digits: 'Solo puede ingresar n&uacute;meros'
			},
			alto:{
				digits: 'Solo puede ingresar n&uacute;meros'
			},
			diametro:{
				digits: 'Solo puede ingresar n&uacute;meros'
			}, 
			estructura:{
				required: 'Debe ingresar un tipo de materialidad'
			},
			estado:{
				required: 'Debe ingresar un estado'
			},
			precio:{
				digits: 'Solo puede ingresar n&uacute;meros'
			},
			stock:{
				digits: 'Solo puede ingresar n&uacute;meros'
			}
		}

	});
});