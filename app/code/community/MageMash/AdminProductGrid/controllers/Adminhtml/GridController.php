<?php

class MageMash_AdminProductGrid_Adminhtml_GridController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu("adminproductgrid/productgridsetup")->_addBreadcrumb(Mage::helper("adminhtml")->__("Product Grid Setup"),Mage::helper("adminhtml")->__("Product Grid Setup"));
        return $this;
    }

    public function indexAction()
    {
        $this->_title($this->__("Grids"));

        $this->_initAction();
        $this->renderLayout();
    }

    public function editAction()
    {
//			$this->_title($this->__("Menu"));
//			$this->_title($this->__("Item"));
//			$this->_title($this->__("Edit Item"));

//			$id = $this->getRequest()->getParam("id");
        $grid = Mage::getModel("adminproductgrid/grid")->getCollection();
//        die(var_dump($grid));

        $model = Mage::getResourceModel("adminproductgrid/field_collection")->load();



        $grid = Mage::getModel("adminproductgrid/grid");
        $grid->setGridName('sss');
        $grid->setType('sss');
        $grid->setTitle('Sss');

        $grid->save();


//            die(var_dump($model->getData()));

//			if ($model->getId()) {
//				Mage::register("item_data", $model);
//				$this->loadLayout();
//				$this->_setActiveMenu("menu/item");
//				$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Item Manager"), Mage::helper("adminhtml")->__("Item Manager"));
//				$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Item Description"), Mage::helper("adminhtml")->__("Item Description"));
//				$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
//				$this->_addContent($this->getLayout()->createBlock("menu/adminhtml_item_edit"))->_addLeft($this->getLayout()->createBlock("menu/adminhtml_item_edit_tabs"));
//				$this->renderLayout();
//			} else {
//				Mage::getSingleton("adminhtml/session")->addError(Mage::helper("menu")->__("Item does not exist."));
//				$this->_redirect("*/*/");
//			}
        $this->_initAction();
        $this->renderLayout();
    }

    public function saveAction()
    {
        $post_data=$this->getRequest()->getPost();
            if ($post_data) {
                try {
                    $model = Mage::getModel("menu/item")
                    ->addData($post_data)
                    ->setId($this->getRequest()->getParam("id"))
                    ->save();

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
}
