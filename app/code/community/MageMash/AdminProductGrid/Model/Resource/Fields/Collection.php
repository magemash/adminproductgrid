<?php

class MageMash_AdminProductGrid_Model_Resource_Fields_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
	public function _construct()
	{
		$this->_init('adminproductgrid/fields');
	}
}
	 