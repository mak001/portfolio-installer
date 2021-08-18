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
use TractorCow\Colorpicker\Color;
use TractorCow\Colorpicker\Forms\ColorField;

/**
 * @property string Title
 * @property string BackgroundColor
 * @property string ForegroundColor
 * @property string URLSegment
 * @property string Description
 *
 * @property int ProjectHolderID
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
        'BackgroundColor' => 'Color',
        'ForegroundColor' => 'Varchar',
        'URLSegment' => 'Varchar',
        'Description' => 'Text',
    ];

    /**
     * @var string[]
     * @config
     */
    private static $has_one = [
        'ProjectHolder' => ProjectHolder::class,
    ];

    /**
     * @var string[]
     * @config
     */
    private static $belongs_many_many = [
        'Projects' => Project::class,
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
            new ColorField('BackgroundColor', 'Background Color'),
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
     * @inheritDoc
     */
    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $this->ForegroundColor = $this->getTextColorStyle($this->BackgroundColor);
    }

    /**
     * originally from ColorField
     *
     * @param string $color
     * @return string
     */
    public function getTextColorStyle(string $color): string
    {
        // change alpha component depending on disabled state
        if ($color) {
            list($R, $G, $B) = Color::HEX_TO_RGB($color);
            $luminance = Color::RGB_TO_LUMINANCE($R, $G, $B);
            // return color as hex and as rgba values (hex is fallback for IE-8)
            return ($luminance > 0.5) ?
                'color: #000; color: rgba(0, 0, 0, 1);' :
                'color: #fff; color: rgba(255, 255, 255, 1);';
        }
        return 'color: #000; color: rgba(0, 0, 0, 1);';
    }

}
