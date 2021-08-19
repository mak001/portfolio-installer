<?php

namespace Mak001\Portfolio\Model\Project;

use Mak001\Portfolio\Page\Project;
use Mak001\Portfolio\Page\ProjectHolder;
use SilverStripe\CMS\Forms\SiteTreeURLSegmentField;
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
 * @method ProjectHolder ProjectHolder()
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
     * @inheritDoc
     */
    public function getCMSFields(): FieldList
    {
        $urlSegment = new SiteTreeURLSegmentField("URLSegment", $this->fieldLabel('URLSegment'));

        $prefix = $this->getAbsoluteLURL();
        $urlSegment->setURLPrefix($prefix);

        $helpText = _t('SiteTreeURLSegmentField.HelpChars', ' Special characters are automatically converted or removed.');
        $urlSegment->setHelpText($helpText);

        return FieldList::create(array(
            TextField::create('Title'),
            $urlSegment,
            TextareaField::create('Description')
        ));
    }

    /**
     * @return string
     */
    public function Link(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function getAbsoluteLURL(): string
    {
        return '';
    }

    /**
     * Get the title for use in menus for this page. If the MenuTitle field is set it returns that, else it returns the
     * Title field.
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
