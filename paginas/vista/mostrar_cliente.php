<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Información del Cliente";
include("../includes/cabecera.php"); 
?>
<body>
<?php 
include("../includes/menu.php"); 
include "../includes/cargar_clases.php";

if(isset($_GET["codcli"])){    
    $codcliente = $_GET["codcli"];

    $crudcliente = new CRUDCliente();             

    $cliente = $crudcliente->BuscarClientePorCodigo($codcliente);

    if(empty($cliente)){
        header("location:listar_cliente.php");
    }
}else{
    header("location:listar_cliente.php");
}
?>
<div class="container mt-3">
    <header>
        <h1 class="text-info">
            <i class="fas fa-info-circle"></i> Información del Cliente</h1>
        <hr/>
    </header>

    <nav>
        <a href="listar_cliente.php" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-circle-left"></i> Regresar
        </a>
    </nav>

    <section>
        <article>
            <div class="row justify-content-center mt-3">
                <div class="card col-md-6">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <h5 class="card-title">Código</h5>
                                <p class="card-text"><?= $cliente->codigo_cliente ?></p>    
                            </div>
                            
                            <div class="col-md-6">
                                <h5 class="card-title">Nombre</h5>
                                <p class="card-text"><?= $cliente->nombre ?></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Ap. Paterno</h5>
                                <p class="card-text"><?= $cliente->ap_paterno ?></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Ap. Materno</h5>
                                <p class="card-text"><?= $cliente->ap_materno ?></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Fecha de Nacimiento</h5>
                                <p class="card-text"><?= $cliente->fecha_nacimiento ?></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Dirección</h5>
                                <p class="card-text"><?= $cliente->direccion ?></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Correo Electrónico</h5>
                                <p class="card-text"><?= $cliente->correo_electronico ?></p>       
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Distrito</h5>
                                <p class="card-text"><?= $cliente->distrito_nombre ?></p>       
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </article>
    </section>

    <?php
    include("../includes/pie.php");
    ?>
</div>
</body>
</html>
