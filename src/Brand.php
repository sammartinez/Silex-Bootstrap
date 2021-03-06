<?php


    class Brand
    {
        private $id;
        private $brand_name;

        //Constructors
        function __construct($id = null, $brand_name)
        {
            $this->id = $id;
            $this->brand_name = $brand_name;
        }

        //Getters
        function getId()
        {
            return $this->id;
        }

        function getBrandName()
        {
            return $this->brand_name;
        }

        //Setters
        function setBrandName($new_brand_name)
        {
            $this->brand_name = $new_brand_name;
        }

        //Save function
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO brands (name) VALUES ('{$this->getBrandName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function addStore($store)
        {
            $GLOBALS['DB']->exec("INSERT INTO brands_stores (store_id, brand_id) VALUES ({$store->getId()}, {$this->getId()});");
        }

        function getStores()
        {
            $results = $GLOBALS['DB']->query(
                "SELECT stores.*FROM
                    brands JOIN brands_stores ON (brands.id = brands_stores.brand_id)
                            JOIN stores ON (stores.id = brands_stores.store_id)
                    WHERE brands.id = {$this->getId()};");

            $stores = array();

            foreach ($results as $result){
                $id = $result['id'];
                $store_name = $result['name'];
                $new_store_name = new Store($id, $store_name);
                array_push($stores, $new_store_name);
            }
            return $stores;
        }


        //Static functions
        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
            $brands = array();

            foreach ($returned_brands as $brand) {
                $brand_name = $brand['name'];
                $id = $brand['id'];
                $new_brand = new Brand($id, $brand_name);
                array_push($brands, $new_brand);
            }
            return $brands;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM brands;");
            $GLOBALS['DB']->exec("DELETE FROM brands_stores;");
        }

        static function find($search_id)
        {
            $found_brand = null;
            $all_brands = Brand::getAll();
            foreach ($all_brands as $brand) {
                if ($brand->getId() == $search_id) {
                    $found_brand = $brand;
                }
            }
            return $found_brand;
        }
    }
?>
