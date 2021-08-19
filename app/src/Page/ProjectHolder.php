<?php

namespace Mak001\Portfolio\Page;

use Mak001\Portfolio\Controller\ProjectHolderController;
use SilverStripe\Control\Controller;
use SilverStripe\ORM\ArrayList;

class ProjectHolder extends \Page
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'ProjectHolder';

    /**
     * @var string[]
     * @config
     */
    private static $allowed_children = [
        Project::class,
    ];

    /**
     * @var string
     * @config
     */
    private static $controller_name = ProjectHolderController::class;

    /**
     * @param string|null $lang
     * @return string
     */
    public function LanguageLink(string $lang = null): string
    {
        if ($lang === null) {
            return $this->Link('languages');
        }
        return $this->Link('languages/' . $lang);
    }

    /**
     * @param string|null $frame
     * @return string
     */
    public function FrameworkLink(string $frame = null): string
    {
        if ($frame === null) {
            return $this->Link('frameworks');
        }
        return $this->Link('frameworks/' . $frame);
    }

    /**
     * FeatureCollectionPage constructor.
     * @param ArrayList $breadcrumbs
     */
    public function onBeforeUpdateBreadCrumbItems(&$breadcrumbs)
    {
        parent::onBeforeUpdateBreadcrumbItems($breadcrumbs);
        $controller = Controller::curr();
        if ($controller instanceof ProjectHolderController) {
            $fakePage = \Page::create();
            if ($controller->getAction() == 'frameworks') {
                $fakePage->Title = 'Frameworks';
                $fakePage->URLSegment = 'frameworks';
                $fakePage->ParentID = $this->ID;
                $breadcrumbs->push($fakePage);

                if ($framework = $controller->getFramework()) {
                    $breadcrumbs->push($framework);
                }
            }

            if ($controller->getAction() == 'languages') {
                $fakePage->Title = 'Languages';
                $fakePage->URLSegment = 'languages';
                $fakePage->ParentID = $this->ID;
                $breadcrumbs->push($fakePage);

                if ($language = $controller->getLanguage()) {
                    $breadcrumbs->push($language);
                }
            }
        }
    }
}
