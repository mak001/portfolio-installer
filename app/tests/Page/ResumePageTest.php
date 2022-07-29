<?php

namespace Mak001\Portfolio\Test\Page;

use Mak001\Portfolio\Page\ResumePage;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;

class ResumePageTest extends SapphireTest
{
    /**
     * @inheritDoc
     */
    protected static $fixture_file = "../fixtures.yml";

    /**
     *
     */
    public function testGetCMSFields(): void
    {
        $object = $this->objFromFixture(ResumePage::class, 'resume');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertInstanceOf(GridField::class, $fields->dataFieldByName('Schools'));
        $this->assertInstanceOf(GridField::class, $fields->dataFieldByName('Skills'));
        $this->assertInstanceOf(GridField::class, $fields->dataFieldByName('Jobs'));
    }
}
