<?php
class MageMash_AdminProductGrid_Model_Resource_Fields extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('adminproductgrid/fields', 'entity_id');
    }
}