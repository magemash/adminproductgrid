<?php

class MageMash_Adminproductgrid_Adminhtml_ViewController extends Mage_Adminhtml_Controller_Action
{
    protected $_helper;

    public function _construct()
    {
        parent::_construct();
        $this->_helper = Mage::helper('adminproductgrid');
    }

    protected function _initAction()
    {
        $this->loadLayout();
            // ->_setActiveMenu('ordergridextra/items')
            // ->_addBreadcrumb(Mage::helper('adminhtml')->__('Banners Manager'), Mage::helper('adminhtml')->__('Manage Banners'));
        return $this;
    }   
 
    public function indexAction()
    {
        $title = "Custom Grid";
        $this->_title($this->__($title));
        Mage::register('headerText', $title);

        $id = $this->getRequest()->getParam('id');
        Mage::register('id', $id);

        $this->_initAction();

        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('adminprodctgrid/adminhtml_view_grid')->toHtml()
        );
    }
}