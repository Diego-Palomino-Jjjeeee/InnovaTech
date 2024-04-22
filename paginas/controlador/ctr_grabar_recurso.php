<?php
include "../includes/cargar_clases.php";

$crudrecurso = new CRUDRecurso();

if (isset($_POST["btn_registrar_recurso"])) {
    $recurso = new Recurso();

    $recurso->Id_recursos = $_POST["txt_id_recurso"];
    $recurso->Nombre = $_POST["txt_nombre"];
    $recurso->Categoria = $_POST["txt_categoria"];
    $recurso->Estado = $_POST["txt_estado"];
    $recurso->Fecha_Adquisicion = $_POST["txt_fecha_adquisicion"];
    $recurso->Costo = $_POST["txt_costo"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudrecurso->RegistrarRecurso($recurso);
    } else if ($tipo == "e") {
        $crudrecurso->EditarRecurso($recurso); // Aquí se pasa solo $recurso
    }
    header("location: ../vista/listar_recurso.php");
}
?>
