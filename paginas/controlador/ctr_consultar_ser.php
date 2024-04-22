<?php
    include "../includes/cargar_clases.php";

    $crudservicio = new CRUDServicios();
    if (isset($_POST["codser"])) {
        $codser = $_POST["codser"];

        $crudservicio->ConsultarServiciosPorCodigo($codser);

    
    }