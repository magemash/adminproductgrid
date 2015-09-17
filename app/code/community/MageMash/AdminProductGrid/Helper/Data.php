<?php

class MageMash_Adminproductgrid_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $config;

    public function __construct()
    {
        $this->config = Mage::app()->getConfig()->getNode('customadmingrid');
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getTables()
    {
        return $this->config->table->children();
    }

    public function getGrids()
    {
        return Mage::getModel('adminproductgrid/customgrid')->getCollection()->load();
    }

    public function getGrid($gridId)
    {
        $collection = Mage::getModel('adminproductgrid/customgrid');
        $customGrid = $collection->load($gridId);

        return $customGrid;
    }
}
	 