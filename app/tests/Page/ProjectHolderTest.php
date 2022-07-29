<?php

namespace Mak001\Portfolio\Test\Page;

use Mak001\Portfolio\Page\ProjectHolder;
use SilverStripe\Dev\SapphireTest;

class ProjectHolderTest extends SapphireTest
{
    /**
     * @inheritDoc
     */
    protected static $fixture_file = "../fixtures.yml";

    /**
     *
     */
    public function testLanguageLinkNoLang(): void
    {
        /** @var ProjectHolder $object */
        $object = $this->objFromFixture(ProjectHolder::class, 'holder');
        $this->assertStringEndsWith('languages', $object->LanguageLink());
    }

    /**
     *
     */
    public function testLanguageLinkWithLang(): void
    {
        /** @var ProjectHolder $object */
        $object = $this->objFromFixture(ProjectHolder::class, 'holder');
        $this->assertStringEndsWith('languages/lang', $object->LanguageLink('lang'));
    }

        /**
     *
     */
    public function testFrameworkLinkNoFrame(): void
    {
        /** @var ProjectHolder $object */
        $object = $this->objFromFixture(ProjectHolder::class, 'holder');
        $this->assertStringEndsWith('frameworks', $object->FrameworkLink());
    }

    /**
     *
     */
    public function testFrameworkLinkWithFrame(): void
    {
        /** @var ProjectHolder $object */
        $object = $this->objFromFixture(ProjectHolder::class, 'holder');
        $this->assertStringEndsWith('frameworks/frame', $object->FrameworkLink('frame'));
    }
}
