<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\ORM\ArrayList;

    class Page extends SiteTree
    {
        /**
         * @var array
         * @config
         */
        private static $db = [];

        /**
         * @var array
         * @config
         */
        private static $has_one = [];

        /**
         * Returns a list of breadcrumbs for the current page.
         *
         * @param int $maxDepth The maximum depth to traverse.
         * @param boolean|string $stopAtPageType ClassName of a page to stop the upwards traversal.
         * @param boolean $showHidden Include pages marked with the attribute ShowInMenus = 0
         *
         * @return ArrayList
         */
        public function getBreadcrumbItems($maxDepth = 20, $stopAtPageType = false, $showHidden = false)
        {
            $crumbItems = parent::getBreadcrumbItems($maxDepth, $stopAtPageType, $showHidden);
            $this->onBeforeUpdateBreadcrumbItems($crumbItems);
            $this->extend('updateBreadCrumbItems', $crumbItems);
            return $crumbItems;
        }

        /**
         * @param ArrayList $crumbItems
         */
        public function onBeforeUpdateBreadcrumbItems(&$crumbItems)
        {
            $this->extend('onBeforeUpdateBreadCrumbItems', $crumbItems);
        }
    }
}
