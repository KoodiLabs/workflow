<?php

namespace Koodilabs\Workflow;

use League\Flysystem\Filesystem;

/**
 * Class ThemeManager
*
 * @package Koodilabs\Workflow
*/
class ThemeManager
{

    protected $themes;

    /**
     * ThemeManager constructor.
     * @param Filesystem $themes
     */
    public function __construct(Filesystem $themes)
    {
        $this->themes = $themes;
    }

    /**
     * TODO:
     *      - Check if theme folder exist
     *      - create dir for given name
     *      -
     * @param $fromName
     * @param $toName
     */
    public function publish($fromName, $toName)
    {
        $contents = $this->themes->listContents($fromName, true);
        dd(get_class_methods($contents));
    }

    public function createDirs()
    {

    }

}