<?php
    class ProductModel
    {
        private $pdo;

        public function __CONSTRUCT()
        {
            try
            {
                $this->pdo = new PDO('mysql:host=localhost;dbname=romantechmx', 'root', '');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Listar()
        {
            try
            {
                $result = array();

                $stm = $this->pdo->prepare("SELECT * FROM productos");
                $stm->execute();

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    $prod = new Product();

                    $prod->__SET('SKU', $r->SKU);
                    $prod->__SET('Nombre', $r->Nombre);
                    $prod->__SET('Descripcion', $r->Descripcion);
                    
                    $prod->__SET('Precio', $r->Precio);
                    $prod->__SET('Inventario', $r->Inventario);

                    $result[] = $prod;
                }
                return $result;
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Obtener($SKU)
        {
            try
            {
                $stm = $this->pdo->prepare("SELECT * FROM productos WHERE SKU = ?");

                $stm->execute(array($SKU));
                $r = $stm->fetch(PDO::FETCH_OBJ);

                $prod = new Product();

                $prod->__SET('SKU', $r->SKU);
                $prod->__SET('Nombre', $r->Nombre);
                $prod->__SET('Descripcion', $r->Descripcion);
                
                $prod->__SET('Precio', $r->Precio);
                $prod->__SET('Inventario', $r->Inventario);

                return $prod;
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Eliminar($SKU)
        {
            try
            {
                $stm =  $this->pdo->prepare("DELETE FROM productos WHERE SKU = ?");

                $stm->execute(array($SKU));
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Actualizar(Product $data)
        {
            try
            {
                $sql = "UPDATE productos SET 
                        Nombre          =?,
                        Descripcion     =?,
                        
                        Precio          =?,
                        Inventario      =?
                        WHERE SKU = ?";
                
                $this->pdo->prepare($sql)
                            ->execute(
                                array(
                                    $data->__GET('Nombre'),
                                    $data->__GET('Descripcion'),
                                    
                                    $data->__GET('Precio'),
                                    $data->__GET('Inventario'),
                                    $data->__GET('SKU')
                                )
                            );
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Agregar(Product $data)
        {
            try
            {
                $sql = "INSERT INTO productos (Nombre, Descripcion, Precio, Inventario) 
                        VALUES (?, ?, ?, ?)";

                $this->pdo->prepare($sql)
                            ->execute(
                                array(                                    
                                    $data->__GET('Nombre'),
                                    $data->__GET('Descripcion'),
                                    
                                    $data->__GET('Precio'),
                                    $data->__GET('Inventario')                                    
                                    )
                                );
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

    }