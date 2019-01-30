<?php

namespace App\Console;

use Illuminate\Console\Command;
use App\Provider;
use App\Country;

class AddProvider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:provider {country_code} {name} {link}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new provider and conuntry if it does not exists';


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
        if(Country::where('code',$this->argument('country_code'))->count() > 0){
            $country = Country::where('code',$this->argument('country_code'))->first();
        }else{
            $country = Country::create([
                'code' => $this->argument('country_code')
            ]);
        }
        Provider::create([
            'country_id' => $country->id,
            'name' => $this->argument('name'),
            'link' => $this->argument('link')
        ]);
    }
}
