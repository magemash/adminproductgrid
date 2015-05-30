<?php

class MageMash_AdminProductGrid_Block_Adminhtml_View extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller = "adminhtml_view";
		$this->_blockGroup = "adminproductgrid";
		$this->_headerText = Mage::helper("adminproductgrid")->__("Custom Grid");
		$this->_addButtonLabel = Mage::helper("adminproductgrid")->__("Add New Grid");
		parent::__construct();
	}
}