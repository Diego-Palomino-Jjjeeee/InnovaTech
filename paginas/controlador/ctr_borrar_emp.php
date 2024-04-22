<?php
    include "../includes/cargar_clases.php";

    $crudempleado = new CRUDEmpleado();

    if (isset($_GET["codemp"])) {
        $codemp = $_GET["codemp"];

        $crudempleado->BorrarEmpleado($codemp);

        header("location: ../vista/listar_empleado.php");
    }