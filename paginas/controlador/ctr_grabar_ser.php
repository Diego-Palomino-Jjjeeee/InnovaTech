<?php
    include "../includes/cargar_clases.php";

    $crudservicio = new CRUDServicios();

    if(isset($_POST["btn_registrar_ser"])) {
        $recurso = new Servicios();

        $recurso->Id_servicios = $_POST["txt_idser"];
        $recurso->Nombre = $_POST["txt_nom"];
        $recurso->Precio = $_POST["txt_pre"];
        $recurso->Duracion = $_POST["txt_dur"];
        $recurso->Categoria = $_POST["txt_cat"];
        $recurso->Estado = $_POST["txt_est"];

        $tipo = $_POST["txt_tipo"];

        if ($tipo == "r")
            $crudservicio->RegistrarServicios($recurso);
        
        else if ($tipo == "e")
            $crudservicio->EditarServicios($recurso);

        header("location: ../vista/listar_servicio.php");
    }