<?php

class MageMash_Adminproductgrid_Model_Customgrid extends Mage_Core_Model_Abstract
{
    protected $attributes;
    protected $fieldModel;

    protected function _construct()
    {
        $this->_init('adminproductgrid/customgrid');
        $this->fieldModel = Mage::getModel("adminproductgrid/field");
        $this->attributes = $this->fieldModel->getAttributeSelect();
    }

    public function getBase()
    {
        $base = "";

        switch($this->getType()) {
            case "product":
                $base = "adminhtml/catalog_product";
                break;
            case "order":
                $base = "adminhtml/order";
                break;
            default:
                $base = "";
                break;
        }

        return $base;
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
            case 'product':
                $types = array(
                    'qty' => 'number',
                    'name' => 'text',
                    'entity_id' => 'number',
                );
                return $types[$field['field']];
                break;
            case 'order':
                $types = array(
                    'total' => 'number',
                    'increment_id' => 'number',
                    'entity_id' => 'number',
                );
                return $types[$field['field']];
                break;
            default:
                break;
        }
    }

    public function getFields($id)
    {
        $collection = Mage::getResourceModel('adminproductgrid/field_collection')
            ->addFilter('customgrid_id', $id);

        return $collection;
    }
}
	 