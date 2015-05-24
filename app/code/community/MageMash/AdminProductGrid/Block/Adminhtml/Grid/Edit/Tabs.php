<?php
class MageMash_AdminProductGrid_Block_Adminhtml_Grid_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    protected $helper;

    public function __construct()
    {
        parent::__construct();
        $this->setId("grid_tabs");
        $this->helper = Mage::helper('adminproductgrid');
        $this->setDestElementId("edit_form");
        $this->setTitle($this->helper->__("Grid Information"));
    }

    protected function _prepareLayout()
    {
        $params = $this->getRequest()->getParams();

        if (array_key_exists('id', $params)) {
            $this->addTab('fields', array(
                'label' => $this->helper->__('Fields'),
                'url' => $this->getUrl('*/*/fields', array('_current' => true)),
                'class' => 'ajax',
            ));
        }
    }

}
