<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{

    public function index()
    {
        $cities = City::all(); // Fetch all cities

        return view('weather.index', compact('cities'));
    }
    
    public function show($code)
    {
        $city = City::where('code', $code)->firstOrFail();

        // Assuming a service that fetches weather data, e.g., OpenWeather API
        $weather = $this->getWeatherForCity($city->owid);

        return view('weather.show', compact('city', 'weather'));
    }

    protected function getWeatherForCity($code)
    {
        return [
            'temperature' => random_int(20, 38) , '°C',
            'description' => 'Cloudy',
        ];
        // todo: check when api key is active
        $apiKey = config('services.openweather.key');
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$code}&appid={$apiKey}&units=metric");
        
        return [
            'temperature' => $response->json()['main']['temp'] . '°C',
            'description' => $response->json()['weather'][0]['description'],
        ];
    }
}
