function ModalHorario(datos) {
	d = datos.split('||');
	$('#aidh').val(d[0]);
	$('#aidia').val(d[1]);
	$('#aidr').val(d[2]);

}

function CargarGrupo(val) {
	//alert(val);
	$.ajax({
		type: "POST",
		url: $('#dirgrupo').val(),
		data: "grado=" + val,
		success: function (resp) {
			$("#idg").html(resp);

		}
	});
	if ($('#grado').val() != "") {
		divA = document.getElementById("grupoc");
		divA.style.display = "";
		divA = document.getElementById("matec");
		divA.style.display = "none";
		divC = document.getElementById("doch");
		divC.style.display = "none";
		divB = document.getElementById("botonh");
		divB.style.display = "none";
	} else {
		divD = document.getElementById("grupoc");
		divD.style.display = "none";
		divA = document.getElementById("matec");
		divA.style.display = "none";
		divC = document.getElementById("doch");
		divC.style.display = "none";
		divB = document.getElementById("botonh");
		divB.style.display = "none";
	}
}

function CargarMaterias(val) {
	//alert(val);
	$.ajax({
		type: "POST",
		url: $('#dirmat').val(),
		data: $("#hrsearch").serialize(),
		success: function (resp) {
			$("#idmat").html(resp);
			//alert(resp);
		}
	});
	if ($('#grupo').val() != "") {
		divA = document.getElementById("matec");
		divA.style.display = "";
		divC = document.getElementById("doch");
		divC.style.display = "none";
		divB = document.getElementById("botonh");
		divB.style.display = "none";
	} else {
		divA = document.getElementById("matec");
		divA.style.display = "none";
		divC = document.getElementById("doch");
		divC.style.display = "none";
		divB = document.getElementById("botonh");
		divB.style.display = "none";
	}
}
function verDocente(val) {
	var materia = $('#materia').val()
	//alert(materia);
	$.ajax({
		type: "POST",
		url: $('#dirdoc').val(),
		data: $("#hrsearch").serialize(),
		success: function (resp) {
			$("#rfcp").html(resp);
			//alert(resp);
		}
	});
	if ($('#materia').val() != "") {
		divA = document.getElementById("doch");
		divA.style.display = "";
	} else {

		divA = document.getElementById("doch");
		divA.style.display = "none";
		divB = document.getElementById("botonh");
		divB.style.display = "none";
		$("#rfcp > option[value='']").attr("selected", true)
	}
}
function verBoton(val) {
	//alert(val);
	if (($('#grado').val() != "") && ($('#grupo').val() != "") && ($('#materia').val() != "") && ($('#docente').val() != "")) {
		divA = document.getElementById("botonh");
		divA.style.display = "";
	} else {

		divA = document.getElementById("botonh");
		divA.style.display = "none";
	}
}

/* function to redirect a webpage to another using post method */

function redirect_by_post(purl, pparameters, in_new_tab) {
	pparameters = (typeof pparameters == 'undefined') ? {} : pparameters;
	in_new_tab = (typeof in_new_tab == 'undefined') ? true : in_new_tab;

	var form = document.createElement("form");
	$(form).attr("id", "reg-form").attr("name", "reg-form").attr("action", purl).attr("method", "post").attr("enctype", "multipart/form-data");
	if (in_new_tab) {
		$(form).attr("target", "_blank");
	}
	$.each(pparameters, function (key) {
		$(form).append('<input type="text" name="' + key + '" value="' + this + '" />');
	});
	document.body.appendChild(form);
	form.submit();
	document.body.removeChild(form);

	return false;
}

function agregadoc(datos) {
	//alert("dentro de modificar");
	$('#frmpersomod')[0].reset();

	d = datos.split('||');

	$('#mrfcp').val(d[0]);
	$('#mrfcp2').val(d[0]);
	$('#mnomp').val(d[1]);

	var turno = d[2];
	//	alert(status);
	if (turno == 'M') {
		$("#mra1").prop("checked", true);
	} else {
		if (turno == 'V') {
			$("#mra2").prop("checked", true);
		}
	}

	var adm = d[3];
	if (adm == 1) {
		$("#mrol1").prop("checked", true);
	}

	var aca = d[4];
	if (aca == 1) {
		$("#mrol2").prop("checked", true);
	}

	var doc = d[5];
	if (doc == 1) {
		$("#mrol3").prop("checked", true);
	}

	var pre = d[6];
	if (pre == 1) {
		$("#mrol4").prop("checked", true);
	}
}

