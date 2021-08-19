<?php

namespace Mak001\Portfolio\Model;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;
use SilverStripe\ORM\DataObject;
use SilverStripe\SiteConfig\SiteConfig;

/**
 * @property string Title
 * @property string Icon
 * @property string URL
 * @property bool Button
 * @property bool Outline
 * @property bool Dark
 *
 * @property int SiteConfigID
 * @method SiteConfig SiteConfig()
 */
class Link extends DataObject
{
    /**
     * @var string
     * @config
     */
    private static $table_name = 'Link';

    /**
     * @var string[]
     * @config
     */
    private static $db = [
        'Title' => 'Varchar',
        'Icon' => 'Varchar',
        'URL' => 'Varchar',
    ];

    /**
     * @var string[]
     * @config
     */
    private static $has_one = [
        'SiteConfig' => SiteConfig::class,
    ];

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->addFieldToTab(
                'Root.Main',
                HiddenField::create('SiteConfigID', 'SiteConfigID', $this->SiteConfigID)
            );
        });
        return parent::getCMSFields();
    }
}
