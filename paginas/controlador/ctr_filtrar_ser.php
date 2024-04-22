<?php
    include "../includes/cargar_clases.php";

    $crudservicio = new CRUDServicios();

    if (isset($_POST["valor"])) {
        $valor = $_POST["valor"];

        $crudservicio->FiltrarServicios($valor);
    }