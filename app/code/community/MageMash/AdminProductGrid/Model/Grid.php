<?php

class MageMash_AdminProductGrid_Model_Grid extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
       $this->_init('adminproductgrid/grid');
    }

    public function saveFields($fields)
    {
        foreach ($fields as $field) {

            $fieldModel = Mage::getModel("adminproductgrid/field");

            $f = $fieldModel->getField($field);

            if ($f->getId() == null) {
                $fieldModel->setData($field)
                    ->save();
            } else {

                if ($field['is_delete']) {
                    $f->delete();
                } else {
                    $f->setHeader($field['header'])
                        ->setWidth($field['width'])
                        ->setSortOrder($field['sort_order'])
                        ->setOptions($field['options'])
                        ->setTableName($field['table_name']);

                    if (array_key_exists('field', $field)) {
                        $f->setField($field['field']);
                    }

                    $f->save();
                }
            }
        }

        return $this;
    }

    public function getFields($id)
    {
        $collection = Mage::getResourceModel('adminproductgrid/field_collection')
            ->addFilter('grid_id', $id);

        return $collection;
    }
}
	 