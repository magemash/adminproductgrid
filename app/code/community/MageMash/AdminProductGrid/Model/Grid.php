<?php

class MageMash_AdminProductGrid_Model_Grid extends Mage_Core_Model_Abstract
{
    protected $attributes;
    protected $fieldModel;

    protected function _construct()
    {
        $this->_init('adminproductgrid/grid');
        $this->fieldModel = Mage::getModel("adminproductgrid/field");
        $this->attributes = $this->fieldModel->getAttributeSelect();
    }

    public function saveFields($fields)
    {

        foreach ($fields as $field) {

            $fieldModel = $this->fieldModel;

            $f = $fieldModel->getFieldIfExists($field);

            $field['type'] = $this->getFieldType($field);

            if ($f->getId() == null) {
                $fieldModel->setData($field)
                    ->save();
            } else {

                if ($field['is_delete'] == '1') {
                    $f->delete();
                } else {
                    $f->setHeader($field['header'])
                    ->setWidth($field['width'])
                    ->setSortOrder($field['sort_order'])
                    ->setTableName($field['table_name'])
                    ->setType($field['type'])
                    ->setFilterCondition($field['filter_condition'])
                    ->setFilterValue($field['filter_value']);

                    if (array_key_exists('field', $field)) {
                        $f->setField($field['field']);
                    }

                    $f->save();
                }
            }
        }

        return $this;
    }

    public function getFieldType($field)
    {
        switch ($field['table_name']) {
            case 'attribute':
                $attribute = $this->attributes[$field['field']];
                if ($attribute['frontend_input'] === 'int') {
                    return 'number';
                }
                if ($attribute['frontend_input'] === 'select') {
                    return 'options';
                }
                break;
            default:
                break;
        }
    }

    public function getFields($id)
    {
        $collection = Mage::getResourceModel('adminproductgrid/field_collection')
            ->addFilter('grid_id', $id);

        return $collection;
    }
}
	 