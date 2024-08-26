<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class AddCity extends Command
{
    protected $signature = 'city:add {name} {openWeatherCode?}';  // Make code optional
    protected $description = 'Add a city with name and OpenWeather code (optional)';

    public function handle()
    {
        $name = $this->argument('name');
        $code = Str::slug($name);  // Generate slug if code not provided

        // Check if the code is unique
        if (City::where('code', $code)->exists()) {
            $this->error("A city with code {$code} already exists.");
            return;
        }

        City::create([
            'name' => $name,
            'code' => $code,
            'owid' => $this->argument('openWeatherCode'),
        ]);

        $this->info("City {$name} added successfully with code: {$code}");
    }
}
