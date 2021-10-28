
$(document).ready(function () {


	$('.select2Doc').select2()
  
  //Initialize Select2 Elements
	$('.select2bs4').select2({
		theme: 'bootstrap4'
	})
	
  $('#login').validate({
    rules: {
      tipo: {
        required: true,
        number: true
      },
      usuario: {
        required: true,
    
      },
      contra: {
        required: true,
    
      }
    },
    messages: {
      tipo: {
        required: "Seleccione tipo de usuario"
      },
      usuario: {
        required: "Ingrese nombre de usuario"
      },
      contra: {
        required: "Ingrese contraseña"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element)  .removeClass('is-invalid');
    }
  });
//INICIO VALIDACION DE ALTA MATERIAS
  $('#frmmatx').validate({
    rules: {
      idmat: {
        required: true,
        maxlength: 10
      },
      nommat: {
        required: true,
    
      },
      grado: {
        required: true,
    
      },
      status: {
        required: true,
    
      }
    },
    messages: {
      idmat: {
        required: "Indique la clave de la materia"
      },
      nommat: {
        required: "Ingrese descripción de la materia"
      },
      grado: {
        required: "Seleccione el grado"
      },
      status: {
        required: "Activo o inactivo"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element)  .removeClass('is-invalid');
    }
  });

  //FIN VALIDACION DE ALTA MATERIAS
  //INICIO VALIDACION DE ALTA TALLER
  $('#frmtallerk').validate({
    rules: {
      idt: {
        required: true,
        maxlength: 10
      },
      nomt: {
        required: true,
    
      }
    },
    messages: {
      idt: {
        required: "Indique la clave del taller"
      },
      nomt: {
        required: "Ingrese descripción del taller"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element)  .removeClass('is-invalid');
    }
  });

  //FIN VALIDACION DE ALTA TALLERES
  //INICIO VALIDACION DE ALTA ALUMNNO
  
  //INICIO VALIDACION DE ALTA ALUMNNO
  $('#frmalumnommm').validate({
    rules: {
      matricula: {
        required: true,
        maxlength: 10
      },
      app: {
        required: true,
        minlength: 2
      },
      apm: {
        required: true,
      },
      nom: {
        required: true,
      },
      sexo: {
        required: true,
      },
      turno: {
        required: true,
      },
      grado: {
        required: true,
      },
      idt: {
        required: true,
      }    
    },
    messages: {
      matricula: {
        required: "Indique la matricula"
      },
      app: {
        required: "Ingrese descripción del taller",
        minlength: "Ingrese al menos 2 caracteres"
      },
      apm: {
        required: "Ingrese descripción del taller"
      },
      nom: {
        required: "Ingrese descripción del taller"
      },
      sexo: {
        required: "Seleccione una opcion"
      },
      turno: {
        required: "Seleccione una opcion"
      },
      grado: {
        required: "Seleccione una opcion"
      },
      idt: {
        required: "Seleccione un taller"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element)  .removeClass('is-invalid');
    }
  });
  
  $('#listax').DataTable({      
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
  });
});
