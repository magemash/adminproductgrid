<?php

class MageMash_AdminProductGrid_Block_Adminhtml_Filter_Grid extends Mage_Core_Block_Template
{
    protected $_template = 'magemash/adminproductgrid/filter/grid.phtml';
    protected $form;

    protected function _construct()
    {
	    parent::_construct();
        $this->prepareForm();
    }

    protected function prepareForm()
    {
        $this->setChild('add_button',
            Mage::app()->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label' => 'Add New Filter',
                    'class' => 'add',
                    'id'    => 'add_new_filter'
                ))
        );

        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('grid_form', array(
            'legend' => 'Item information'
        ));

        $fieldset->addField('title', 'text', array(
            'label'     => 'Title',
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'filters[title]',
        ));

        $fieldset->addField('titlessss', 'text', array(
            'label'     => 'Title',
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'filters[title]',
        ));

        $fieldset->addField('type', 'select', array(
            'label'     => 'Grid Type',
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'type',
            'values'    => array(
                array(
                    'value'     => 'product',
                    'label'     => 'product'
                ),
                array(
                    'value'     => 'order',
                    'label'     => 'order'
                )
            )
        ));

        $form->setUseContainer(false);
        $this->form = $form;
    }

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param mixed $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }


}