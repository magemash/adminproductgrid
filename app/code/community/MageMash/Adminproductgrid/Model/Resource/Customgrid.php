<?php
class MageMash_Adminproductgrid_Model_Resource_Customgrid extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('adminproductgrid/customgrid', 'entity_id');
    }

}