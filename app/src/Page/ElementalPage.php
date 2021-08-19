<?php

namespace Mak001\Portfolio\Page;

use DNADesign\Elemental\Extensions\ElementalPageExtension;

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
}
