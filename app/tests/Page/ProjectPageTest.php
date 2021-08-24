<?php

namespace Mak001\Portfolio\Test\Page;

use Mak001\Portfolio\Page\Project;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;

class ProjectPageTest extends SapphireTest
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
        $this->assertInstanceOf(GridField::class, $fields->fieldByName('Languages'));
        $this->assertInstanceOf(GridField::class, $fields->fieldByName('Frameworks'));
        $this->assertInstanceOf(GridField::class, $fields->fieldByName('Sources'));
    }
}