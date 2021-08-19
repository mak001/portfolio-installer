<?php

namespace Mak001\Portfolio\Page;

use DNADesign\Elemental\Extensions\ElementalPageExtension;

/**
 * @mixin ElementalPageExtension
 */
class ResumePage extends \Page
{
    /**
     * @var string
     * @config
     */
    private static $table_name = 'ResumePage';

    /**
     * @var string[]
     * @config
     */
    private static $extensions = [
        ElementalPageExtension::class,
    ];
}
