<?php

namespace Mak001\Portfolio\Test\Model;

use Mak001\Portfolio\Model\Link;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;

class LinkTest extends SapphireTest
{
    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = Link::create();
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertInstanceOf(HiddenField::class, $fields->fieldByName('SiteConfigID'));
    }
}
