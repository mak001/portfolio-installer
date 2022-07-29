<?php

namespace Mak001\Portfolio\ORM;

use Mak001\Portfolio\Model\Link;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\HasManyList;
use SilverStripe\SiteConfig\SiteConfig;

/**
 * @method HasManyList Links()
 *
 * @property-read SiteConfig|SiteConfigExtension $owner
 */
class SiteConfigExtension extends DataExtension
{

    /**
     * @var string[]
     * @config
     */
    private static $has_many = [
        'Links' => Link::class,
    ];

    /**
     * @inheritDoc
     */
    public function updateCMSFields(FieldList $fields): void
    {
        $links = new GridField('Links', 'Links', $this->owner->Links());
        $links->setConfig(GridFieldConfig_RelationEditor::create());
        $fields->addFieldToTab('Root.Links', $links);
        parent::updateCMSFields($fields);
    }
}
