<?php
    include "../includes/cargar_clases.php";

    $crudproducto = new CRUDRecursos();

    if (isset($_GET["codprod"])) {
        $codprod = $_GET["codprod"];

        $crudproducto->BorrarRegistro($codprod);

        header("location: ../vista/listar_producto.php");
    }