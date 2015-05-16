<?php

class MageMash_AdminProductGrid_Block_Adminhtml_Grid_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected $helper;

    public function __construct()
    {
        parent::__construct();
        $this->setId('productgridsetup');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->helper = $this->getGridHelper();
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('adminproductgrid/grid')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {
        $helper = $this->helper;

        $this->addColumn('entity_id', array(
            'header' => $helper->__('ID'),
            'align' =>'right',
            'width' => '50px',
            'type' => 'number',
            'index' => 'entity_id',
            ));

        $this->addColumn('title', array(
            'header'    => $helper->__('Title'),
            'align'     =>'left',
            'index'     => 'title',
            ));

        $this->addColumn('type', array(
            'header'    => $helper->__('Type'),
            'align'     =>'left',
            'index'     => 'type',
        ));

        $this->addColumn('grid_name', array(
            'header'    => $helper->__('Grid Name'),
            'align'     =>'right',
            'index'     => 'grid_name',
            'filter'    => false,
            'sortable'  => false
            ));

        $this->addColumn('action',
            array(
                'header'    => $helper->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => $helper->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                        )
                    ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
                ));

//        $this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));
//        $this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl("*/*/edit", array("id" => $row->getId()));
    }

    protected function _prepareMassaction()
    {
        $helper = $this->helper;

        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('entity_ids');
        $this->getMassactionBlock()->setUseSelectAll(true);
        $this->getMassactionBlock()->addItem('remove_item', array(
            'label'=> $helper->__('Remove Item'),
            'url'  => $this->getUrl('*/adminhtml_adminproductgrid/massRemove'),
            'confirm' => $helper->__('Are you sure?')
            ));
        return $this;
    }

    public function getGridHelper()
    {
        return Mage::helper('adminproductgrid');
    }


}