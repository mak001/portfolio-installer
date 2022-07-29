<?php

namespace Mak001\Portfolio\Test\Model\Project;

use Mak001\Portfolio\Model\Project\Language;
use SilverStripe\Dev\SapphireTest;

class LanguageTest extends SapphireTest
{
    /**
     * @inheritDoc
     */
    protected static $fixture_file = "../../fixtures.yml";

    public function testLink(): void
    {
        /** @var Language $object */
        $object = Language::create();
        $object->URLSegment = 'LANG';

        $this->assertStringEndsWith('LANG', $object->Link());
    }

    public function testLinkNoHolder(): void
    {
        /** @var Language $object */
        $object = $this->getMockBuilder(Language::class)
            ->onlyMethods(['getProjectHolder'])
            ->getMock();
        $object->URLSegment = 'LANG';

        $this->assertEquals('', $object->Link());
    }

    public function testGetAbsoluteLURL(): void
    {
        /** @var Language $object */
        $object = Language::create();
        $this->assertStringEndsWith('languages/', $object->getAbsoluteLURL());
    }

    public function testGetAbsoluteLURLNoHolder(): void
    {
        /** @var Language $object */
        $object = $this->getMockBuilder(Language::class)
            ->onlyMethods(['getProjectHolder'])
            ->getMock();
        $this->assertEquals('', $object->getAbsoluteLURL());
    }
}
