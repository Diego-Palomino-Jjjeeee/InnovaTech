<?php
class CRUDRecurso extends Conexion
{
    // Listar Recurso
    public function ListarRecurso()
    {
        $arr_recursos = null;
        $cn = $this->Conectar();
        $sql = "CALL sp_ListarRecurso()";
        $snt = $cn->prepare($sql);
        $snt->execute();
        $arr_recursos = $snt->fetchAll(PDO::FETCH_OBJ);
        $cn = null;
        return $arr_recursos;
    }

    // Buscar recurso por ID
    public function BuscarRecursoPorId($id)
    {
        $recurso = null;
        $cn = $this->Conectar();
        $sql = "CALL sp_BuscarRecursoPorId(:id)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":id", $id, PDO::PARAM_INT);
        $snt->execute();
        $rowCount = $snt->rowCount();
        if ($rowCount > 0) {
            $recurso = $snt->fetch(PDO::FETCH_OBJ);
        }
        $cn = null;
        return $recurso;
    }

    // Registrar Recurso
    public function RegistrarRecurso(Recurso $recurso)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_RegistrarRecurso(:id, :nombre, :categoria, :estado, :fecha_adquisicion, :costo)";
            $stmt = $cn->prepare($sql);
            $stmt->bindParam(":id", $recurso->Id_recursos);
            $stmt->bindParam(":nombre", $recurso->Nombre);
            $stmt->bindParam(":categoria", $recurso->Categoria);
            $stmt->bindParam(":estado", $recurso->Estado);
            $stmt->bindParam(":fecha_adquisicion", $recurso->Fecha_Adquisicion);
            $stmt->bindParam(":costo", $recurso->Costo);
            $stmt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }


    // Editar Recurso
    public function EditarRecurso(Recurso $recurso)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_EditarRecurso(:id, :nombre, :categoria, :estado, :fecha_adquisicion, :costo)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":id", $recurso->Id_recursos);
            $snt->bindParam(":nombre", $recurso->Nombre);
            $snt->bindParam(":categoria", $recurso->Categoria);
            $snt->bindParam(":estado", $recurso->Estado);
            $snt->bindParam(":fecha_adquisicion", $recurso->Fecha_Adquisicion);
            $snt->bindParam(":costo", $recurso->Costo);

            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }


    // Borrar Recurso
    public function BorrarRecurso($id)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_BorrarRecurso(:id)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":id", $id, PDO::PARAM_INT);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function MostrarRecursoPorId($id_recurso) {
        $arr_recurso = null;
        $conexion = new Conexion();
        $conn = $conexion->conectar();
    
        $sql = "CALL ConsultarRecursoPorId(:id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_recurso);
        $stmt->execute();
    
        $nr = $stmt->rowCount();
        if ($nr > 0) {
            $arr_recurso = $stmt->fetch(PDO::FETCH_OBJ);
        }
        $conexion = null;
        return $arr_recurso;
    }

    public function FiltrarRecurso($valor)
{
    try {
        $arr_recursos = null;
        $cn = $this->Conectar();
        $sql = "CALL sp_FiltrarRecurso(:valor)";
        $stmt = $cn->prepare($sql);
        $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
        $stmt->execute();
        $arr_recursos = $stmt->fetchAll(PDO::FETCH_OBJ);
        $num_rows = $stmt->rowCount();
        if ($num_rows > 0) {
            echo "<table class='table table-hover table-sm table-success table-striped'>";
            echo "<tr class='table-primary'>";
            echo "<th>No</th>";
            echo "<th>ID Recurso</th>";
            echo "<th>Nombre</th>";
            echo "<th>Categoría</th>";
            echo "<th>Estado</th>";
            echo "<th>Fecha Adquisición</th>";
            echo "<th>Costo</th>";
            echo "</tr>";

            $i = 0;

            foreach ($arr_recursos as $recurso) {
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$recurso->Id_recursos."</td>";
                echo "<td>".$recurso->Nombre."</td>";
                echo "<td>".$recurso->Categoria."</td>";
                echo "<td>".$recurso->Estado."</td>";
                echo "<td>".$recurso->Fecha_Adquisicion."</td>";
                echo "<td>".$recurso->Costo."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
            echo "No existen registros";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>&times;</button>";
            echo "</div>";
        }
        $cn = null;
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
}

public function ConsultarRecursoPorId($id_recurso)
{
    try {
        $arr_recurso = null;
        $cn = $this->Conectar();
        $sql = "CALL sp_BuscarRecursoPorId(:id_recurso)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":id_recurso", $id_recurso, PDO::PARAM_INT);
        $snt->execute();
        $nr = $snt->rowCount();
        if ($nr > 0) {
            $arr_recurso = $snt->fetch(PDO::FETCH_OBJ);
        }
        $cn = null;
        echo json_encode($arr_recurso);
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
}

    
}

?>
