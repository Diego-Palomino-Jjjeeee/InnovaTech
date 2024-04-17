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

        //Mostrar Empleado
        public function MostrarEmpleado($codemp) {
            $arr_emp = null;

            $cn = $this->Conectar();

            $sql = "call sp_MostrarEmpleado(:codemp);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codemp", $codemp, PDO::PARAM_STR);

            $snt->execute();

            $nr = $snt->rowCount();

            if ($nr > 0) {
                $arr_emp = $snt->fetch(PDO::FETCH_OBJ);
            }

            $cn = null;

            return $arr_emp;
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
    }