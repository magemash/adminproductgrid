<?php
class MageMash_AdminProductGrid_Model_Resource_Grid extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('adminproductgrid/grid', 'entity_id');
    }

    protected function _afterSave(Mage_Core_Model_Abstract $object)
    {
        $fields = $object->getFields();

        foreach ($fields as $field) {

            $fieldModel = Mage::getModel("adminproductgrid/field");
            $fieldModel->setData($field)
                ->save();
        }

        return $this;
    }
}