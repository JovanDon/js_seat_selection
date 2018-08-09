<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProgressBar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'progress {--seconds=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes a progress Bar for a passed number of seconds';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $seconds= (int) $this->option('seconds');
        $steps=$seconds;
        $bar = $this->output->createProgressBar($steps);

        while($steps) {
            sleep(1);

            $bar->advance();
            $steps--;
        }

        $bar->finish();
    }
}
