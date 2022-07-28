<?php

namespace Mak001\Portfolio\Test\Page;

use Mak001\Portfolio\Page\Project;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;

class ProjectTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = "../fixtures.yml";

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(Project::class, 'portfolio');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertInstanceOf(GridField::class, $fields->dataFieldByName('Languages'));
        $this->assertInstanceOf(GridField::class, $fields->dataFieldByName('Frameworks'));
        $this->assertInstanceOf(GridField::class, $fields->dataFieldByName('Sources'));
    }
}