function agregaform(datos) {
	//alert("dentro de modificar");
	$('#frmtallermod')[0].reset();
	d = datos.split('||');

	$('#idta').val(d[0]);
	$('#idta2').val(d[0]);
	$('#nomta').val(d[1]);

}

function agregaformat(datos) {
	//alert("dentro de modificar materia");
	d = datos.split('||');

	$('#mmat1').val(d[0]);
	$('#mmat2').val(d[0]);
	$('#mnommat').val(d[1]);

	var grado = d[2];
	if (grado == 1) {
		//alert("grado vale 1");
		$("#mgr1").prop("checked", true);
	} else {
		if (grado == 2) {
			$('#mgr2').prop("checked", true);
		} else {
			if (grado == 3) {
				$('#mgr3').prop("checked", true);
			}
		}
	}
	//alert(grado);

	var status = d[3];
	//	alert(status);
	if (status == 1) {
		//alert("el grado vale 1");
		$("#mra1").prop("checked", true);
	} else {
		//alert("el grado vale 0");
		$("#mra2").prop("checked", true);
	}
}
function onlyNum(e) {
	key = e.keyCode || e.which;
	teclado = String.fromCharCode(key);
	numeros = "0123456789";
	especiales = "8-37-38-46";
	teclado_especial = false;

	for (var i in especiales) {
		if (key == especiales[i]) {
			teclado_especial = true;
		}
	}

	if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
		return false;
	}
}


