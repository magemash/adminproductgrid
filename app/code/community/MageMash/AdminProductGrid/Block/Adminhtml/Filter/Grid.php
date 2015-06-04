<?php

class MageMash_AdminProductGrid_Block_Adminhtml_Filter_Grid extends Mage_Core_Block_Template
{
    protected $_template = 'magemash/adminproductgrid/filter/grid.phtml';
    protected $form;
    protected $formName = "filters";
    protected $formId;
    protected $formValue;

    protected function _construct()
    {
	    parent::_construct();
        $this->formId = $this->formName . "[{{id}}]";
        $this->prepareForm();
    }

    public function getDeleteButtonHtml()
    {
        return $this->getChildHtml('delete_button');
    }

    public function setFormValue($value)
    {
        $this->formValue = $value;
    }

    public function getFormValue()
    {
        return $this->formValue;
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

        $this->setChild('delete_button',
            Mage::app()->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label' => Mage::helper('catalog')->__('Delete Option'),
                    'class' => 'delete delete-'.$this->getFormName().' '
                ))
        );

        $form = new Varien_Data_Form();

//        $fieldset = $form->addFieldset('grid_form', array(
//            'legend' => 'Item information'
//        ));

        $form->addField('title', 'text', array(
            'label'     => 'Title',
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => $this->formId . '[title]',
        ));

        $form->addField('titlessss', 'text', array(
            'label'     => 'Title',
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => $this->formId . '[titlessss]',
        ));

        $form->addField('type', 'select', array(
            'label'     => 'Grid Type',
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => $this->formId . '[type]',
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

    /**
     * @return string
     */
    public function getFormName()
    {
        return $this->formName;
    }

    /**
     * @param string $formName
     */
    public function setFormName($formName)
    {
        $this->formName = $formName;
    }

    /**
     * @return mixed
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * @param mixed $formId
     */
    public function setFormId($formId)
    {
        $this->formId = $formId;
    }
}