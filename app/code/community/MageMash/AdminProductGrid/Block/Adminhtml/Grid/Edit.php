<?php

class MageMash_AdminProductGrid_Block_Adminhtml_Grid_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected $helper;

	public function __construct()
	{
        $this->helper = Mage::helper('adminproductgrid');
		parent::__construct();
		$this->_objectId = "entity_id";
		$this->_blockGroup = "adminproductgrid";
		$this->_controller = "adminhtml_grid";
		$this->_updateButton("save", "label", $this->helper->__("Save Item"));
		$this->_updateButton("delete", "label", $this->helper->__("Delete Item"));

		$this->_addButton("saveandcontinue", array(
			"label"     => $this->helper->__("Save And Continue Edit"),
			"onclick"   => "saveAndContinueEdit()",
			"class"     => "save",
			), -100);

		$this->_formScripts[] = "

		function saveAndContinueEdit(){
			editForm.submit($('edit_form').action+'back/edit/');
		}
		";

//        $this->_formScripts[] = "
//        function changeSelect(){
//            setSelected();
//        }";
//
//        $this->_formScripts[] = "
//
//        setSelected();
//
//        function setSelected() {
//            type = $('type');
//            selected = type.getValue();
//
//            if (selected === 'product') {
//                hideAndClear('order');
//                show('product')
//            } else if (selected === 'order') {
//                hideAndClear('product');
//                show('order')
//            } else {
//                hideAndClear('product');
//                hideAndClear('order');
//            }
//        }
//
//        function hideAndClear(id) {
//            $(id).up(1).hide();
//            $(id).setValue('');
//        }
//
//        function show(id) {
//            $(id).up(1).show();
//        }
//
//        ";
	}

	public function getHeaderText()
	{
		if( Mage::registry('grid_data') && Mage::registry('grid_data')->getId() ){
			return $this->helper->__('Edit Grid Item', $this->htmlEscape(Mage::registry('grid_data')->getId()));
		}
		else{
			return $this->helper->__('Add Item');
		}
	}
}