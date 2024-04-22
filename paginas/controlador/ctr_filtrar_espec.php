<?php
include "../includes/cargar_clases.php";

$crudespecialidad = new CRUDEspecialidad();

if (isset($_POST["valor"])) {
    $valor = $_POST["valor"];

    $crudespecialidad->FiltrarEspecialidad($valor);
}
