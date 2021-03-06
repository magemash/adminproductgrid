<?php
class MageMash_Adminproductgrid_Model_Resource_Field extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('adminproductgrid/field', 'entity_id');
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function getFieldIfExists($field)
    {
        $collection = Mage::getResourceModel('adminproductgrid/field_collection')
            ->addFilter('customgrid_id', (int)$field['customgrid_id'])
            ->addFilter('field_id', (int)$field['field_id']);

        try {
            return $collection->getFirstItem();
        } catch(Exception $e) {
        }

        return null;
    }
}