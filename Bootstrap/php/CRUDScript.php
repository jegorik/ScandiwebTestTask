<?php
/**
 *   This CRUD script to operate with information in database
 */
require "CRUD.php";
require "Validation.php";
require "DataBaseInfo.php";
require "Connection.php";
require "Products.php";

$temp = $_POST['products'];
$loadProduct = "";
$deleteProduct = array();
$saveProduct = array();


/**
 * Here is checked information from POST method
 */
switch ($temp) {

    case (in_array($temp, Products::Products)) :
        $loadProduct = $temp;
        break;

    case (is_array($temp)) :
        $deleteProduct = $temp;
        break;

    case (!is_array($temp) && strpos($temp, 'sku=') !== FALSE) :
        parse_str($temp, $saveProduct);
        break;

    case (empty($temp)) :
        echo json_encode("Empty request!");
        return;

    default :
        echo json_encode("Something wrong with query!");
        return;
}
/**
 * Here connection to a database made
 */
$newConnection = new Connection();
$connectionResult = $newConnection->makeConnection();
$connectStatus = $newConnection->getConnectionStatus();

if ($connectStatus) {
    $query = new CRUD();
    $connect = $newConnection->getConnectData();

    /**
     * Here starts procedure to load information from database
     */
    if ($loadProduct) {
        $loadResult = $query->makeLoad($connect, $loadProduct);
        echo json_encode($loadResult);

    }

    /**
     * Here starts procedure to delete information from database
     */
    if ($deleteProduct) {
        $deleteResult = $query->makeDelete($connect, $deleteProduct);
        echo json_encode($deleteResult);

    }

    /**
     * Here starts procedure to save information from database
     */
    if ($saveProduct) {
        $formData = null;
        $validation = new Validation();
        $validationResult = $validation->makeValidation($saveProduct);

        if ($validation->isValidation()) {
            $sku = $validationResult['sku'];
            $name = $validationResult['name'];
            $price = $validationResult['price'];
            $product = $validationResult['product'];
            $attribute = $validationResult['attribute'];
            $saveResult = $query->makeSave($connect, $sku, $name, $price, $product, $attribute);

            echo json_encode($saveResult);

        } else {
            echo json_encode($validationResult);
        }
    }
} else {
    echo json_encode($connectionResult);
}