<?php

namespace App\Console\DK;

use Illuminate\Console\Command;
use App\Jobs\DK\TV2 as TV2Job;

class TV2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:dk:tv2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crals TV2 and saves content';


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
        app()->make(TV2Job::class)->handle();
    }
}
