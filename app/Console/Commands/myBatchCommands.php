<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class myBatchCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:login {--server_address=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'a simple of logging into a remote server';

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
        
        $userName = $this->ask('What is your username?');

        $chosen_domain = $this->ask('What sub domain do you want to log onto?');

        $password = $this->secret('What is the password?');
        $this->line("Hey ".$userName." Your are logged in!");

        $this->info('Checking for updates....');
        $this->call('progress');

        if ($this->confirm('New Updates found! Would you like to update your server tools?')) {
            $this->info('Attempting to update tools....');

            $this->call('progress', [
                 '--seconds' => 30
            ]);
            $this->info('All tools are upto date');

        }
    }
}
