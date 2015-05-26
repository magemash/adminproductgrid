<?php
class MageMash_AdminProductGrid_Model_Resource_Field extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('adminproductgrid/field', 'entity_id');
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function getField($field)
    {
        $collection = Mage::getResourceModel('adminproductgrid/field_collection')
            ->addFilter('grid_id', (int)$field['grid_id'])
            ->addFilter('field_id', (int)$field['field_id']);

        try {
            return $collection->getFirstItem();
        } catch(Exception $e) {
        }

        return null;
    }
}