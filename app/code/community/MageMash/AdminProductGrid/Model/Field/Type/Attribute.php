<?php

class MageMash_AdminProductGrid_Model_Field_Type_Attribute extends MageMash_AdminProductGrid_Model_Field_Type_Abstract
{
    const BASE = "adminhtml/catalog_product";

    protected static $fields = array(
        'entity_id' => array(),
        'name' => array(),
        'qty' => array(),
    );

    protected function _construct()
    {
    }

    public function getSelect()
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

    public function getTypeOptions($key)
    {
        $attribute = Mage::getSingleton('eav/config')->getAttribute('catalog_product', $key);

        if ($attribute->usesSource()) {
            $options = $attribute->getSource()->getAllOptions(false);
        }

        $optionKeys = array();

        if (!empty($options)) {
            foreach ($options as $option) {
                if ($option['value'] != "") {
                    $optionKeys[$option['value']] = $option['label'];
                }
            }
        }

        return $optionKeys;
    }
}
	 