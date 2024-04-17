<?php
    include "../includes/cargar_clases.php";

    $crudproducto = new CRUDRecursos();

    if(isset($_POST["btn_registrar_rec"])) {
        $producto = new Recurso();

        $producto->Id_recursos = $_POST["txt_codprod"];
        $producto->Nombre = $_POST["txt_prod"];
        $producto->Categoria = $_POST["txt_stk"];
        $producto->Fecha_Adquisicion = $_POST["txt_cst"];
        $producto->Costo = $_POST["txt_gnc"] / 100;

        $tipo = $_POST["txt_tipo"];

        if ($tipo == "r")
            $crudproducto->RegistrarRecurso($producto);
        else if ($tipo == "e")
            $crudproducto->EditarRecurso($producto);

        header("location: ../vista/listar_producto.php");
    }