<?php
class MageMash_Adminproductgrid_Block_Adminhtml_Customgrid_Edit_Tab_Main
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    protected $helper;

    public function _construct()
    {
        $this->helper = Mage::helper('adminproductgrid');
        parent::_construct();
    }

	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();

		$fieldset = $form->addFieldset('grid_form', array(
			'legend' => $this->helper->__('Item information')
			));

        $model = Mage::registry('grid_data');

		$fieldset->addField('title', 'text', array(
			'label'     => $this->helper->__('Title'),
			'class'     => 'required-entry',
			'required'  => true,
			'name'      => 'title',
        ));

        $fieldset->addField('name', 'text', array(
            'label'     => $this->helper->__('Grid Name'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'name',
        ));

        $fieldset->addField('type', 'select', array(
            'label'     => $this->helper->__('Grid Type'),
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

		if($model) {
			$form->setValues($model->getData());
		}

        $form->setUseContainer(false);
        $this->setForm($form);

		return parent::_prepareForm();
	}

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return $this->helper->__('Main');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->helper->__('Main');
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
