<?php
class MageMash_AdminProductGrid_Block_Adminhtml_Grid_Edit_Tab_Fields extends Mage_Adminhtml_Block_Widget
{
    protected $helper;

    public function _construct()
    {
        $this->helper = Mage::helper('adminproductgrid');
        parent::_construct();
    }

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('magemash/adminproductgrid/grid/edit/fields.phtml');
    }

    protected function _prepareLayout()
    {
        $this->setChild('add_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label' => Mage::helper('catalog')->__('Add New Option'),
                    'class' => 'add',
                    'id'    => 'add_new_defined_option'
                ))
        );

        $this->setChild('options_box',
            $this->getLayout()->createBlock('adminproductgrid/adminhtml_grid_edit_tab_fields_field')
        );

        return parent::_prepareLayout();
    }

	/*protected function _prepareLayout()
	{
        $model = Mage::registry('grid_data');

        $gridTypes = array(
            array('value' => '', 'label' => ''),
            array('value' => 'product', 'label' => 'Product'),
            array('value' => 'order', 'label' => 'Order')
        );

        $products = array(
            array('value' => '', 'label' => ''),
            array('value' => 'scotmid', 'label' => 'Scotmid'),
            array('value' => 'company2', 'label' => 'Company2'),
        );

        $orders = array(
            array('value' => '', 'label' => ''),
            array('value' => 'scotmid', 'label' => 'Scotmid'),
            array('value' => 'company2', 'label' => 'Company2'),
        );

        $types = array(
            'product' => $products,
            'order' => $orders,
        );

        $this->setChild('add_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label' => Mage::helper('catalog')->__('Add New Option'),
                    'class' => 'add',
                    'id'    => 'add_new_defined_option'
                ))
        );

        $this->setChild('options_box',
            $this->getLayout()->createBlock('adminproductgrid/adminhtml_grid_edit_tab_fields_field')
        );

		return parent::_prepareLayout();
	}*/

    public function getAddButtonHtml()
    {
        return $this->getChildHtml('add_button');
    }

    public function getOptionsBoxHtml()
    {
        return $this->getChildHtml('options_box');
    }

    /**
     * Returns status flag about this tab can be shown or not
     *
     * @return true
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return true
     */
    public function isHidden()
    {
        return false;
    }
}
