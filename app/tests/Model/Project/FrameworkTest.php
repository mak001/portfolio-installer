<?php

namespace Mak001\Portfolio\Test\Model\Project;

use Mak001\Portfolio\Model\Project\Framework;
use SilverStripe\Dev\SapphireTest;

class FrameworkTest extends SapphireTest
{
    /**
     * @inheritDoc
     */
    protected static $fixture_file = "../../fixtures.yml";

    public function testLink(): void
    {
        /** @var Framework $object */
        $object = Framework::create();
        $object->URLSegment = 'FRAME';

        $this->assertStringEndsWith('FRAME', $object->Link());
    }

    public function testLinkNoHolder(): void
    {
        /** @var Framework $object */
        $object = $this->getMockBuilder(Framework::class)
            ->onlyMethods(['getProjectHolder'])
            ->getMock();
        $object->URLSegment = 'FRAME';

        $this->assertEquals('', $object->Link());
    }

    public function testGetAbsoluteLURL(): void
    {
        /** @var Framework $object */
        $object = Framework::create();
        $this->assertStringEndsWith('frameworks/', $object->getAbsoluteLURL());
    }

    public function testGetAbsoluteLURLNoHolder(): void
    {
        /** @var Framework $object */
        $object = $this->getMockBuilder(Framework::class)
            ->onlyMethods(['getProjectHolder'])
            ->getMock();
        $this->assertEquals('', $object->getAbsoluteLURL());
    }
}
