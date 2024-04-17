<?php
    include "../includes/cargar_clases.php";

    $crudemp = new CRUDEmpleado();

    if(isset($_POST["btn_registrar_emp"])) {
        $emp = new Empleado();

        $emp->DNI = $_POST["txt_dni"];
        $emp->Nombre = $_POST["txt_nom"];
        $emp->Direccion = $_POST["txt_dir"];
        $emp->Telefono = $_POST["txt_tel"];
        $emp->Email = $_POST["txt_ema"];
        $emp->Sueldo = $_POST["txt_sue"];
        $emp->Estado_civil = $_POST["txt_est"];

        $tipo = $_POST["txt_tipo"];

        if ($tipo == "r")
            $crudemp->RegistrarEmpleado($emp);
        else if ($tipo == "e")
            $crudemp->EditarEmpleado($emp);

        header("location: ../vista/listar_empleado.php");
    }