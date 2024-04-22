<?php

class CRUDServicios extends Conexion{

    public function ListarServicios(){
        $arr_prod = null;

        $cn = $this->Conectar();

        $sql = "call sp_ListarServicios()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_prod = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_prod;
    }
      //Buscar Servicios por codigo
    public function BuscarServiciosPorCodigo($codprod) {
        $arr_prod = null;

        $cn = $this->Conectar();

        $sql = "call sp_BuscarServiciosporCodigo(:codprod)";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":codprod", $codprod, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_prod;
    }

     //Mostrar Producto Por Codigo
     public function MostrarServiciosPorCodigo($codser) {
        $arr_prod = null;

        $cn = $this->Conectar();

        $sql = "call sp_MostrarServiciosPorCodigo(:codser);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":codser", $codser, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_prod;
    }
       //Consultar Servicios Por COdigo (JSON)
    public function ConsultarServiciosPorCodigo($codser) {
        $arr_prod = null;

        $cn = $this->Conectar();

        $sql = "call sp_MostrarServiciosPorCodigo(:codser);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":codser", $codser, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return json_encode($arr_prod);
    }
    //Filtrar Servicios
    public function FiltrarServicios($valor) {
        $arr_prod = null;

        $cn = $this->Conectar();

        $sql = "call sp_FiltrarServicios(:valor)";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);

        $snt->execute();

        $arr_prod = $snt->fetchAll(PDO::FETCH_OBJ);

        $nr = $snt->rowCount();

        if ($nr > 0) {
            echo"<table class='table table-hover table-sm table-success table-striped'>";
            echo"<tr class='table-primary'>";
            echo"<th>Id_servicios</th>";
            echo"<th>Nombre</th>";
            echo"<th>Precio</th>";
            echo"<th>Duracion</th>";
            echo"<th>Categoria</th>";
            echo"<th> Estado</th>";
            echo "</tr>";

            $i = 0; // Contador del numero de registro

            foreach ($arr_prod as $prod) {
                $i++;

                echo "<tr>";
                echo "<td>".$prod->Id_servicios."</td>";
                echo "<td>".$prod->Nombre."</td>";
                echo "<td class='text-center'>".$prod->Precio."</td>";
                echo "<td>S/ ".$prod->Duracion."</td>";
                echo "<td class='text-center'>".$prod->Categoria."</td>";
                echo "<td>S/ ".$prod->Estado."</td>";
                echo "</td>";
            }
            echo "</table";
        }
        else {
            echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
            echo "No existen registros.";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
            echo "</div>";
        }

        $cn = null;
    }
    //Registrar Servicios
    public function RegistrarServicios(Servicios $Servicios) {
        try{
            $cn = $this->Conectar();

            $sql = "call sp_RegistrarServicios(:idser, :nom, :pre, :dur, :cat, :est)";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":idser", $Servicios->Id_servicios);
            $snt->bindParam(":nom", $Servicios->Nombre);
            $snt->bindParam(":pre",$Servicios->Precio);
            $snt->bindParam(":dur",$Servicios->Duracion);
            $snt->bindParam(":cat",$Servicios->Categoria);
            $snt->bindParam(":est",$Servicios->Estado);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
     //Editar Servicios
     public function EditarServicios(Servicios $Servicios) {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_EditarServicios(:idser, :nom, :pre, :dur, :cat, :est)";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":idser", $Servicios->Id_servicios);
            $snt->bindParam(":nom", $Servicios->Nombre);
            $snt->bindParam(":pre",$Servicios->Precio);
            $snt->bindParam(":dur",$Servicios->Duracion);
            $snt->bindParam(":cat",$Servicios->Categoria);
            $snt->bindParam(":est",$Servicios->Estado);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
         //Borrar Servicios

         public function BorrarServicio($codprod) {
            try {
                $cn = $this->Conectar();

                $sql = "call sp_BorrarServicios(:codprod)";

                $snt = $cn->prepare($sql);

                $snt->bindParam(":codprod", $codprod);

                $snt->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }

        }

}