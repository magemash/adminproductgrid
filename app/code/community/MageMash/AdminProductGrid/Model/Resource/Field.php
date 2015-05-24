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
        $adapter = $this->_getReadAdapter();

        $collection = Mage::getResourceModel('adminproductgrid/field_collection')
            ->addFilter('table_name', (string)$field['table_name'])
            ->addFilter('grid_id', (int)$field['grid_id'])
            ->addFilter('field', (int)$field['field']);








        $select = $adapter->select()
            ->from($this->getMainTable())
//            ->where('table = ?', (string)$field['table'])
//            ->where('grid_id = ?', (int)$field['grid_id'])
//            ->where('field = ?', (string)$field['field']);

            ->where('table_name = :table_name')
            ->where('grid_id = :grid_id')
            ->where('field = :field')
            ;

        $bind = array(
            ':table_name' => (string)$field['table_name'],
            ':grid_id' => (int)$field['grid_id'],
            ':field' => (string)$field['field']
        );

        try {
            return $collection->getFirstItem();
//            $values = $adapter->fetchRow($select);
        } catch(Exception $e) {
            die(var_dump($e->getMessage()));
        }

//        die(var_dump($values));


//        return $values;
    }
}