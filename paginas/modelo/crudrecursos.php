<?php

class CRUDRecursos extends Conexion{

    public function ListarRecursos(){
        $arr_prod = null;

        $cn = $this->Conectar();

        $sql = "call sp_ListarRecursos()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_prod = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_prod;
    }
      //Buscar recurso por codigo
    public function BuscarRecursoPorCodigo($codrec) {
        $arr_prod = null;

        $cn = $this->Conectar();

        $sql = "call sp_BuscarRecursoporCodigo(:codrec)";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":codrec", $codrec, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_prod;
    }

     //Mostrar Producto Por Codigo
     public function MostrarRecursoPorCodigo($codrec) {
        $arr_prod = null;

        $cn = $this->Conectar();

        $sql = "call sp_MostrarRecursoPorCodigo(:codrec);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":codrec", $codrec, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_prod;
    }
       //Consultar Recurso Por COdigo (JSON)
    public function ConsultarRecursoPorCodigo($codrec) {
        $arr_prod = null;

        $cn = $this->Conectar();

        $sql = "call sp_MostrarRecursoPorCodigo(:codrec);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":codrec", $codrec, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        echo json_encode($arr_prod);
    }
    //Filtrar Recurso
    public function FiltrarRecurso($valor) {
        $arr_prod = null;

        $cn = $this->Conectar();

        $sql = "call sp_FiltrarRecurso(:valor)";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);

        $snt->execute();

        $arr_prod = $snt->fetchAll(PDO::FETCH_OBJ);

        $nr = $snt->rowCount();

        if ($nr > 0) {
            echo"<table class='table table-hover table-sm table-success table-striped'>";
            echo"<tr class='table-primary'>";
            echo"<th>Id_recursos</th>";
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
                echo "<td>".$prod->Id_recursos."</td>";
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
    //Registrar Recurso
    public function RegistrarRecurso(Recurso $recurso) {
        try{
            $cn = $this->Conectar();

            $sql = "call sp_RegistrarRecurso(:idrec, :nom, :cat, :est, :fch, :cost)";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codrec", $recurso->Id_recursos);
            $snt->bindParam(":prod", $recurso->Nombre);
            $snt->bindParam(":cst",$recurso->Categoria);
            $snt->bindParam(":gnc",$recurso->Estado);
            $snt->bindParam(":codmar",$recurso->Fecha_Adquisicion);
            $snt->bindParam(":codcat",$recurso->Costo);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
     //Editar Recurso
     public function EditarRecurso(Recurso $recurso) {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_EditarRegistro(:idrec, :nom, :cat, :est, :fch, :cost)";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codrec", $recurso->Id_recursos);
            $snt->bindParam(":prod", $recurso->Nombre);
            $snt->bindParam(":cst",$recurso->Categoria);
            $snt->bindParam(":gnc",$recurso->Estado);
            $snt->bindParam(":codmar",$recurso->Fecha_Adquisicion);
            $snt->bindParam(":codcat",$recurso->Costo);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
         //Borrar Recurso

         public function BorrarRegistro($codrec) {
            try {
                $cn = $this->Conectar();

                $sql = "call sp_BorrarRecurso(:codrec)";

                $snt = $cn->prepare($sql);

                $snt->bindParam(":codrec", $codrec);

                $snt->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }

        }

}