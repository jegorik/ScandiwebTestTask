<?php

/**
 * Class CRUD
 * This class trying to to save information from web form to a database
 */

class CRUD
{
    private $table = DataBaseInfo::TableName;
    private $skuCell = DataBaseInfo::SkuCell;
    private $nameCell = DataBaseInfo::NameCell;
    private $priceCell = DataBaseInfo::PriceCell;
    private $productCell = DataBaseInfo::ProductCell;
    private $attributeCell = DataBaseInfo::AttributeCell;

    /**
     * Get access to save function outside CRUD class
     */
    public function makeSave($connection, $sku, $name, $price, $product, $attribute)
    {
        return $this->doSave($connection, $sku, $name, $price, $product, $attribute);
    }


    /**
     * Get access to load function outside CRUD class
     */
    public function makeLoad($connection, $product)
    {
        return $this->doLoad($connection, $product);
    }

    /**
     * Get access to delete function outside CRUD class
     */
    public function makeDelete($connection, $products)
    {
        return $this->doDelete($connection, $products);
    }

    /**
     * Save validated form data to database
     *
     * @return array - Return result array
     */
    private function doSave($connection, $sku, $name, $price, $product, $attribute)
    {
        $saveResult = array();
        $sqlQuery = null;
        $driver = new mysqli_driver();
        $driver->report_mode = MYSQLI_REPORT_ALL;

        $sku = mysqli_real_escape_string($connection, $sku);
        $name = mysqli_real_escape_string($connection, $name);
        $price = mysqli_real_escape_string($connection, $price);
        $product = mysqli_real_escape_string($connection, $product);
        $attribute = mysqli_real_escape_string($connection, $attribute);

        try {
            mysqli_query($connection, "INSERT INTO  $this->table ($this->skuCell, $this->nameCell, $this->priceCell, $this->productCell, $this->attributeCell) VALUES ('$sku','$name','$price','$product', '$attribute')");
        } catch (\mysqli_sql_exception $error) {
            $saveResult[] = 'Error: ' . $error->getMessage();
            return $saveResult;
        }
        $saveResult['success'] = 'New record created successfully';
        return $saveResult;
    }

    /**
     *  This function load information from database depending of product value
     */
    private function doLoad($connect, $product)
    {
        $driver = new mysqli_driver();
        $driver->report_mode = MYSQLI_REPORT_STRICT;
        $errorMsg = null;

        try {
            $sqlQuery = mysqli_query($connect, "SELECT $this->skuCell,$this->nameCell,$this->priceCell,$this->productCell,$this->attributeCell FROM $this->table WHERE $this->productCell='$product'");
            while ($row = mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } catch (\mysqli_sql_exception $error) {
            return $errorMsg = 'Error: ' . $error->getMessage();
        }
    }

    /**
     *  This function delete information from database depending of product value
     */
    private function doDelete($connect, $products)
    {
        $driver = new mysqli_driver();
        $driver->report_mode = MYSQLI_REPORT_STRICT;
        $errorMsg = null;
        $result = null;

        foreach ($products as $value) {
            try {
                $value = "'" . $value . "'";
                $query = mysqli_query($connect, "SELECT $this->skuCell FROM $this->table WHERE $this->skuCell= $value limit 1");
                $check = mysqli_num_rows($query);
                if ($check > 0) {
                    mysqli_query($connect, "DELETE FROM $this->table WHERE $this->skuCell= $value");
                    $result[] = $value . " is deleted!";
                } else {
                    $result[] = $value . " not exist!";
                }
            } catch (\mysqli_sql_exception $error) {
                return $errorMsg = 'Error: ' . $error->getMessage();
            }
        }
        return $result;
    }
}
