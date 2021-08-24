<?php

namespace Mak001\Portfolio\Test\Model;

use Mak001\Portfolio\Model\Link;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\ValidationException;

class LinkTest extends SapphireTest
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
        $object = $this->objFromFixture(Link::class, 'google');
        $this->assertInstanceOf(FieldList::class, $object->getCMSFields());
    }

    /**
     *
     */
    public function testGetCMSValidator()
    {
        $object = $this->objFromFixture(Link::class, 'google');
        $object->Title = '';
        $this->expectException(ValidationException::class);
        $object->write();
    }
}
