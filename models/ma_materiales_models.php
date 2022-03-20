<?php

    class ma_materiales extends conectar{

        public function get_materiales(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_materiales";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_material($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_materiales WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_material($descripcion,$unidad,$costo,$precio,$aplica_isv,$porcentaje,$estado,$id_socio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_materiales(ID,DESCRIPCION,UNIDAD,COSTO,PRECIO,APLICA_ISV,PORCENTAJE,ESTADO,ID_SOCIO)
            VALUES (NULL,?,?,?,?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $descripcion);
            $sql->bindValue(2, $unidad);
            $sql->bindValue(3, $costo);
            $sql->bindValue(4, $precio);
            $sql->bindValue(5, $aplica_isv);
            $sql->bindValue(6, $porcentaje);
            $sql->bindValue(7, $estado);
            $sql->bindValue(8, $id_socio);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_material($descripcion,$unidad,$costo,$precio,$aplica_isv,$porcentaje,$estado,$id_socio,$id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_materiales
            SET DESCRIPCION = ?, UNIDAD=?,COSTO=?,PRECIO=?,APLICA_ISV=?,PORCENTAJE=?,ESTADO=?,ID_SOCIO=?
            WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $descripcion);
            $sql->bindValue(2, $unidad);
            $sql->bindValue(3, $costo);
            $sql->bindValue(4, $precio);
            $sql->bindValue(5, $aplica_isv);
            $sql->bindValue(6, $porcentaje);
            $sql->bindValue(7, $estado);
            $sql->bindValue(8, $id_socio);
            $sql->bindValue(9, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_material($id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE FROM ma_materiales WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }

?>