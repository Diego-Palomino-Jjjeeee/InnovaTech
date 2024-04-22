<?php
include "../includes/cargar_clases.php";

$crudrecurso = new CRUDRecurso();

if (isset($_POST["valor"])) {
    $valor = $_POST["valor"];

    $crudrecurso->FiltrarRecurso($valor);
}
?>
