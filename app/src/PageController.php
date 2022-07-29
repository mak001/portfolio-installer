<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\View\Requirements;

    class PageController extends ContentController
    {
        /**
         * @inheritDoc
         * @var string[]
         * @config
         */
        private static $allowed_actions = [];

        /**
         * @inheritDoc
         */
        protected function init(): void
        {
            parent::init();
            Requirements::css(
                'themes/portfolio-openprops/dist/css/open-props/extra/normalize.css',
                null,
                ['push' => true]
            );
            Requirements::css(
                'themes/portfolio-openprops/dist/css/main.css',
                null,
                ['push' => true]
            );
            Requirements::css(
                'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css',
                null,
                ['preload' => true]
            );
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
        }
    }
}
