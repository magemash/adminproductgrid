<?php
class MageMash_Adminproductgrid_Block_Adminhtml_Menu extends Mage_Adminhtml_Block_Page_Menu
{
    public function getMenuArray()
    {
        //Load standard menu
        $parentArr = parent::getMenuArray();

        //Prepare "View Sites" menu
        $parentArr['custom_grids'] = array(
            'label' => 'Custom Grids',
            'active'=>false ,
            'sort_order'=>0,
            'click' => 'return false;',
            'url'=>'#',
            'level'=>0,
            'last'=> true,
            'children' => array()
        );

        $app = Mage::app();

        $grids = Mage::helper('adminproductgrid')->getGrids();

        $i = 0;
        foreach ($grids as $grid) {

            $item = array(
                'label' => $grid->getGridName(),
                'active' => false ,
                'url' => Mage::helper("adminhtml")->getUrl('adminproductgrid/adminhtml_view/index/id/' . $grid->getId()),
                'sort_order' => $i++ * 10,
                'level' => 1,
                'children' => array()
            );

            $parentArr['custom_grids']['children'][$i - 1] = $item;
        }

        return $parentArr;

        $j = 0;

        $allWebsites = $app->getWebsites();
        $totalWebsiteCount = count($allWebsites) - 1;

        foreach ($allWebsites as $_eachWebsiteId => $websiteVal){
            $_storeName = $app->getWebsite($_eachWebsiteId)->getName();
            $_websiteUrl = array(
                'label' => $_storeName,
                'active' => false ,
                'url' => '#',
                'click' => "return false",
                'sort_order' => $j++ * 10,
                'level' => 1,
                'children' => array()
            );

            if(count($parentArr['view_sites']['children']) == $totalWebsiteCount){
                $_websiteUrl['last'] = true;
            } else {
                $_websiteUrl['last'] = false;
            }

            $parentArr['view_sites']['children'][$j - 1] = $_websiteUrl;

            $allStores = $app->getWebsite($app->getWebsite($_eachWebsiteId)->getId())->getStores();
            $totalCount = count($allStores);
            $i = 0;
            foreach ($allStores as $_eachStoreId => $val){
                $_websiteId = $app->getStore($_eachStoreId)->getWebsiteId();
                if($_websiteId == $j){
                    $_storeName = $app->getStore($_eachStoreId)->getName();
                    $baseUrl = $app->getStore($_eachStoreId)->getUrl();
                    $_websiteUrl = array(
                        'label' => $_storeName,
                        'active' => false ,
                        'click' => "window.open(this.href, 'Website - ' + this.href); return false;",
                        'sort_order' => $i++ * 10,
                        'level' => 2,
                        'url' => $baseUrl
                    );

                    if(count($parentArr['view_sites']['children'][$j - 1]['children']) + 1 == $totalCount or $totalCount == 0)
                        $_websiteUrl['last'] = true;
                    else
                        $_websiteUrl['last'] = false;

                    $parentArr['view_sites']['children'][$j - 1]['children'][$i] = $_websiteUrl;
                }
            }
        }
        return $parentArr;
    }
}