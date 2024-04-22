<?php
    class CRUDEmpleado extends Conexion {

        //Listar Empleado
        public function ListarEmpleado() {
            $arr_emp = null;

            $cn = $this->Conectar();

            $sql = "call sp_ListarEmpleado()";

            $snt = $cn->prepare($sql);

            $snt->execute();

            $arr_emp = $snt->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_emp;

        }

        // Buscar Empleado
        public function BuscarEmpleado($codemp) {
                $arr_emp = null;

                $cn = $this->Conectar();

                $sql = "call sp_BuscarEmpleado(:codemp)";

                $snt = $cn->prepare($sql);

                $snt->bindParam(":codemp", $codemp, PDO::PARAM_STR, 8);

                $snt->execute();

                $nr = $snt->rowCount();
                
                if ($nr > 0) {
                    $arr_emp = $snt->fetch(PDO::FETCH_OBJ);
                }
                $cn = null;

                return $arr_emp;
            }
        

        //Mostrar Empleado
        public function MostrarEmpleado($codemp) {
            $arr_emp = null;

            $cn = $this->Conectar();

            $sql = "call sp_MostrarEmpleado(:codemp);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codemp", $codemp, PDO::PARAM_STR, 8);

            $snt->execute();

            $nr = $snt->rowCount();

            if ($nr > 0) {
                $arr_emp = $snt->fetch(PDO::FETCH_OBJ);
            }

            $cn = null;

            return $arr_emp;
        }

        //Consultar Empleado por Codigo (JSON)
        public function ConsultarEmpleado($codemp) {
            $arr_emp = null;

            $cn = $this->Conectar();

            $sql = "call sp_MostrarEmpleado(:codemp);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codemp", $codemp, PDO::PARAM_STR, 8);

            $snt->execute();

            $nr = $snt->rowCount();

            if ($nr > 0) {
                $arr_emp = $snt->fetch(PDO::FETCH_OBJ);
            }

            $cn = null;

            echo json_encode($arr_emp);
        }

        public function FiltrarEmpleado($valor)
    {
        $arr_emp = null;

        $cn = $this->Conectar();

        $sql = "call sp_FiltrarEmpleado(:valor)";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);

        $snt->execute();

        $arr_emp = $snt->fetchAll(PDO::FETCH_OBJ);

        $nr = $snt->rowCount();

        if ($nr > 0) {
            echo "<table class='table table-hover table-sm table-success table-striped'>";
            echo "<tr class='table-primary'>";
            echo "<th>N°</th>";
            echo "<th>DNI</th>";
            echo "<th>Nombre</th>";
            echo "<th>Dirección</th>";
            echo "<th>Teléfono</th>";
            echo "<th>Email</th>";
            echo "<th>Sueldo</th>";
            echo "<th>Estado Civil</th>";
            echo "</tr>";

            $i = 0;// Contador del numero de registros

            foreach ($arr_emp as $emp) {
                $i++;
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>$emp->codemp</td>";
                echo "<td>$emp->nom</td>";
                echo "<td class='text-center'>$emp->dir</td>";
                echo "<td>$emp->tel</td>";
                echo"<td>$emp->ema</td>";
                echo "<td>S/. $emp->sue</td>";
                echo "<td>$emp->est</td>";
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
    }

        //Registrar Empleado
        public function RegistrarEmpleado(Empleado $empleado) {
            try{
                $cn = $this->Conectar();

                $sql = "call sp_RegistrarEmpleado(:dni, :nom, :dir, :tel, :ema, :sue, :est)";

                $snt = $cn->prepare($sql);

                $snt->bindParam(":dni", $empleado->DNI);
                $snt->bindParam(":nom", $empleado->Nombre);
                $snt->bindParam(":dir", $empleado->Direccion);
                $snt->bindParam(":tel", $empleado->Telefono);
                $snt->bindParam(":ema", $empleado->Email);
                $snt->bindParam(":sue", $empleado->Sueldo);
                $snt->bindParam(":est", $empleado->Estado_civil);

                $snt->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }

        //Editar Empleado
        public function EditarEmpleado(Empleado $empleado) {
            try{
                $cn = $this->Conectar();

                $sql = "call sp_EditarEmpleado(:codemp, :nom, :dir, :tel, :ema, :sue, :est)";

                $snt = $cn->prepare($sql);

                $snt->bindParam(":codemp", $empleado->DNI);
                $snt->bindParam(":nom", $empleado->Nombre);
                $snt->bindParam(":dir", $empleado->Direccion);
                $snt->bindParam(":tel", $empleado->Telefono);
                $snt->bindParam(":ema", $empleado->Email);
                $snt->bindParam(":sue", $empleado->Sueldo);
                $snt->bindParam(":est", $empleado->Estado_civil);

                $snt->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }

        // Borrar Empleado
        public function BorrarEmpleado($codemp) {
            try{
                $cn = $this->Conectar();

                $sql = "call sp_BorrarEmpleado(:codemp)";

                $snt = $cn->prepare($sql);

                $snt->bindParam(":codemp", $codemp); 

                $snt->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
    }
    