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
     * @inheritDoc
     */
    protected static $fixture_file = "../fixtures.yml";

    /**
     *
     */
    public function testGetCMSFields(): void
    {
        /** @var Link $object */
        $object = $this->objFromFixture(Link::class, 'google');
        $this->assertInstanceOf(FieldList::class, $object->getCMSFields());
    }

    /**
     *
     */
    public function testGetCMSValidator(): void
    {
        /** @var Link $object */

        $object = $this->objFromFixture(Link::class, 'google');
        $this->assertInstanceOf(RequiredFields::class, $object->getCMSValidator());
    }

    /**
     *
     */
    public function testValidateGood(): void
    {
        /** @var Link $object */
        $object = $this->objFromFixture(Link::class, 'google');
        $object->write();

        $this->expectException(ValidationException::class);
        $object->Title = '';
        $object->write();
    }

    /**
     *
     */
    public function testValidateNoTitle(): void
    {
        /** @var Link $object */
        $object = $this->objFromFixture(Link::class, 'google');

        $this->expectException(ValidationException::class);
        $object->Title = '';
        $object->write();
    }

    /**
     *
     */
    public function testValidateNoURL(): void
    {
        /** @var Link $object */
        $object = $this->objFromFixture(Link::class, 'google');

        $this->expectException(ValidationException::class);
        $object->URL = '';
        $object->write();
    }
}
