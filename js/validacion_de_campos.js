$(document).ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			firstname: {
				required: true,
				minlength: 3,
				maxlength : 32
			},
			lastname: {
				required: true,
				minlength: 2,
				maxlength : 32
			},
			username: {
				required: true,
				minlength: 8,
				maxlength : 20
			},
			telf: {
				required: true,
				minlength: 7
			},
			password: {
				required: true,
				minlength: 8,
				maxlength: 20
			},
			confirm_password: {
				required: true,
				minlength: 8,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required",
			descripcion: {
				required: true,
				minlength: 10,
				maxlength: 300
			},
			titulo: {
				required: true,
				minlength: 10,
				maxlength: 32
			},
            //DESCRIPCION A, DESCRIPCION B, DESCRIPCION G  Y DESCRIPCION LO EXTENDI A 300 CARACTERES COMO LIMITE
			descripcionA: {
				required: true,
				minlength: 32,
				maxlength: 300
			},
			descripcionB: {
				required: true,
				minlength: 32,
				maxlength: 300
			},
			tituloD: {
				required: true,
				minlength: 10,
				maxlength: 32
			},
			lname: {
				required: true,
				minlength: 10,
				maxlength: 64
			},
			descripcionG: {
				required: true,
				minlength: 10,
				maxlength: 300
			},
			sname: {
				required: true,
				minlength: 5,
				maxlength: 20
			},
			codSIS: {
				required: true,
				minlength: 9
			},
            pagos: {
                required: true,
				maxlength: 3
            },
            mensaje:{
            	required:true,
            	minlength:5,
            	maxlength:160
            },
            observacion:{
            	required:true,
            	minlength:5,
            	maxlength:60
            }
		},

		messages: {
			firstname:{
				required: "Ingrese su nombre",
				minlength: "El nombre debe consistir de 3 caracteres m&iacute;nimo",
				maxlength: "El nombre debe consistir de 32 caracteres m&aacute;ximo"
			},
			lastname: {
				required: "Ingrese su apellido",
				minlength: "El apellido debe consistir de 3 caracteres m&iacute;nimo",
				maxlength: "El apellido debe consistir de 32 caracteres m&aacute;ximo"
			},
			username: {
				required: "Ingrese nombre de usuario",
				minlength: "El nombre de usuario debe consistir de 8 caracteres minimo",
				maxlength: "El nombre de usuario debe consistir de 20 caracteres maximo"
			},
			telf: {
				required: "Ingrese tel&eacute;fono",
				minlength: "El telefono debe consistir de 7 n&uacute;meros"
			},
			password: {
				required: "Ingrese contrase&ntilde;a",
				minlength: "La contrase&ntilde;a debe consistir de 8 caracteres minimo",
				maxlength: "La contrase&ntilde;a debe consistir de 20 caracteres maximo"
			},
			confirm_password: {
				required: "Ingrese contrase&ntilde;a",
				minlength: "La contrase&ntilde;a debe consistir de 5 caracteres minimo",
				maxlength: "La contrase&ntilde;a debe consistir de 20 caracteres maximo",
				equalTo: "Las contrase&ntilde;as no coinciden"
			},
			email: "Ingrese un correo valido",
			agree: "Debe aceptar nuestros terminos",
			descripcion: {
				required: "Ingrese una descripci&oacute;n",
				minlength: "La descripci&oacute;n debe consistir de 10 caracteres m&iacute;nimo",
				maxlength: "La descripci&oacute;n debe consistir de 300 caracteres m&aacute;ximo"
			},
			descripcionG: {
				required: "Ingrese una descripci&oacute;n",
				minlength: "La descripci&oacute;n debe consistir de 10 caracteres m&iacute;nimo",
				maxlength: "La descripci&oacute;n debe consistir de 300 caracteres m&aacute;ximo"
			},
			titulo: {
				required: "Ingrese un t&iacute;tulo",
				minlength: "El titulo debe consistir de 10 caracteres m&iacute;nimo",
				maxlength: "El titulo debe consistir de 32 caracteres maximo"
			},
			descripcionA: {
				required: "Ingrese descripci&oacute;n",
				minlength: "La descripci&oacute;n debe consistir de 32 caracteres minimo",
				maxlength: "La descripci&oacute;n debe consistir de 300 caracteres maximo"
			},
			descripcionB: {
				required: "Ingrese descripci&oacute;n",
				minlength: "La descripci&oacute;n debe consistir de 32 caracteres minimo",
				maxlength: "La descripci&oacute;n debe consistir de 300 caracteres maximo"
			},
			tituloD: {
				required: "Ingrese un t&iacute;tulo",
				minlength: "El titulo debe consistir de 10 caracteres m&iacute;nimo",
				maxlength: "El titulo debe consistir de 32 caracteres m&aacute;ximo"
			},
			lname: {
				required: "Ingrese el nombre largo de la Grupo-Empresa",
				minlength: "El nombre debe consistir de 10 caracteres m&iacute;nimo",
				maxlength: "El nombre debe consistir de 64 caracteres m&aacute;ximo"
			},
			sname: {
				required: "Ingrese el nombre corto de la Grupo-Empresa",
				minlength: "El nombre debe consistir de 5 caracteres m&iacute;nimo",
				maxlength: "El nombre debe consistir de 20 caracteres m&aacute;ximo"
			},
			codSIS: {
				required: "Ingrese su c&oacute;digo SIS correspondiente",
				minlength: "El nombre debe consistir de 9 caracteres "
			},
            pagos: {
                required: "Ingrese Pago",
				maxlength: "El pago debe consistir de 3 digitos"
            },
            mensaje:{
            	required:"Ingrese el contenido de su comentario",
            	minlength:"El comentario debe ser de 5 caracteres m&iacute;nimo",
            	maxlength:"El comentario debe ser de 160 caracteres m&aacute;ximo"
            },
            observacion:{
            	required:"Ingrese el contenido de su observaci&oacute;",
            	minlength:"La observaci&oacute;n debe ser de 5 caracteres m&iacute;nimo",
            	maxlength:"La observaci&oacute;n debe ser de 60 caracteres m&aacute;ximo"
            }
		}
	});

	
	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		var lastname  = $("#lastname").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "." + lastname;
		}
	});

	//unisoft
	jQuery.validator.addMethod("firstnames", function( value, element ) {
		var result = this.optional(element) || value.length >= 3 && /[a-z]/i.test(value) && !/\d/.test(value) && !/-/.test(value) && !/[\!\@\#\$\%\^\&\*\(\)\_\+\-\=\`\~\[\]\{\}\;\'\:\"\,\.\/\<\>\?\*\-\+\\\|]/.test(value);
		return result;
	}, "El nombre debe tener mínimo 3 caracteres y contener solo caracteres alfabéticos");

	//unisoft
	jQuery.validator.addMethod("lastnames", function( value, element ) {
		var result = this.optional(element) || value.length >= 2 && /[a-z]/i.test(value) && !/\d/.test(value) && !/[\!\@\#\$\%\^\&\*\(\)\_\+\-\=\`\~\[\]\{\}\;\'\:\"\,\.\/\<\>\?\*\-\+\\\|]/.test(value);
		return result;
	}, "El apellido debe tener mínimo 2 caracteres y contener solo caracteres alfabéticos");

	//unisoft
	jQuery.validator.addMethod("telefonos", function( value, element ) {
		var result = this.optional(element) || value.length >= 7 && value.length < 9 && /\d/.test(value) && !/[a-z]/i.test(value) && !/[\!\@\#\$\%\^\&\*\(\)\_\+\-\=\`\~\[\]\{\}\;\'\:\"\.\/\<\>\?\*\-\+\\\|]/.test(value);
		return result;
	}, "El telefono debe tener entre 7 y 8 caracteres y contener solo números");

	//unisoft
    jQuery.validator.addMethod("pagos", function( value, element ) {
		var result = this.optional(element) || value.length < 4 && /\d/.test(value) && !/[a-z]/i.test(value) && !/[\!\@\#\$\%\^\&\*\(\)\_\+\-\=\`\~\[\]\{\}\;\'\:\"\,\.\/\<\>\?\*\-\+\\\|\ ]/.test(value);
		return result;
	}, "El pago debe tener menos de 4 digitos y contener solo números");
	
	//unisoft
    jQuery.validator.addMethod("codigos", function( value, element ) {
		var result = this.optional(element) || value.length == 9  && /\d/.test(value) && !/[a-z]/i.test(value) && !/[\!\@\#\$\%\^\&\*\(\)\_\+\-\=\`\~\[\]\{\}\;\'\:\"\,\.\/\<\>\?\*\-\+\\\|]/.test(value);
		return result;
	}, "El c&oacute;digo SIS debe consistir de 9 digitos y contener solo números");

   	jQuery.validator.addMethod("password", function( value, element ) {
		var result = this.optional(element) || value.length >= 8 && /\d/.test(value) && /[a-z]/i.test(value) ;
		return result;
	}, "Contraseña de 8 caracteres mínimo con al menos un literal y un número.");

	//code to hide topic selection, disable for demo
	var newsletter_2 = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital_2 = newsletter_2.is(":checked");
	var topics_2 = $("#newsletter_topics")[inital_2 ? "removeClass" : "addClass"]("gray");
	var topicInputs_2 = topics_2.find("input").attr("disabled", !inital_2);
	// show when newsletter is checked
	newsletter_2.click(function() {
		topics_2[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs_2.attr("disabled", !this.checked);
	});
});