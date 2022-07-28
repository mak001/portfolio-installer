<?php

namespace Mak001\Portfolio\Model\Project;

use Mak001\Portfolio\Page\Project;
use Mak001\Portfolio\Page\ProjectHolder;
use SilverStripe\Assets\Image;
use SilverStripe\CMS\Forms\SiteTreeURLSegmentField;
use SilverStripe\Control\Director;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;

/**
 * @property string Title
 * @property string BackgroundColor
 * @property string ForegroundColor
 * @property string URLSegment
 * @property string Description
 *
 * @method Image Image()
 *
 * @method ManyManyList|Project[] Projects()
 */
class Uses extends DataObject
{
    /**
     * @var string
     * @config
     */
    private static $table_name = 'ProjectUses';

    /**
     * @var string[]
     * @config
     */
    private static $db = [
        'Title' => 'Varchar',
        'URLSegment' => 'Varchar',
        'Description' => 'Text',
    ];

    /**
     * @var string[]
     * @config
     */
    private static $has_one = [
        'Image' => Image::class,
    ];

    /**
     * @var string[]
     * @config
     */
    private static $owns = [
        'Image'
    ];

    /**
     * @var string[][]
     * @config
     */
    private static $indexes = [
        "URLSegment" => [
            'type' => 'unique',
            'columns' => [
                'URLSegment',
            ],
        ],
    ];

    /**
     * @var string[]
     * @config
     */
    private static $summary_fields = [
        'Title',
    ];

    /**
     * @inheritDoc
     */
    public function getCMSFields(): FieldList
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $urlSegment = new SiteTreeURLSegmentField("URLSegment", $this->fieldLabel('URLSegment'));

            $prefix = $this->getAbsoluteLURL();
            $urlSegment->setURLPrefix($prefix);

            $helpText = _t(
                'SiteTreeURLSegmentField.HelpChars',
                'Special characters are automatically converted or removed.'
            );
            $urlSegment->setHelpText($helpText);

            $fields->addFieldsToTab('Root.Main', [
                TextField::create('Title'),
                $urlSegment,
                TextareaField::create('Description')
            ]);
        });

        return parent::getCMSFields();
    }

    /**
     * @return string
     */
    public function Link(): string
    {
        return '';
    }

    /**
     * Get the absolute URL for this page, including protocol and host.
     *
     * @return string
     */
    public function AbsoluteLink()
    {
        if ($this->hasMethod('alternateAbsoluteLink')) {
            return $this->alternateAbsoluteLink();
        } else {
            return Director::absoluteURL($this->Link());
        }
    }

    /**
     * Get the title for use in menus for this page.
     * If the MenuTitle field is set it returns that, else it returns the Title field.
     *
     * @return string
     */
    public function getMenuTitle()
    {
        return $this->getField('Title');
    }

    /**
     * @return DataObject|ProjectHolder|null
     */
    public function getProjectHolder(): DataObject
    {
        return ProjectHolder::get()->first();
    }

    /**
     * @return int
     */
    public function getPageLevel()
    {
        return $this->getProjectHolder()->getPageLevel() + 2;
    }
}
