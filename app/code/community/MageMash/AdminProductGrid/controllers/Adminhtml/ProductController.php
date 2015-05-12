<?php

class MageMash_AdminProductGrid_Adminhtml_ProductController extends Mage_Adminhtml_Controller_Action
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
        $title = "Products";
        $this->_title($this->__($title));
        Mage::register('headerText', $title);

        $id = $this->getRequest()->getParam('id');

        $this->_initAction();

        $this->renderLayout();
    }
}