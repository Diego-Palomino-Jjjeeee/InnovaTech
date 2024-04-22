<?php
    include "../includes/cargar_clases.php";

    $crudempleado = new CRUDEmpleado();

    if(isset($_POST["btn_registrar_emp"])) {
        $empleado = new Empleado();

        $empleado->DNI = $_POST["txt_dni"];
        $empleado->Nombre = $_POST["txt_nom"];
        $empleado->Direccion = $_POST["txt_dir"];
        $empleado->Telefono = $_POST["txt_tel"];
        $empleado->Email = $_POST["txt_ema"];
        $empleado->Sueldo = $_POST["txt_sue"];
        $empleado->Estado_civil = $_POST["txt_est"];

        $tipo = $_POST["txt_tipo"];

        if ($tipo == "r")
            $crudempleado->RegistrarEmpleado($empleado);
        else if ($tipo == "e")
            $crudempleado->EditarEmpleado($empleado);

        header("location: ../vista/listar_empleado.php");
    }