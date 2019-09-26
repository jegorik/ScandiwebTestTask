<?php

/**
 * Class DataBaseInfo
 * Enum class to store database information
 */
abstract class DataBaseInfo
{
    const Servername = 'localhost:3306';
    const Username = 'jegorik';
    const Password = 'qwerty12';
    const DbName = 'scandiweb';
    const TableName = 'product_list';
    const SkuCell = 'sku';
    const NameCell = 'name';
    const PriceCell = 'price';
    const ProductCell = 'product';
    const AttributeCell = 'attribute';
}
