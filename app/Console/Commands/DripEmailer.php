<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;


class DripEmailer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user_lname} {user_fname?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send greeting e-mails to a user';

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
        $username=$this->argument('user_lname')." ".$this->argument('user_fname');
       $this->info( $this->send($username));
        //return $this->send($username);
    }

    private function send($userName){
        return  "Hello ".$userName;
    }
}
