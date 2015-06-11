<?php

class MageMash_AdminProductGrid_Model_Field_Type_Order extends MageMash_AdminProductGrid_Model_Field_Type_Abstract
{
    const BASE = "adminhtml/sales_order";

    protected function _construct()
    {
    }

    public function getSelect()
    {
        return array(
            array(
                'label' => 'entity_id',
                'value' => 'entity_id',
            ),
            array(
                'label' => 'increment_id',
                'value' => 'increment_id',
            ),
            array(
                'label' => 'total',
                'value' => 'total',
            ),
        );
    }
}
	 