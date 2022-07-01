<?php

namespace Mak001\Portfolio\Page;

use DNADesign\Elemental\Extensions\ElementalPageExtension;
use DNADesign\Elemental\Models\ElementContent;

/**
 * @mixin ElementalPageExtension
 */
class ElementalPage extends \Page
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'ElementalPage';

    /**
     * @var string[]
     * @config
     */
    private static $extensions = [
        ElementalPageExtension::class,
    ];

     /**
     * @var string[]
     * @config
     */
    private static $disallowed_elements = [
        ElementContent::class,
    ];
}
