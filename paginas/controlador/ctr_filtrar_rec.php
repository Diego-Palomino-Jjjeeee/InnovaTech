<?php
    include "../includes/cargar_clases.php";

    $crudproducto = new CRUDRecursos();

    if (isset($_POST["valor"])) {
        $valor = $_POST["valor"];

        $crudproducto->FiltrarRecurso($valor);
    }