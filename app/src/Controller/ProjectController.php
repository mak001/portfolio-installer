<?php

namespace Mak001\Portfolio\Controller;

use Mak001\Portfolio\Page\Project;
use SilverStripe\View\Requirements;

/**
 * @mixin Project
 */
class ProjectController extends \PageController
{

    /**
     * @inheritDoc
     */
    protected function init(): void
    {
        parent::init();

        Requirements::themedCSS("dist/css/project.css", null, ['preload' => true]);
    }
}
