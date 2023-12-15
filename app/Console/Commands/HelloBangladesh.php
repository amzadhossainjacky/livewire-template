<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloBangladesh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'greeting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info('Hello Bangladesh');
    }
}
