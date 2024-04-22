<?php
include "../includes/cargar_clases.php";

$crudcliente = new CRUDCliente();

if (isset($_POST["codcli"])) {
    $codcli = $_POST["codcli"];

    // Mensaje de depuración para verificar que se recibió el código de cliente
    error_log("Código de cliente recibido: " . $codcli);

    $cliente = $crudcliente->ConsultarClientePorCodigo($codcli);

    // Mensaje de depuración para verificar el resultado de la consulta
    error_log("Cliente consultado: " . json_encode($cliente));

    // Si el cliente existe, devolver sus datos como JSON
    if ($cliente) {
        echo json_encode($cliente);
    } else {
        echo json_encode(null); // Devolver null si el cliente no existe
    }
}

?>

