<?php

namespace Mak001\Portfolio\Test\Model;

use Mak001\Portfolio\Model\Breadcrumb;
use SilverStripe\Dev\SapphireTest;

class BreadcrumbTest extends SapphireTest
{
    /**
     * @return void
     */
    public function testConstructWithLink()
    {
        $crumb = new Breadcrumb('link', 'Title', 1);
        $this->assertFalse($crumb->Unlinked);
        $this->assertEquals('link', $crumb->Link);
    }

    /**
     * @return void
     */
    public function testConstructWithoutLink()
    {
        $crumb = new Breadcrumb(false, 'Title', 1);
        $this->assertTrue($crumb->Unlinked);
        $this->assertFalse($crumb->Link);
    }
}