
//Iniciar los envetos en JQuery
$(function(){
    //Define los eventos a trabajar en la pagina

    //Evento click del boton mostrar de la pagina listar_producto.php
    $(".reg_producto .btn_mostrar").click(function(e) {
        let codrec = $(this).closest(".reg_producto").children(".codrec").text();

        location.href = "mostrar_recurso.php?codrec=" + codrec;
    });
     //Evento click del boton mostrar de la pagina listar_producto.php
     $(".reg_servicio .btn_mostrar").click(function(e) {
        let codser = $(this).closest(".reg_servicio").children(".codser").text();

        location.href = "mostrar_servicio.php?codser=" + codser;
    });
});

$("#frm_consultar_espec #txt_Id_especialidad").focusout(function (e) {

    e.preventDefault();
    let txt_Id_especialidad = $(this).val();

    if (txt_Id_especialidad != "") {
        $.ajax({
            url: "../controlador/ctr_consultar_esp.php",
            type: "POST",
            data: { txt_Id_especialidad: txt_Id_especialidad },
            success: function (rpta) {
                let rp = JSON.parse(rpta);

                if (rp) {
                    $(".nom").html(rp.Nombre);
                    $(".are").html(rp.Area);
                } else {
                    alert("El código " + codprod + " no existe");

                    $("#txt_Id_especialidad").val("");

                    let vacio = "&nbsp;";

                    $(".nom").html(vacio);
                    $(".are").html(vacio);

                    $("#txt_Id_especialidad").focus();
                }
            }
        });
    }

    // Luis
    $(".reg_cliente .btn_mostrar").click(function(e) {
        e.preventDefault();
        let codcliente = $(this).closest(".reg_cliente").find(".codcliente").text();
        location.href = "mostrar_cliente.php?codcliente=" + codcliente;
    });

    // Empleado
//Evento click del boton mostrar de la pagina listar_empleado.php
$(".reg_emp .btn_mostrar").click(function(e) {
    let codemp = $(this).closest(".reg_emp").children(".codemp").text();

    location.href = "mostrar_empleado.php?codemp=" + codemp;
});

});