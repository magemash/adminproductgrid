<?php

class MageMash_Adminproductgrid_Adminhtml_CustomgridController extends Mage_Adminhtml_Controller_Action
{
    protected $helper;

    public function _construct()
    {
        $this->helper = Mage::helper('adminproductgrid');
    }

    protected function _initAction()
    {
        $this->loadLayout();
//        $this->loadLayout()->_setActiveMenu("adminproductgrid/productgridsetup")->_addBreadcrumb(Mage::helper("adminhtml")->__("Product Grid Setup"),Mage::helper("adminhtml")->__("Product Grid Setup"));
        return $this;
    }

    public function indexAction()
    {
        $this->_title($this->__("Grids"));

        $this->_initAction();

        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $field = new MageMash_Adminproductgrid_Model_Field();

        $table = $field->getTypeSelects();

//        die(var_dump($table));

        $this->_title($this->__("Grid"));
        $this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
        $model  = $this->getModel()->load($id);

        Mage::register("grid_data", $model);

        $data = Mage::getSingleton("adminhtml/session")->getFormData(true);

        if (!empty($data)) {
            $model->setData($data);
        }

        $this->loadLayout();
        $this->_setActiveMenu("adminproductgrid/customgrid");

        $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

        $this->_initAction();

        $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Item Manager"), Mage::helper("adminhtml")->__("Item Manager"));
        $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Item Description"), Mage::helper("adminhtml")->__("Item Description"));

        $this->renderLayout();
    }

    public function saveAction()
    {
        $post_data=$this->getRequest()->getPost();

            if ($post_data) {
                try {
                    $model = $this->getModel()
                    ->addData($post_data)
                    ->setId($this->getRequest()->getParam("id"))
                    ->save();

                    if (array_key_exists('fields', $post_data)) {
                        $model->saveFields($post_data['fields']);
                    }

                    Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully saved"));
                    Mage::getSingleton("adminhtml/session")->setItemData(false);

                    if ($this->getRequest()->getParam("back")) {
                        $this->_redirect("*/*/edit", array("id" => $model->getId()));
                        return;
                    }
                    $this->_redirect("*/*/");
                    return;
                }
                catch (Exception $e) {
                    Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                    Mage::getSingleton("adminhtml/session")->setItemData($this->getRequest()->getPost());
                    $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
                return;
                }
            }
            $this->_redirect("*/*/");
    }

    /**
     * Get options fieldset block
     *
     */
    public function fieldsAction()
    {
//        $this->_initProduct();
        $this->loadLayout();
        $this->renderLayout();
    }

    protected function getModel()
    {
        return Mage::getModel('adminproductgrid/customgrid');
    }
}
