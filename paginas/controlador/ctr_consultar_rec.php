<?php
    include "../includes/cargar_clases.php";

    $crudproducto = new CRUDRecursos();

    if (isset($_POST["codrec"])) {
        $codprod = $_POST["codrec"];

        $crudproducto->ConsultarRecursoPorCodigo($codprod);

    
    }

    $crudservicio = new CRUDServicios();
    if (isset($_POST["codser"])) {
        $codser = $_POST["codser"];

        $crudservicio->ConsultarServiciosPorCodigo($codser);

    
    }