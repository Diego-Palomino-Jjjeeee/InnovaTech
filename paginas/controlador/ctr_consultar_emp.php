<?php
include '../includes/cargar_clases.php';

$crudempleado = new CRUDEmpleado();

if (isset($_POST["codemp"])) {
    $codemp = $_POST["codemp"];

    $crudempleado->ConsultarEmpleado($codemp);
}
