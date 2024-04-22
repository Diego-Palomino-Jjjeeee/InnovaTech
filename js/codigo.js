
//Iniciar los envetos en JQuery
$(function(){
//Define los eventos a trabajar en la pagina
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//EMPLEADO
//Mostrar
    $(".reg_empleado .btn_mostrar").click(function(e) {
        let codemp = $(this).closest(".reg_empleado").children(".codemp").text();
        location.href = "mostrar_empleado.php?codemp=" + codemp;
    });

//Editar
    $(".reg_empleado .btn_editar").click(function(e) {
        let codemp = $(this).closest(".reg_empleado").children(".codemp").text();

        location.href = "editar_empleado.php?codemp=" + codemp;
    })

//Borrar
    $(".reg_empleado .btn_borrar").click(function(e) {
        let codemp = $(this).closest(".reg_empleado").children(".codemp").text();

        $("#md_borrar .lbl_codemp").text(codemp);

        $("#md_borrar .btn_borrar").attr("href", "../controlador/ctr_borrar_emp.php?codemp=" + codemp);
    
        $("#md_borrar").modal("show");
    })

//Consultar
    $(document).ready(function () {
        $("#frm_consultar_emp #txt_codemp").focusout(function (e) {
            e.preventDefault();
            // Capturar el valor ingresado en el cuadro de texto
            let codemp = $(this).val();

            if (codemp != "") {
                // Implementar la consulta por medio de AJAX para JQuery 
                $.ajax({
                    url: "../controlador/ctr_consultar_emp.php",
                    type: "POST",
                    data: { codemp: codemp },
                    success: function (rpta) {
                        let rp = JSON.parse(rpta);

                        if (rp) {
                            $(".nom").html(rp.Nombre);
                            $(".dir").html(rp.Direccion);
                            $(".tel").html(rp.Telefono);
                            $(".ema").html(rp.Email);
                            $(".sue").html("S/. " + rp.Sueldo);   
                            $(".est").html(rp.Estado_civil);
                        } else {
                            $("#txt_codemp").val("");

                            let vacio = "&nbsp;";
                            $(".nom, .dir, .tel, .ema, .sue, .est").html(vacio);

                            $("#txt_codemp").focus();

                            // Alerta centrada
                            //alert("El código " + codprod + " no existe");
                        }
                    }
                });
            }
        });
    });

    //Filtrar
    $(document).ready(function () {
        $("#form_filtrar_emp").submit(function (e) {
            e.preventDefault();

            var valor = $("#txt_valor").val();

            if (valor != "") {
                $.post("../controlador/ctr_filtrar_emp.php",
                    { valor: valor },
                    function (rpta) {
                        $("#tabla").html(rpta);
                    });
            } else {
                $("#tabla").html("");
                alert("Escriba un valor para filtrar...");
                $("#txt_valor").focus();
            }
        });
    }); 
    
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Especialidades
// Johan
// Evento focusout (perder el enfoque) del cuadro de texto de la página consultar_producto.php
    $("#frm_consultar_espec #txt_Id_especialidad").focusout(function (e) {
        e.preventDefault();
        // Capturar el valor ingresado en el cuadro de texto
        let codesp = $(this).val();

        if (codesp != "") {
            // Implementar la consulta por medio de AJAX para JQuery
            $.ajax({
                url: "../controlador/ctr_consultar_espec.php",
                type: "POST",
                data: { txt_Id_especialidad: codesp },
                success: function (rpta) {
                    let rp = JSON.parse(rpta);

                    if (rp) {

                        $(".nom").html(rp.Nombre);
                        $(".are").html(rp.Area);

                    } else {
                        $("#error_modal").modal()

                        $("#txt_Id_especialidad").val("");

                        let vacio = "&nbsp;";

                        $(".nom").html(vacio);
                        $(".are").html(vacio);

                        $("#txt_Id_especialidad").focus();
                    }
                }
            });
        }

    });

    $("#form_filtrar_espec").submit(function (e) {
        e.preventDefault();

        var valor = $("#txt_valor").val();

        if (valor != '') {
            $.post("../controlador/ctr_filtrar_espec.php",
                { valor: valor },
                function (rpta) {
                    $("#modal_information .modal-dialog").removeClass("modal-sm");
                    $("#modal_information .modal-dialog").addClass("modal-xl");

                    $("#modal_information .modal-body").html("<div id='tabla'></div>");

                    $("#tabla").html(rpta);

                    $("#modal_information").modal("show");
                });
        } else {
            $("#tabla").html("");
            $("#modal_information .modal-body").html("<h5>Escriba un valor</h5>");
            $("#modal_information").modal("show");

            $("#txt_valor").focus();
        }
    });

    $(".reg_especialidades .btn_borrar").click(function (e) {
        let codespecialidad = $(this).closest(".reg_especialidades").children(".idesp").text();
        let nombreespecialidad = $(this).closest(".reg_especialidades").children(".esp").text();

        $("#md_borrar_especialidad .lbl_nombre").text(nombreespecialidad);
        $("#md_borrar_especialidad #txt_codigo").val(codespecialidad);
        $("#md_borrar_especialidad").modal("show");
    });

    $(".reg_especialidades .btn_editar").click(function (e) {
        let codespecialidad = $(this).closest(".reg_especialidades").children(".idesp").text()

        $("#md_editar_especialidad").modal("show");
        if (codespecialidad != '') {
            $.ajax({
                url: "../controlador/ctr_consultar_espec.php",
                type: "POST",
                data: { txt_Id_especialidad: codespecialidad },
                success: function (rpta) {
                    let rp = JSON.parse(rpta)
                    if (rp) {
                        $("#txt_codigo").val(rp.Id_especialidad);
                        $("#txt_nombre").val(rp.Nombre);
                        $("#txt_area").val(rp.Area);
                    }
                }
            })
        }
    })

    $(".reg_especialidades .btn_mostrar").click(function (e) {
        let codespecialidad = $(this).closest(".reg_especialidades").children(".idesp").text();

        $("#md_mostrar_especialidad").modal("show");
        if (codespecialidad != "") {
            $.ajax({
                url: "http://localhost/Taller/paginas/controlador/ctr_consultar_espec.php",
                type: "POST",
                data: { txt_Id_especialidad: codespecialidad },
                success: function (rpta) {
                    let rp = JSON.parse(rpta);
                    if (rp) {
                        $(".codigo").html(rp.Id_especialidad);
                        $(".nombre").html(rp.Nombre);
                        $(".area").html(rp.Area);
                    }
                }
            });
        }
    });

    


// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CLIENTES
// Luis
$(".reg_cliente .btn_mostrar").click(function(e){
    let codcli = $(this).closest(".reg_cliente").children(".codcliente").text();
    location.href = "mostrar_cliente.php?codcli=" + codcli;
});
    
$(".reg_cliente .btn_editar").click(function (e) {
    let codcli = $(this).closest(".reg_cliente").children(".codcliente").text();
    location.href = "editar_cliente.php?codcli=" + codcli;
});

$(".reg_cliente .btn_borrar").click(function (e) {
    let codcli = $(this).closest(".reg_cliente").children(".codcliente").text();
    let nombre = $(this).closest(".reg_cliente").children(".nombre").text();

    $("#md_borrar .lbl_codcli").text(codcli);
    $("#md_borrar .lbl_nombre").text(nombre);

    $("#md_borrar .btn_borrar").attr("href", "../controlador/ctr_borrar_cliente.php?codcli=" + codcli);

    $("#md_borrar").modal("show");
});

$("#form_consultar_cli").submit(function (e) {
    e.preventDefault();
    
    var valor = $("#txt_valor").val();

    if (valor != "") {
        // Convertir el valor a entero
        var codcli = parseInt(valor);

        $.ajax({
            url: "../controlador/ctr_consultar_cliente.php",
            type: "POST",
            data: { codcli: codcli }, // Pasar el valor convertido a entero
            success: function (rpta) {
                let rp = JSON.parse(rpta);

                if (rp) {
                    $("#md_consultar .nombre").html(rp.nombre);
                    $("#md_consultar .ap_paterno").html(rp.ap_paterno);
                    $("#md_consultar .ap_materno").html(rp.ap_materno);
                    $("#md_consultar .fecha_nacimiento").html(rp.fecha_nacimiento);
                    $("#md_consultar .direccion").html(rp.direccion);
                    $("#md_consultar .correo_electronico").html(rp.correo_electronico);
                    $("#md_consultar .distrito_nombre").html(rp.distrito_nombre);

                    $("#md_consultar").modal("show");
                } else {
                    let vacio = "&nbsp;";
                    $("#md_consultar .nombre, #md_consultar .ap_paterno, #md_consultar .ap_materno, #md_consultar .fecha_nacimiento, #md_consultar .direccion, #md_consultar .correo_electronico, #md_consultar .distrito_nombre").html(vacio);
                    alert("El código " + valor + " no existe");
                }
            }
        });
    } else {
        alert("Ingrese un valor para consultar");
    }
});

$("#form_filtrar_cli").submit(function (e) {
    e.preventDefault();

    var valor = $("#txt_valor").val();

    if (valor != "") {
        $.post("../controlador/ctr_filtrar_cli.php",
            { valor: valor },
            function (rpta) {
                $("#tabla").html(rpta);
            });
    } else {
        $("#tabla").html("");
        alert("Escriba un valor para filtrar...");
        $("#txt_valor").focus();
    }
});   
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Timoty
// Servicios
$(".reg_recurso .btn_mostrar").click(function(e) {
    let id_recurso = $(this).closest(".reg_recurso").children(".id_recurso").text();

    location.href = "mostrar_recurso.php?id_recurso=" + id_recurso;
})

$(".reg_recurso .btn_editar").click(function(e) {
    let id_recurso = $(this).closest(".reg_recurso").children(".id_recurso").text();

    location.href = "editar_recurso.php?id_recurso=" + id_recurso;
})

// Evento click del botón borrar de la página listar_recurso.php
$(".reg_recurso .btn_borrar").click(function(e) {
    let id_recurso = $(this).closest(".reg_recurso").children(".id_recurso").text();
    let nombre = $(this).closest(".reg_recurso").children(".nombre").text();
    
    $("#md_borrar .lbl_id_recurso").text(id_recurso);
    $("#md_borrar .lbl_nombre").text(nombre);

    $("#md_borrar .btn_borrar").attr("href", "../controlador/ctr_borrar_recurso.php?id_recurso=" + id_recurso);
    $("#md_borrar").modal("show");
});

// Evento focusout (perder el enfoque) del cuadro de texto de la página consultar_recurso.php 
$("#frm_consultar_recurso #txt_id_recurso").focusout(function(e) {
    e.preventDefault();
    // Capturar el valor ingresado en el cuadro de texto
    let id_recurso = $(this).val();

    if (id_recurso != "") {
        // Implementar la consulta por medio de AJAX para jQuery 
        $.ajax({
            url: "../controlador/ctr_consultar_recurso.php",
            type: "POST",
            data: {id_recurso: id_recurso},
            success: function(rpta) {
                let rp = JSON.parse(rpta);

                if (rp) {
                    $(".nombre").html(rp.Nombre);
                    $(".categoria").html(rp.Categoria);
                    $(".estado").html(rp.Estado);
                    $(".fecha_adquisicion").html(rp.Fecha_Adquisicion);
                    $(".costo").html(rp.Costo);
                } else {
                    // Si no hay información, mostrar mensaje en el modal
                    $("#modalInfo").modal("show");
                    $(".modal-body").html("El ID " + id_recurso + " no existe.");
                }
            }
        });
    }
});

$("#frm_filtrar_rec #btn_filtrar").on("click", function(e) {
    e.preventDefault();

    var valor = $("#txt_valor").val();

    if (valor != "") {
        $.post("../controlador/ctr_filtrar_recurso.php", {valor: valor}, function(rpta) {
            if (rpta.trim() === "") {
                $('#alertModal').modal('show');
            } else {
                $('#resultadoModal .modal-body').html(rpta);
                $('#resultadoModal').modal('show');
            }
        });
    } else {
        $('#alertModal').modal('show');
    }
});
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Servicios
// Marrufo
//Define los eventos a trabajar en la página
    //Evento click del botón mostrar de la página listar_producto.php
    $(".reg_servicio .btn_mostrar").click(function(e) {
        let codser = $(this).closest(".reg_servicio").children(".codser").text();

        location.href = "mostrar_servicio.php?codser=" + codser;
    });
       //Evento Click del botón editar de la página listar Servicio
    $(".reg_servicio .btn_editar").click(function (e) {
        let codser = $(this).closest(".reg_servicio").children(".codser").text();
        location.href = "editar_servicio.php?codser=" + codser;
    });
     //Evento Click del botón borrar de la página listar Servicio
    $(".reg_servicio .btn_borrar").click(function(e){
        let codser = $(this).closest(".reg_servicio").children(".codser").text();
        let ser = $(this).closest(".reg_servicio").children(".prod").text();
        
        $("#md_borrar .lbl_codser").text(codser);
        $("#md_borrar .lbl_prod").text(ser);

        $("#md_borrar .btn_borrar").attr("href","../controlador/ctr_borrar_ser.php?codser=" + codser);
        $("#md_borrar").modal("show");
    });


    //evento focusout del cuadro cuando el texto del cuadro de la pagina consultar_servicio.php
    $("#frm_consultar_ser #txt_idser").focusout(function (e) {
        e.preventDefault();
        //captura el valor ingresado en el cuadro del texto 
        let codser = $(this).val();

        if (codser != "") {
            // Implementar la consulta por medio de AJAX para JQuery 
            $.ajax({
                url: "../controlador/ctr_consultar_ser.php",
                type: "POST",
                data: { codser: codser },
                success: function (rpta) {
                    console.log(rpta); // Verificar la respuesta en la consola
                    let rp = JSON.parse(rpta);

                    if (rp) {
                        $(".idser").html(rp.Id_servicios);
                        $(".nom").html(rp.Nombre);
                        $(".pre").html("s/ " + rp.Precio);
                        $(".dur").html(rp.Duracion);
                        $(".cat").html(rp.Categoria);
                        $(".est").html(rp.Estado);   
                    } else {
                        $("#txt_idser").val("");

                        let vacio = "&nbsp;";
                        $(".idser, .nom, .pre, .dur, .cat, .est").html(vacio);

                        $("#txt_idser").focus();

                        // Mostrar modal centrado
                        $("#mensaje_modal").text("El código " + codser + " no existe");
                        $("#exampleModal").modal("show");
                    }
                }
            });
        }
    });

    //----------------------------------//
    $(document).ready(function () {
        $("#form_filtrar_prod").submit(function (e) {
            e.preventDefault();

            var valor = $("#txt_valor").val();

            if (valor != "") {
                $.post("../controlador/ctr_filtrar_ser.php",
                    { valor: valor },
                    function (rpta) {
                        $("#tabla").html(rpta);
                    });
            } else {
                $("#tabla").html("");
                alert("Escriba un valor para filtrar...");
                $("#txt_valor").focus();
            }
        });
    }); 

// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

});

