<?php

class MageMash_AdminProductGrid_Model_Field extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
       $this->_init('adminproductgrid/field');
    }

    public function getAttributeSelect()
    {
        $attributes = Mage::getResourceModel('catalog/product_attribute_collection')
            ->getItems();

        $rows = array();

        foreach ($attributes as $attribute){
            $rows[] = array('label' => $attribute->getAttributecode(),
                'value' => $attribute->getAttributecode());
        }

        return $rows;
    }

    public function getProductSelect()
    {
        return array(
            array(
                'label' => 'id',
                'value' => 'id',
            ),
            array(
                'label' => 'name',
                'value' => 'name',
            ),
            array(
                'label' => 'qty',
                'value' => 'qty',
            ),
        );
    }

    public function getOrderSelect()
    {
        return array(
            array(
                'label' => 'id',
                'value' => 'id',
            ),
            array(
                'label' => 'increment',
                'value' => 'increment',
            ),
            array(
                'label' => 'total',
                'value' => 'total',
            ),
        );
    }

    public function getTableSelect()
    {
//        "sales/order_collection"
//        "sales/order_address"
//        "sales/order_grid"
//        'value' => 'cataloginventory/stock_item',

        return array(
            array(
                'label' => 'products',
                'value' => 'product',
            ),
            array(
                'label' => 'order',
                'value' => 'order',
            ),
            array(
                'label' => 'attribute',
                'value' => 'attribute',
            ),
        );
    }
}
	 