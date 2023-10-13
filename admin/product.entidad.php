<?php
    class Product
    {
        private $SKU;
        private $Nombre;
        private $Descripcion;
        private $Caracteristicas;
        private $Precio;
        private $Inventario;

        public function __GET($k) { return $this->$k; }
        public function __SET($k, $v) { return $this->$k = $v; }        
    }