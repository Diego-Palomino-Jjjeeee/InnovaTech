<?php
include "../includes/cargar_clases.php";

$crudespecialidad = new CRUDEspecialidad();

if (isset($_GET["txt_codigo"])) {
    $codespec = $_GET["txt_codigo"];

    $crudespecialidad->BorrarEspecialidad($codespec);

    header("location: ../vista/listar_especialidades.php");
}
