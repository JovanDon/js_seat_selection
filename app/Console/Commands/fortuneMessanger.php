<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class fortuneMessanger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fortune {--s|short} {--l|long} {--o|option}';

    /**
     * The console  command description.
     *
     * @var string
     */
    protected $description = 'Fortune messages are displayed to user!';
    protected $fortuneMessages = [
                                    'Hope you are fine',
                                    'Fortune messages are cool!'
                                                        ];

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
        if( $this->option('short') && $this->option('long')){
            $this->error( 'message cant be short and long!');
        }
        else if( $this->option('short')){
            $this->info( "short: ".array_random($this->fortuneMessages) );
        }else if( $this->option('long')){
        $this->info( "long: ".array_random($this->fortuneMessages) );
    
        }else
        {
            $this->info(array_random($this->fortuneMessages) );
       
        }
        

    }
}
