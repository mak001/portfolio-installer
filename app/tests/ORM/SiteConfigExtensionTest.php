<?php

namespace Mak001\Portfolio\Test\ORM;

use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\SiteConfig\SiteConfig;

class SiteConfigExtensionTest extends SapphireTest
{

    public function testUpdateCMSFields():void
    {
        $fields = SiteConfig::current_site_config()->getCMSFields();

        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertInstanceOf(GridField::class, $fields->dataFieldByName('Links'));
    }
}
