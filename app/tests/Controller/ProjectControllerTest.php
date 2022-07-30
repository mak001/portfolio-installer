<?php

namespace Mak001\Portfolio\Test\Controller;

use Mak001\Portfolio\Controller\ProjectHolderController;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\View\Requirements;

class ProjectControllerTest extends SapphireTest
{

    public function testInit()
    {
        ProjectHolderController::create()->doInit();
        $css = Requirements::backend()->getCSS();
        $this->assertArrayHasKey('themes\portfolio-openprops\dist\css\project_holder.css', $css);
    }
}