$(document).ready(function () {

	$('.preloader').fadeOut('fast');

	$('.solo-numero').keyup(function () {
		this.value = (this.value + '').replace(/[^0-9]/g, '');
	});

	$("#lista").find('.tr1').keyup(function () {
		var tr1 = $(this).closest("tr").find(".tr1").val();
		var tr2 = $(this).closest("tr").find(".tr2").val();
		var tr3 = $(this).closest("tr").find(".tr3").val();
		if(tr1==""){tr1=0;}
		if(tr2==""){tr2=0;}
		if(tr3==""){tr3=0;}
		var promedio = (parseFloat(tr1) + parseFloat(tr2) + parseFloat(tr3)) / 3;
		$(this).closest("tr").find(".prom").val(promedio.toFixed(1));
	});
	$("#lista").find('.tr2').keyup(function () {
		var tr1 = $(this).closest("tr").find(".tr1").val();
		var tr2 = $(this).closest("tr").find(".tr2").val();
		var tr3 = $(this).closest("tr").find(".tr3").val();
		if(tr1==""){tr1=0;}
		if(tr2==""){tr2=0;}
		if(tr3==""){tr3=0;}
		var promedio = (parseFloat(tr1) + parseFloat(tr2) + parseFloat(tr3)) / 3;
		$(this).closest("tr").find(".prom").val(promedio.toFixed(1));
	});
	$("#lista").find('.tr3').keyup(function () {
		var tr1 = $(this).closest("tr").find(".tr1").val();
		var tr2 = $(this).closest("tr").find(".tr2").val();
		var tr3 = $(this).closest("tr").find(".tr3").val();
		if(tr1==""){tr1=0;}
		if(tr2==""){tr2=0;}
		if(tr3==""){tr3=0;}
		var promedio = (parseFloat(tr1) + parseFloat(tr2) + parseFloat(tr3)) / 3;
		$(this).closest("tr").find(".prom").val(promedio.toFixed(1));
	});
	// $(document).on("click",".btn-print",function(){
	// 	location.reload();
	// 	$(".guarda").css("display", "none");
	// 	$('.card-body').print();
	// 	$.print(".card-body");
	// 	$(".guarda").css("display", "");
	// 	$("#formulariomayores").css("display", "block");
	// });
	$(".content").find('.btn-print').on('click', function () {

		$(".guarda").css("display", "none");
		$.print(".card-body");

	});

	$("#frmpersomod").submit(function (e) {
		e.preventDefault();

		$.ajax({
			url: $("#frmpersomod").attr("action"),
			type: $("#frmpersomod").attr("method"),
			data: $("#frmpersomod").serialize(),
			success: function (response) {
				//alert(response);

				if (response == 1) {
					swal("¡Modificación Exitosa!", "Ver los registros ingresados", "success");
					setTimeout(function () {
						location.reload();
					}, 800);
				} else {
					swal("Error al guardar", "Verifique los datos ingresados", "warning");
				}
			}
		});
	});

	$("#frmssagregagrupo").submit(function (e) {
		e.preventDefault();

	});

	$(".VaciaTa").submit(function (e) {
		e.preventDefault();
		swal({
			title: "¿Realmente desea vaciar el horario?",
			text: "Al vaciar el horario, el alumno queda como NO INSCRITO!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					//ajax que borra el horario
					$.ajax({
						url: $(".VaciaTa").attr("action"),
						type: $(".VaciaTa").attr("method"),
						data: $(".VaciaTa").serialize(),
						success: function (response) {
							//alert(response);
							if (response == 1) {
								swal("¡Taller ha sido vaciado!", "Ver lista de talleres", "success");
								setTimeout(function () {
									location.reload();
								}, 800);
							} else {
								swal("Error al Vaciar taller", "Notifique al programador", "warning");
							}
						}
					});
				} else {
					swal("¡¡El taller permanece sin cambios!!");
				}
			});
	});
	//eliminar horario
	$(".BorraHr").submit(function (e) {
		e.preventDefault();
		var url = $('#base_url').val();
		swal({
			title: "¿Realmente desea Borrar el horario?",
			text: "Al Borrar el horario, los alumnos inscritos se borrará!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					//ajax que borra el horario
					$.ajax({
						url: $(".BorraHr").attr("action"),
						type: $(".BorraHr").attr("method"),
						data: $(".BorraHr").serialize(),
						success: function (response) {
							//alert(response);
							if (response == 1) {
								swal("¡Taller ha sido Borrado!", "Ver lista de Horarios", "success");
								$(location).attr('href', url);
							} else {
								swal("Error al Borrar el Horario", "Notifique al programador", "warning");
							}
						}
					});
				} else {
					swal("¡¡El Horario permanece sin cambios!!");
				}
			});
	});
	$("#frmvaciar").submit(function (e) {
		e.preventDefault();
		swal({
			title: "¿Realmente desea vaciar el horario?",
			text: "Al vaciar el horario, el alumno queda como NO INSCRITO!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					//ajax que borra el horario
					$.ajax({
						url: $("#frmvaciar").attr("action"),
						type: $("#frmvaciar").attr("method"),
						data: $("#frmvaciar").serialize(),
						success: function (response) {
							//alert(response);
							if (response == 1) {
								swal("¡Borrado exitoso!", "Ver horario", "success");
								setTimeout(function () {
									location.reload();
								}, 800);
							} else {
								swal("Error al Vaciar horario", "Notifique al programador", "warning");
							}
						}
					});
				} else {
					swal("¡¡El horario permanece sin cambios!!");
				}
			});
		/*
		 */
	});


	$("#frmmatmod").submit(function (e) {
		e.preventDefault();

		$.ajax({
			url: $("#frmmatmod").attr("action"),
			type: $("#frmmatmod").attr("method"),
			data: $("#frmmatmod").serialize(),
			success: function (response) {
				if (response == 1) {
					swal("¡Modificación Exitosa!", "Ver los registros ingresados", "success");
					setTimeout(function () {
						location.reload();
					}, 800);
				} else {
					swal("Error al guardar", "Verifique los datos ingresados", "warning");
				}
			}
		});
	});


	$("#frmmat").submit(function (e) {
		e.preventDefault();

		$.ajax({
			url: $("#frmmat").attr("action"),
			type: $("#frmmat").attr("method"),
			data: $("#frmmat").serialize(),
			success: function (response) {
				if (response == 1) {
					swal("¡Alga Exitosa!", "Ver los registros ingresados", "success");
					setTimeout(function () {
						location.reload();
					}, 800);
				} else {
					swal("Error al guardar", "Verifique los datos ingresados", "warning");
				}
			}
		});
	});


	$("#frmimparte").submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: $("#frmimparte").attr("action"),
			type: $("#frmimparte").attr("method"),
			data: $("#frmimparte").serialize(),
			success: function (response) {
				if (response == 1) {
					alertify.success('Hora/día Guardada :)');
					//swal("¡Alta Exitosa!", "Ver los registros ingresados", "success");
					//setTimeout(function () {
					//	Swal.close()
					//  }, 300);	
				} else {
					swal("Error al guardar", "Verifique los datos ingresados", "warning");
					setTimeout(function () {
						location.reload();
					}, 300);
				}
			}
		});
		$("#cargahorario").modal('hide');//ocultamos el modal
	});


	$("#frmtaller").submit(function (e) {
		e.preventDefault();

		$.ajax({
			url: $("#frmtaller").attr("action"),
			type: $("#frmtaller").attr("method"),
			data: $("#frmtaller").serialize(),
			success: function (response) {
				if (response == 1) {
					swal("¡Alga Exitosa!", "Ver los registros ingresados", "success");
					setTimeout(function () {
						location.reload();
					}, 800);
				} else {
					swal("Error al guardar", "Verifique los datos ingresados", "warning");
				}
			}
		});
	});
	$("#frmtallermod").submit(function (e) {
		e.preventDefault();

		$.ajax({
			url: $("#frmtallermod").attr("action"),
			type: $("#frmtallermod").attr("method"),
			data: $("#frmtallermod").serialize(),
			success: function (response) {
				//alert(response);

				if (response == 1) {
					swal("¡Modificación Exitosa!", "Ver los registros ingresados", "success");
					setTimeout(function () {
						location.reload();
					}, 800);
				} else {
					swal("Error al guardar", "Verifique los datos ingresados", "warning");
				}
			}
		});
	});
	$("#frmperso").submit(function (e) {
		e.preventDefault();

		$.ajax({
			url: $("#frmperso").attr("action"),
			type: $("#frmperso").attr("method"),
			data: $("#frmperso").serialize(),
			success: function (response) {
				//alert(response); 
				if (response == 1) {
					swal("¡Alga Exitosa!", "Ver los registros ingresados", "success");
					setTimeout(function () {
						location.reload();
					}, 800);
				} else {
					swal("Error al guardar", "Verifique los datos ingresados", "warning");
				}
			}
		});
	});
	$("#cambiotrim").submit(function (e) {
		e.preventDefault();

		$.ajax({
			url: $("#cambiotrim").attr("action"),
			type: $("#cambiotrim").attr("method"),
			data: $("#cambiotrim").serialize(),
			success: function (response) {
				//alert(response); 
				if (response == 1) {
					swal("¡Cambio Exitosa!", "", "success");
					setTimeout(function () {
						location.reload();
					}, 800);
				} else {
					swal("Error al guardar", "", "warning");
				}
			}
		});
	});
	$("#cambiotrim2").submit(function (e) {
		e.preventDefault();

		$.ajax({
			url: $("#cambiotrim2").attr("action"),
			type: $("#cambiotrim2").attr("method"),
			data: $("#cambiotrim2").serialize(),
			success: function (response) {
				//alert(response); 
				if (response == 1) {
					swal("¡Cambio Exitosa!", "", "success");
					setTimeout(function () {
						location.reload();
					}, 800);
				} else {
					swal("Error al guardar", "", "warning");
				}
			}
		});
	});

	$(document).on("click", "#lista .btn-guarda-cal", function () {

		var tr1 = $(this).closest("tr").find(".tr1").val();
		var fa1 = $(this).closest("tr").find(".fa1").val();
		var tr2 = $(this).closest("tr").find(".tr2").val();
		var fa2 = $(this).closest("tr").find(".fa2").val();
		var tr3 = $(this).closest("tr").find(".tr3").val();
		var fa3 = $(this).closest("tr").find(".fa3").val();
		var matricula = $(this).closest("tr").find(".matricula").val();
		var idh = $(this).closest("tr").find(".idh").val();
		var base_url = $(this).closest("tr").find(".base_url").val();
		var trim = $(this).closest("tr").find(".trim").val();
		var promedio = $(this).closest("tr").find(".prom").val();

		// var promedio=0;
		// promedio=(tr1+tr2+tr3)/3;
		//alertify.success('mi mensaje exitoso');
		//alertify.error('mi mensaje de error');
		//alertify.warning('mi mensaje advertencia');

		//alert(tr1);
		//alert(tr2);
		//alert(tr3);
		//alert(matricula);
		//alert(idh);
		//alert(base_url);
		//alert(trim);
		//((tr1<0) || (tr1>0 && tr1<5) || (tr1>10))
		//(tr1<5)||(tr1>10)
		//si el valor es igual a 0 o 6, convertir en null
		//if((tr1==0)||(tr1==6)){
		if (tr1 == 0) {
			$(this).closest("tr").find(".tr1").val("");
			tr1 = 0;
		}
		if ((trim == 1) && ((tr1 < 0) || (tr1 > 0 && tr1 < 5) || (tr1 > 10))) {
			var mensaje = 1;
		}
		if ((trim == 2) && ((tr2 < 0) || (tr2 > 0 && tr2 < 5) || (tr2 > 10))) {
			var mensaje = 1;
		}
		if ((trim == 3) && ((tr3 < 0) || (tr3 > 0 && tr3 < 5) || (tr3 > 10))) {
			var mensaje = 1;
		}
		if (mensaje == 1) {
			swal("Calificacion fuera de rango", "", "warning");
		} else {
			cadena = "idh=" + idh +
				"&matricula=" + matricula +
				"&tr1=" + tr1 +
				"&fa1=" + fa1 +
				"&tr2=" + tr2 +
				"&fa2=" + fa2 +
				"&tr3=" + tr3 +
				"&fa3=" + fa3 +
				"&trim=" + trim +
				"&prom=" + promedio;

			$.ajax({
				type: "POST",
				url: base_url,
				data: cadena,
				success: function (response) {
					//alert(response);
					if (response == 1) {
						alertify.success('Calificacion Guardada :)');
					} else {
						alertify.error("Error al guardar :(");
					}
				}
			});
		}
	});
	//modificacion de calificaciones  en boleta
	$(document).on("click", "#listamod .btn-guarda-calmod", function () {
		var tr1 = $(this).closest("tr").find(".tr1").val();
		var fa1 = $(this).closest("tr").find(".fa1").val();
		var tr2 = $(this).closest("tr").find(".tr2").val();
		var fa2 = $(this).closest("tr").find(".fa2").val();
		var tr3 = $(this).closest("tr").find(".tr3").val();
		var fa3 = $(this).closest("tr").find(".fa3").val();
		var matricula = $(this).closest("tr").find(".matricula").val();
		var idh = $(this).closest("tr").find(".idh").val();
		var base_url = $(this).closest("tr").find(".base_url").val();
		var trim = $(this).closest("tr").find(".trim").val();


		if (tr1 == 0) {
			$(this).closest("tr").find(".tr1").val("");
			tr1 = 0;
		}
		if ((trim == 1) && ((tr1 < 0) || (tr1 > 0 && tr1 < 5) || (tr1 > 10))) {
			var mensaje = 1;
		}
		if ((trim == 2) && ((tr2 < 0) || (tr2 > 0 && tr2 < 5) || (tr2 > 10))) {
			var mensaje = 1;
		}
		if ((trim == 3) && ((tr3 < 0) || (tr3 > 0 && tr3 < 5) || (tr3 > 10))) {
			var mensaje = 1;
		}
		if (mensaje == 1) {
			swal("Calificacion fuera de rango", "", "warning");
		} else {
			cadena = "idh=" + idh +
				"&matricula=" + matricula +
				"&tr1=" + tr1 +
				"&fa1=" + fa1 +
				"&tr2=" + tr2 +
				"&fa2=" + fa2 +
				"&tr3=" + tr3 +
				"&fa3=" + fa3 +
				"&trim=" + trim;

			$.ajax({
				type: "POST",
				url: base_url,
				data: cadena,
				success: function (response) {
					//alert(response);
					if (response == 1) {
						alertify.success('Calificacion Guardada :)');
					} else {
						alertify.error("Error al guardar :(");
					}
				}
			});
		}
	});
	//fin de modificaciones en boleta
	$(".califica").submit(function (e) {
		e.preventDefault();

		//alert("entramos a califica");


		$.ajax({
			url: $(".califica").attr("action"),
			type: $("#califica").attr("method"),
			data: $(".califica").serialize(),
			success: function (response) {
				alert(response);
				/*if(response==1){
					swal("¡Cambio Exitosa!", "", "success");
					setTimeout(function(){
						location.reload();
					},800); 
				}else{
					 swal("Error al guardar", "", "warning");
				}*/
			}
		});

	});


	$("#frmalumno").submit(function (e) {
		e.preventDefault();
		let base_url = $('#base_url').val();
		let matricula = $('#matricula').val();
		$.ajax({

			url: $("#frmalumno").attr("action"),
			type: $("#frmalumno").attr("method"),
			data: $("#frmalumno").serialize(),
			success: function (response) {
				//alert(response);
				if (response == 1) {
					swal("¡Alta Exitosa!", "Ver los registros ingresados", "success");
					location.href = base_url;
					//colocar otro ajax para redireccionar al horario del alumno modificado
					redirect_by_post(base_url, {
						matricula: matricula
					}, false);
				} else {
					swal("Error al guardar", "Verifique los datos ingresados", "warning");
				}
			}
		});
	});

	$("#frmdatosal").submit(function (e) {
		e.preventDefault();
		let base_url = $('#base_url').val();
		let matricula2 = $('#matricula2').val();
		$.ajax({

			url: $("#frmdatosal").attr("action"),
			type: $("#frmdatosal").attr("method"),
			data: $("#frmdatosal").serialize(),
			success: function (response) {
				//alert(response);
				if (response == 1) {
					swal("¡Modificación Exitosa!", "Ver los Horario para agregar materias", "success");
					//location.href=base_url;
					//colocar otro ajax para redireccionar al horario del alumno modificado
					redirect_by_post(base_url, {
						matricula: matricula2
					}, false);

				} else {
					swal("Error al guardar", "Verifique los datos ingresados", "warning");
				}
			}
		});
	});
	$("#frmpassword").submit(function (e) {
		//$('#frmpassword')[0].reset();
		e.preventDefault();
		if ($('#pcontra').val() != $('#pcontra2').val()) {
			swal("Contraseña no coincide", "Verifique los datos ingresados", "warning");
		} else {
			$.ajax({
				url: $("#frmpassword").attr("action"),
				type: $("#frmpassword").attr("method"),
				data: $("#frmpassword").serialize(),
				success: function (response) {
					//alert(response);

					if (response == 1) {
						swal("¡Modificación Exitosa!", "Ver los registros ingresados", "success");
						setTimeout(function () {
							location.reload();
						}, 800);
					} else {
						swal("Error al guardar", "Verifique los datos ingresados", "warning");
					}
				}
			});
		}
	});
	//borrar horario


});


