<?php
include "../includes/cargar_clases.php";

$crudespecialidad = new CRUDEspecialidad();

if (isset($_POST["btn_registrar_espec"])) {
    $especialidades = new Especialidad();

    $especialidades->Id_especialidad = $_POST["txt_cod_espec"];
    $especialidades->Nombre = $_POST["txt_nom_espec"];
    $especialidades->Area = $_POST["txt_area"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudespecialidad->RegistrarEspecialidad($especialidades);
    } else if ($tipo == "e") {
        // $crudespecialidad->EditarEspecialidades($especialidades);
    }
    header("location: ../vista/listar_especialidades.php");
}
