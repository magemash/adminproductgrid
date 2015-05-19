<?php

class MageMash_AdminProductGrid_Model_Field extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
       $this->_init('adminproductgrid/field');
    }

    public function getFieldSelect()
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

}
	 