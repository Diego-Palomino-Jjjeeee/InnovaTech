<?php
// Verificar si se recibieron los datos del formulario
if (isset($_POST['btn_registrar_cliente'])) {
    // Incluir la conexión a la base de datos y la clase CRUDCliente
    include_once "../modelo/conexion.php";
    include_once "../modelo/CRUDCliente.php";

    // Crear una instancia de la clase CRUDCliente
    $crudcliente = new CRUDCliente();

    // Obtener los datos del formulario y limpiarlos
    $codigo = trim($_POST['txt_codcliente']);
    $nombre = trim($_POST['txt_nom']);
    $ap_paterno = trim($_POST['txt_apaterno']);
    $ap_materno = trim($_POST['txt_amaterno']);
    $fecha_nacimiento = trim($_POST['txt_fecha_nacimiento']);
    $direccion = trim($_POST['txt_direccion']);
    $correo_electronico = trim($_POST['txt_correo']);
    // Puedes obtener los demás campos del formulario de manera similar
    
    // Validar que los campos obligatorios no estén vacíos
    if (empty($nombre) || empty($ap_paterno) || empty($direccion)) {
        // Mostrar un mensaje de error si algún campo obligatorio está vacío
        echo "Error: Los campos Nombre, Apellido Paterno y Dirección son obligatorios.";
        exit();
    }

    // Llamar al método para insertar el cliente en la base de datos
    try {
        $resultado = $crudcliente->RegistrarCliente($codigo, $nombre, $ap_paterno, $ap_materno, $fecha_nacimiento, $direccion, $correo_electronico);

        // Verificar si la operación fue exitosa
        if ($resultado) {
            // Redireccionar a la página de listar clientes o a donde desees
            header("Location: listar_cliente.php");
            exit();
        } else {
            // Mostrar un mensaje de error si ocurrió algún problema durante el registro
            echo "Error: No se pudo registrar el cliente.";
            exit();
        }
    } catch (Exception $e) {
        // Mostrar un mensaje de error detallado en caso de excepción
        echo "Error al registrar el cliente: " . $e->getMessage();
        exit();
    }
} else {
    // Si no se recibieron los datos del formulario, redireccionar a alguna página de error
    header("Location: error.php");
    exit();
}
?>
