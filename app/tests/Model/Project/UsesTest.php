<?php

namespace Mak001\Portfolio\Test\Model\Project;

use Mak001\Portfolio\Model\Project\Uses;
use Mak001\Portfolio\Page\ProjectHolder;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class UsesTest extends SapphireTest
{
    /**
     * @inheritDoc
     */
    protected static $fixture_file = "../../fixtures.yml";

    public function testGetCMSFields(): void
    {
        /** @var Uses $object */
        $object = $this->getMockBuilder(Uses::class)
            ->onlyMethods(['getAbsoluteLURL' => 'TEST'])
            ->getMock();

        $this->assertInstanceOf(FieldList::class, $object->getCMSFields());
    }

    public function testLink(): void
    {
        /** @var Uses $object */
        $object = Uses::create();

        $this->expectException(\Exception::class);
        $this->expectExceptionMessageMatches("/ must implement Link\(\)\$/");
        $object->Link();
    }

    public function testGetAbsoluteLURL(): void
    {
        /** @var Uses $object */
        $object = Uses::create();

        $this->expectException(\Exception::class);
        $this->expectExceptionMessageMatches("/ must implement getAbsoluteLURL\(\)\$/");
        $object->getAbsoluteLURL();
    }

    public function testAbsoluteLink(): void
    {
        /** @var Uses $object */
        $object = Uses::create();

        $this->expectException(\Exception::class);
        $this->expectExceptionMessageMatches("/ must implement Link\(\)\$/");
        $object->Link();
    }

    public function testAbsoluteLinkWithAlternate(): void
    {
        /** @var Uses $object */
        $object = $this->getMockBuilder(Uses::class)
            ->addMethods(['alternateAbsoluteLink' => 'ALTERNATE'])
            ->getMock();

        $this->assertEquals('ALTERNATE', $object->AbsoluteLink());
    }


    public function testGetMenuTitle(): void
    {
        /** @var Uses $object */
        $object = Uses::create();

        $object->Title = 'TEST';
        $this->assertEquals('TEST', $object->getMenuTitle());

        $object->Title = 'TEST-2';
        $this->assertEquals('TEST-2', $object->getMenuTitle());
    }

    public function testGetProjectHolder(): void
    {
        /** @var Uses $object */
        $object = Uses::create();
        $this->assertInstanceOf(ProjectHolder::class, $object->getProjectHolder());
    }

    public function testGetPageLevelWithHolder(): void
    {
        /** @var Uses $object */
        $object = Uses::create();
        $this->assertEquals($object->getPageLevel(), 3);
    }

    public function testGetPageLevelWithoutHolder(): void
    {
        /** @var Uses $object */
        $object = $this->getMockBuilder(Uses::class)
            ->onlyMethods(['getProjectHolder'])
            ->getMock();

        $this->assertEquals($object->getPageLevel(), 0);
    }
}
