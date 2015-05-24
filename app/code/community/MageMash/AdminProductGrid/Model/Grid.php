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
//            die(var_dump($f->getId()));

            if ($f->getId() == null) {
                $fieldModel->setData($field)
                    ->save();
            } else {
                $f->setHeader($field['header'])
                ->setWidth($field['width'])
                ->save();
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
	 