/*let matricula=$('#matricula').val();
		let app=$('#app').val();
		let apm=$('#apm').val();
		let nom=$('#nom').val();
		let ra1=$('#ra1').val();
		let ra2=$('#ra2').val();
		let fecnac=$('#fecnac').val();
		let ta1=$('#ta1').val();
		let ta2=$('#ta2').val();
		let g1r=$('#gr1').val();
		let g2r=$('#gr2').val();
		let g3r=$('#gr3').val();
		let idt=$('#idt').val();

		if(matricula==""){
				swal("Ingrese la matricula ", {icon: "warning",});
		}else{
			if(app==""){
					swal("Ingrese apellido paterno ", {icon: "warning",});
			}else{
				if(apm==""){
						swal("Ingrese apellido materno ", {icon: "warning",});
				}else{
					if(nom==""){
							swal("Ingrese nombre ", {icon: "warning",});
					}else{
						if((ra1=="")&&(ra2=='')){
								swal("Seleccione el sexo ", {icon: "warning",});
						}else{
							if(fecnac==""){
									swal("Ingrese fecha de nacimiento ", {icon: "warning",});
							}
						}
					}
				}
			}
		}*/

/*
function permite(elEvento, permitidos) {
// Variables que definen los caracteres permitidos
var numeros = "0123456789";
var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
var numeros_caracteres = numeros + caracteres;
var teclas_especiales = [8, 37, 39, 46];
// 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha


// Seleccionar los caracteres a partir del parámetro de la función
switch(permitidos) {
case 'num':
	permitidos = numeros;
	break;
case 'car':
	permitidos = caracteres;
	break;
case 'num_car':
	permitidos = numeros_caracteres;
	break;
}

// Obtener la tecla pulsada
var evento = elEvento || window.event;
var codigoCaracter = evento.charCode || evento.keyCode;
var caracter = String.fromCharCode(codigoCaracter);

// Comprobar si la tecla pulsada es alguna de las teclas especiales
// (teclas de borrado y flechas horizontales)
var tecla_especial = false;
for(var i in teclas_especiales) {
if(codigoCaracter == teclas_especiales[i]) {
	tecla_especial = true;
	break;
}
}

// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
// o si es una tecla especial
return permitidos.indexOf(caracter) != -1 || tecla_especial;
}

// Sólo números
<input type="text" id="texto" onkeypress="return permite(event, 'num')" />

// Sólo letras
<input type="text" id="texto" onkeypress="return permite(event, 'car')" />

// Sólo letras o números
<input type="text" id="texto" onkeypress="return permite(event, 'num_car')" />*/
