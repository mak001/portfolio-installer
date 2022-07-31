<?php

namespace Mak001\Portfolio\Page;

use Mak001\Portfolio\Controller\ProjectHolderController;
use Mak001\Portfolio\Model\Breadcrumb;
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
     * @inheritDoc
     */
    public function onBeforeUpdateBreadcrumbItems(&$crumbItems): void
    {
        parent::onBeforeUpdateBreadcrumbItems($crumbItems);
        $controller = Controller::curr();
        if ($controller instanceof ProjectHolderController) {
            if ($controller->getAction() == 'frameworks') {
                $crumbItems->push(new Breadcrumb(
                    $this->FrameworkLink(),
                    'Frameworks',
                    $this->getPageLevel() + 1
                ));

                if ($framework = $controller->getFramework()) {
                    $crumbItems->push($framework);
                }
            }

            if ($controller->getAction() == 'languages') {
                $crumbItems->push(new Breadcrumb(
                    $this->LanguageLink(),
                    'Languages',
                    $this->getPageLevel() + 1
                ));

                if ($language = $controller->getLanguage()) {
                    $crumbItems->push($language);
                }
            }
        }
    }
}
