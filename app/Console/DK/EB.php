<?php

namespace App\Console\DK;

use Illuminate\Console\Command;

class EB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:dk:eb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crals EB and saves content';


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

    }
}
