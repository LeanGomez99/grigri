<?php

require_once 'MySQL.php';
require_once 'Item.php';

class Servicio extends Item {

	private $_idServicio;
	private $_idItem;
	private $_descripcion;	

    /**
     * @return mixed
     */
    public function getIdServicio()
    {
        return $this->_idServicio;
    }

    /**
     * @param mixed $_idServicio
     *
     * @return self
     */
    public function setIdServicio($_idServicio)
    {
        $this->_idServicio = $_idServicio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdItem()
    {
        return $this->_idItem;
    }

    /**
     * @param mixed $_idItem
     *
     * @return self
     */
    public function setIdItem($_idItem)
    {
        $this->_idItem = $_idItem;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * @param mixed $_descripcion
     *
     * @return self
     */
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

    public function guardar() {
        parent::guardar();

        $sql = "INSERT INTO servicio (id_servicio ,id_item ,descripcion) VALUES (NULL, '$this->_idItem','$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idServicio = $idInsertado;
    }

    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE servicio SET id_item = '$this->_idItem , descripcion = '$this->_descripcion' WHERE id_servicio ='$this->_idServicio'";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    } 

    public static function eliminar($id) {
        parent::eliminar($id);

        $sql = "DELETE FROM servicio WHERE id_servicio =".$id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
        $mysql->desconectar();
    }

}

?>