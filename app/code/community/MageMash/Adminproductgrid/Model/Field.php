<?php

class MageMash_Adminproductgrid_Model_Field extends Mage_Core_Model_Abstract
{
    protected $helper;

    protected function _construct()
    {
        $this->helper = Mage::helper('adminproductgrid');
        $this->_init('adminproductgrid/field');
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

    public function getProductSelect()
    {
        return array(
            array(
                'label' => 'entity_id',
                'value' => 'entity_id',
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
                'label' => 'entity_id',
                'value' => 'entity_id',
            ),
            array(
                'label' => 'increment_id',
                'value' => 'increment_id',
            ),
            array(
                'label' => 'total',
                'value' => 'total',
            ),
        );
    }

    public function getTypeSelects()
    {
        $selects = array();

        $tables = $this->helper->getTables();

        foreach ($tables as $table) {
            foreach ($table->children() as $type) {
                if ($type->hasChildren()) {
                    $selects[$table->getName()][$type->getName()] = $this->createSelect($type->children());
                } else {
                    $class = $type->getAttribute('class');
                    $class = new $class();
                    $selects[$table->getName()][$type->getName()] = $class->getFields();
                }
            }
        }

        return $selects;
    }

    public function getFilterConditionSelect()
    {
        return array(
            array(
                'label' => '',
                'value' => '',
            ),
            array(
                'label' => 'Less Than',
                'value' => 'lt',
            ),
            array(
                'label' => 'More Than',
                'value' => 'mt',
            ),
            array(
                'label' => 'Less Than or Equal To',
                'value' => 'lte',
            ),
            array(
                'label' => 'More Than or Equal To',
                'value' => 'mte',
            ),
            array(
                'label' => 'Like',
                'value' => 'l',
            ),
            array(
                'label' => 'Not Like',
                'value' => 'nl',
            ),
            array(
                'label' => 'In',
                'value' => 'i',
            ),
            array(
                'label' => 'Not In',
                'value' => 'ni',
            ),
        );
    }

    public function getFilterTypes()
    {
        return array(
            'lt'  => ' < ',
            'mt'  => ' > ',
            'lte'  => ' <= ',
            'mte'  => ' >= ',
            'l'  => ' LIKE ',
            'nl'  => ' NOT LIKE ',
            'i'  => ' IN ',
            'ni'  => ' NOT IN ',
        );
    }

    public function getTableSelect($type)
    {
        $type = $this->helper->getTables()->$type;

        return $this->createSelect($type->children());

        switch($type) {
            case 'product':
                return array(
                    array(
                        'label' => 'products',
                        'value' => 'product',
                    ),
                    array(
                        'label' => 'attribute',
                        'value' => 'attribute',
                    ),
                );
            break;
            case 'order':
                return array(
                    array(
                        'label' => 'order',
                        'value' => 'order',
                    ),
                );
            break;
            default:
            return null;
            break;
        }
    }

    protected function createSelect($items)
    {
        $array = array();

        foreach ($items as $item) {
            $array[$item->getName()] = array(
                'label' => $item->getName(),
                'value' => $item->getName(),
            );
        }

        return $array;
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

    public function getFieldIfExists($field)
    {
        return $this->_getResource()->getFieldIfExists($field);
    }

    public function getFields($gridId)
    {
        return $this->_getResource()->getField($gridId);
    }
}
	 