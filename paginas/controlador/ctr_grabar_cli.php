<?php
include "../includes/cargar_clases.php";

$crudcliente = new CRUDCliente();

if (isset($_POST["btn_registrar_cli"])) {
    $cliente = new Cliente();

    $tipo = isset($_POST["txt_tipo"]) ? $_POST["txt_tipo"] : "";

    // Verificar si las claves de matriz están definidas antes de acceder a ellas
    $cliente->codigo_cliente = isset($_POST["txt_codigo_cliente"]) ? $_POST["txt_codigo_cliente"] : "";
    $cliente->nombre = isset($_POST["txt_nombre"]) ? $_POST["txt_nombre"] : "";
    $cliente->ap_paterno = isset($_POST["txt_ap_paterno"]) ? $_POST["txt_ap_paterno"] : "";
    $cliente->ap_materno = isset($_POST["txt_ap_materno"]) ? $_POST["txt_ap_materno"] : "";
    $cliente->fecha_nacimiento = isset($_POST["txt_fecha_nacimiento"]) ? $_POST["txt_fecha_nacimiento"] : "";
    $cliente->direccion = isset($_POST["txt_direccion"]) ? $_POST["txt_direccion"] : "";
    $cliente->correo_electronico = isset($_POST["txt_correo_electronico"]) ? $_POST["txt_correo_electronico"] : "";
    $cliente->distrito_nombre = isset($_POST["distrito_nombre"]) ? $_POST["distrito_nombre"] : "";

    if ($tipo == "r") {
        $crudcliente->RegistrarCliente($cliente);
    } else if ($tipo == "e") {
        $crudcliente->EditarCliente($cliente);
    }

    header("location: ../vista/listar_cliente.php");
    exit();
}

?>
