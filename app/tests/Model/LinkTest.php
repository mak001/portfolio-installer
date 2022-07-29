<?php

namespace Mak001\Portfolio\Test\Model;

use Mak001\Portfolio\Model\Link;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\RequiredFields;
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
        $this->assertInstanceOf(RequiredFields::class, $object->getCMSValidator());
    }

    /**
     *
     */
    public function testValidateGood()
    {
        $object = $this->objFromFixture(Link::class, 'google');
        $object->write();

        $this->expectException(ValidationException::class);
        $object->Title = '';
        $object->write();
    }

    /**
     *
     */
    public function testValidateNoTitle()
    {
        $object = $this->objFromFixture(Link::class, 'google');

        $this->expectException(ValidationException::class);
        $object->Title = '';
        $object->write();
    }

    /**
     *
     */
    public function testValidateNoURL()
    {
        $object = $this->objFromFixture(Link::class, 'google');

        $this->expectException(ValidationException::class);
        $object->URL = '';
        $object->write();
    }
}
