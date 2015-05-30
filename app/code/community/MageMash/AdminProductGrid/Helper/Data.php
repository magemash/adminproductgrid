<?php

class MageMash_AdminProductGrid_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getGrids()
    {
        return Mage::getModel('adminproductgrid/grid')->getCollection()->load();
    }

    public function getGrid($gridId)
    {
        $collection = Mage::getModel('adminproductgrid/grid');
        $customGrid = $collection->load($gridId);

        return $customGrid;
    }
}
	 