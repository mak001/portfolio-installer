<?php

namespace Mak001\Portfolio\Page;

class ProjectHolder extends \Page
{
    /**
     * @var string[]
     * @config
     */
    private static $allowed_children = [
        Project::class,
    ];

    /**
     * @param string|null $lang
     * @return string
     */
    public function LanguageLink(string $lang = null): string
    {
        if ($lang === null) {
            return $this->Link('languages');
        }
        return $this->Link('languages/' . $lang);
    }

    /**
     * @param string|null $frame
     * @return string
     */
    public function FrameworkLink(string $frame = null): string
    {
        if ($frame === null) {
            return $this->Link('frameworks');
        }
        return $this->Link('frameworks/' . $frame);
    }
}
