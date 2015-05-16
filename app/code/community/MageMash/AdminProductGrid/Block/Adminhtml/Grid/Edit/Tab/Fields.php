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
        $this->setTemplate('catalog/product/edit/options.phtml');
    }

	protected function _prepareLayout()
	{
//		$form = new Varien_Data_Form();

//		$fieldset = $form->addFieldset('grid_form', array(
//			'legend' => $this->helper->__('Item information')
//			));

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


//        if ($model->getType() === 'product' || $model->getType() === 'order') {
//            $fieldset->addField('fields', 'multiselect', array(
//                'label' => $this->helper->__('Products'),
//                'name' => 'product',
//                'values' => $types[$model->getType()]
//            ));
//        } else {
//            $fieldset->addField('type', 'select', array(
//                'label'    => $this->helper->__('Grid Types'),
//                'name'     => 'type',
//                'onchange' => 'changeSelect()',
//                'values' => $gridTypes
//            ));
//        }

        $this->setChild('add_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label' => Mage::helper('catalog')->__('Add New Option'),
                    'class' => 'add',
                    'id'    => 'add_new_defined_option'
                ))
        );

        $this->setChild('options_box',
            $this->getLayout()->createBlock('adminhtml/catalog_product_edit_tab_options_option')
        );
//        $fieldset->addField('order', 'multiselect', array(
//            'label'    => $this->helper->__('Orders'),
//            'name'     => 'order',
//            'values' => $products
//        ));
//		if (Mage::getSingleton('adminhtml/session')->getGridData()) {
//			$form->setValues(Mage::getSingleton('adminhtml/session')->getGridData());
//			Mage::getSingleton('adminhtml/session')->setGridData(null);
//		}
//        $fieldset->addField('type', 'text', array(
//            'label'     => $this->helper->__('Type'),
//            'class'     => 'required-entry',
//            'required'  => true,
//            'name'      => 'type',
//        ));


//		if($model) {
//			$form->setValues($model->getData());
//		}

//        $this->setForm($form);

		return parent::_prepareLayout();
	}

    public function getAddButtonHtml()
    {
        return $this->getChildHtml('add_button');
    }

    public function getOptionsBoxHtml()
    {
        return $this->getChildHtml('options_box');
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return $this->helper->__('Fields');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->helper->__('Fields');
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
