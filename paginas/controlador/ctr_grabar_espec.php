<?php
include "../includes/cargar_clases.php";

$crudespecialidad = new CRUDEspecialidad();

if (isset($_POST["btn_registrar_espec"])) {
    $especialidades = new Especialidad();

    $especialidades->Id_especialidad = $_POST["txt_codigo"];
    $especialidades->Nombre = $_POST["txt_nombre"];
    $especialidades->Area = $_POST["txt_area"];

    $tipo = $_POST["txt_tipo"];
    $Id_especialidad = $_POST["txt_codigo"];

    if ($tipo == "r") {
        $crudespecialidad->RegistrarEspecialidad($especialidades);
    } else if ($tipo == "e") {
        $crudespecialidad->EditarEspecialidad($especialidades, $Id_especialidad);
    }
    header("location: ../vista/listar_especialidades.php");
}
