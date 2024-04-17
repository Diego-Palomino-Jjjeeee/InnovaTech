<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = ".";
        $titulo = "Aplicación de Ventas";
        include("paginas/includes/cabecera.php");
    ?>
    <body>
        <?php
            include("paginas/includes/menu.php");
        ?>
        <div class="container mt-3">
            <header>
                <h1><i class="fas fa-university"></i> <?=$titulo?></h1>
                <hr/>
            </header>

            <section>
                <article>
                    <!--Carrusel-->
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Navbar</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Features</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                            </nav>
                    </div>
                </article>
            </section>
        </div>
    </body>
</html>
