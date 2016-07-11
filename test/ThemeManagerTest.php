<?php

use Koodilabs\Workflow\ThemeManager;

class ThemeManagerTest extends TestCase
{
    public function test_generate_theme_structure_errors()
    {
        $manager = new ThemeManager([
            ''
        ]);
    }
}
