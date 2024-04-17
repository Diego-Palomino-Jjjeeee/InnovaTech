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

        echo json_encode($arr_prod);
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
            echo"<th>Id_Servicios</th>";
            echo"<th>Nombre</th>";
            echo"<th>Categoria</th>";
            echo"<th>Estado</th>";
            echo"<th>Fecha_Adquisicion</th>";
            echo"<th> Costo</th>";
            echo "</tr>";

            $i = 0; // Contador del numero de registro

            foreach ($arr_prod as $prod) {
                $i++;

                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$prod->Id_Servicios."</td>";
                echo "<td>".$prod->Nombre."</td>";
                echo "<td class='text-center'>".$prod->Categoria."</td>";
                echo "<td>S/ ".$prod->Estado."</td>";
                echo "<td class='text-center'>".$prod->Fecha_Adquisicion."</td>";
                echo "<td>S/ ".$prod->Costo."</td>";
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

            $sql = "call sp_RegistrarServicios(:idrec, :nom, :cat, :est, :fch, :cost)";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codprod", $Servicios->Id_servicios);
            $snt->bindParam(":prod", $Servicios->Nombre);
            $snt->bindParam(":cst",$Servicios->Precio);
            $snt->bindParam(":gnc",$Servicios->Duracion);
            $snt->bindParam(":codmar",$Servicios->Categoria);
            $snt->bindParam(":codcat",$Servicios->Estado);

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

            $sql = "call sp_EditarRegistro(:idrec, :nom, :cat, :est, :fch, :cost)";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codprod", $Servicios->Id_servicios);
            $snt->bindParam(":prod", $Servicios->Nombre);
            $snt->bindParam(":cst",$Servicios->Precio);
            $snt->bindParam(":gnc",$Servicios->Duracion);
            $snt->bindParam(":codmar",$Servicios->Categoria);
            $snt->bindParam(":codcat",$Servicios->Estado);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
         //Borrar Servicios

         public function BorrarRegistro($codprod) {
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