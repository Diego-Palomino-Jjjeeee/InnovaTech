<?php
include "../includes/cargar_clases.php";

$crudrecurso = new CRUDRecurso();

if (isset($_POST["id_recurso"])) {
    $id_recurso = $_POST["id_recurso"];

    $crudrecurso->ConsultarRecursoPorId($id_recurso);
}
?>
