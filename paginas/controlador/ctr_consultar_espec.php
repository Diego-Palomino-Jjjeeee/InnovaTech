<?php
include '../includes/cargar_clases.php';

$crudespecialidad = new CRUDEspecialidad();

if (isset($_POST["txt_Id_especialidad"])) {
    $txt_Id_especialidad = $_POST["txt_Id_especialidad"];

    $crudespecialidad->ConsultarEspecialidades($txt_Id_especialidad);
}
