<?php

class MageMash_AdminProductGrid_Block_Adminhtml_Widget_Form_Element_FilterWidget extends Varien_Data_Form_Element_Abstract
{
    public function __construct($attributes=array())
    {
        parent::__construct($attributes);
        $this->setType('label');
    }

    public function getElementHtml()
    {
        return Mage::app()->getLayout()
	        ->createBlock('adminproductgrid/adminhtml_filter_grid')
	        ->toHtml();
    }
}