<?php

class MageMash_Adminproductgrid_Model_Field_Type_Attribute extends MageMash_Adminproductgrid_Model_Field_Type_Abstract
{
    protected function _construct()
    {
    }

    public function getFields()
    {
        return $this->getAttributeSelect();
    }

    public function getAttributeSelect()
    {
        $attributes = Mage::getResourceModel('catalog/product_attribute_collection')
            ->getItems();

        $rows = array();

        foreach ($attributes as $attribute){
            $rows[$attribute->getAttributecode()] = array(
                'label' => $attribute->getAttributecode(),
                'value' => $attribute->getAttributecode(),
                'backend_type'  => $attribute->getBackendType(),
                'frontend_input'  => $attribute->getFrontendInput()
            );
        }

        return $rows;
    }
}
	 