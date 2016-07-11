<?php

namespace Koodilabs\Workflow\Commands;

use Illuminate\Console\Command;
use Koodilabs\Workflow\ThemeManager;

class ThemeGenerate extends Command
{
    /**
     * @var string
     */
    protected $signature = 'koodilabs:workflow:publish
                        {themeName : Name of theme}
                        {--name= : Output name}';

    /**
     * @var string
     */
    protected $description = 'Generate theme structure';

    /**
     * The theme manager service
     *
     * @var ThemeManager
     */
    protected $manager;

    /**
     * Create a new command instance.
     *
     * @param  ThemeManager  $manager
     */
    public function __construct(ThemeManager $manager)
    {
        parent::__construct();

        $this->manager = $manager;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->manager->publish($this->argument('themeName'), $this->option('name'));
        $this->info('Handle generate structure of theme '.$this->option('name'));
    }
}