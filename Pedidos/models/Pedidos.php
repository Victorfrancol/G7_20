<?php
         class Pedidos extends Conectar{

            public function get_pedidos(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql= "SELECT * FROM ma_pedidos ";
            $sql=$conectar ->prepare($sql);
            $sql-> execute();
            return $resultado= $sql-> fetchAll(PDO::FETCH_ASSOC);
            }

            public function get_pedido($ID){
            $conectar=parent::conexion();
            parent::set_names();
            $sql= "SELECT * FROM ma_pedidos WHERE ID =?";
            $sql=$conectar ->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql-> execute();
            return $resultado= $sql-> fetchAll(PDO::FETCH_ASSOC);
         }

        public function insert_pedido($ID_SOCIO,$FECHA_PEDIDO,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL,$FECHA_ENTREGA){
            $conectar=parent::conexion();
            parent::set_names();
            $sql= "INSERT INTO ma_pedidos(ID,ID_SOCIO,FECHA_PEDIDO,DETALLE,SUB_TOTAL,TOTAL_ISV,TOTAL,FECHA_ENTREGA,ESTADO)
            VALUES(NULL,?,?,?,?,?,?,?,'P');";
            $sql=$conectar ->prepare($sql);
            $sql->bindValue(1, $ID_SOCIO);
            $sql->bindValue(2, $FECHA_PEDIDO);
            $sql->bindValue(3, $DETALLE);
            $sql->bindValue(4, $SUB_TOTAL);
            $sql->bindValue(5, $TOTAL_ISV);
            $sql->bindValue(6, $TOTAL);
            $sql->bindValue(7, $FECHA_ENTREGA);
            $sql->execute();
            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        }   

        public function delete_pedido($ID){
            $conectar=parent::conexion();
            parent::set_names();
            $sql= "DELETE FROM ma_pedidos WHERE ID =?";
            $sql=$conectar ->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql-> execute();
            return $resultado= $sql-> fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_pedido($ID,$ID_SOCIO,$FECHA_PEDIDO,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL,$FECHA_ENTREGA, $ESTADO){
            $conectar=parent ::conexion();
            parent::set_names();
            $sql= "UPDATE ma_pedidos SET ID_SOCIO=?, FECHA_PEDIDO=?, DETALLE=?, SUB_TOTAL=?, TOTAL_ISV=? ,TOTAL=?, FECHA_ENTREGA=?, ESTADO=? WHERE ID=?;";
            $sql=$conectar ->prepare($sql);
            $sql->bindValue(1, $ID_SOCIO);
            $sql->bindValue(2, $FECHA_PEDIDO);
            $sql->bindValue(3, $DETALLE);
            $sql->bindValue(4, $SUB_TOTAL);
            $sql->bindValue(5, $TOTAL_ISV);
            $sql->bindValue(6, $TOTAL);
            $sql->bindValue(7, $FECHA_ENTREGA);
            $sql->bindValue(8, $ESTADO);
            $sql->bindValue(9, $ID);
            $sql->execute();
            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    
        

    }
?>