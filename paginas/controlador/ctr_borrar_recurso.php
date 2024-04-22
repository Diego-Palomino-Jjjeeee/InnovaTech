<?php
include "../includes/cargar_clases.php";

$crudrecurso = new CRUDRecurso();

if (isset($_GET["id_recurso"])) {
    $id_recurso = $_GET["id_recurso"];

    $crudrecurso->BorrarRecurso($id_recurso);

    header("location: ../vista/listar_recurso.php");
}
?>
