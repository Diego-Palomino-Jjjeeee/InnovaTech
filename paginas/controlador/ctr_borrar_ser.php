<?php
    include "../includes/cargar_clases.php";

    $crudservicio = new CRUDServicios();

    if (isset($_GET["codser"])) {
        $codprod = $_GET["codser"];

        $crudservicio->BorrarServicio($codprod);

        header("location: ../vista/listar_servicio.php");
    }