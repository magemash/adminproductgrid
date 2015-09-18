<?php

class MageMash_Adminproductgrid_Block_Adminhtml_Customgrid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller = "adminhtml_customgrid";
		$this->_blockGroup = "adminproductgrid";
		$this->_headerText = Mage::helper("adminproductgrid")->__("Grid Manager");
		$this->_addButtonLabel = Mage::helper("adminproductgrid")->__("Add New Grid");
		parent::__construct();
	}
}