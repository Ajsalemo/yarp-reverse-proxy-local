<?php

class WeatherForecast
{
    private $newYorkLat;
    private $newYorkLng;
    private $tokyoLat;
    private $tokyoLng;
    private $parisLat;
    private $parisLng;
    private $openWeatherMapApiKey;

    public function __construct($openWeatherMapApiKey, $newYorkLat, $newYorkLng, $tokyoLat, $tokyoLng, $parisLat, $parisLng)
    {
        $this->newYorkLat = $newYorkLat;
        $this->newYorkLng = $newYorkLng;
        $this->tokyoLat = $tokyoLat;
        $this->tokyoLng = $tokyoLng;
        $this->parisLat = $parisLat;
        $this->parisLng = $parisLng;
        $this->openWeatherMapApiKey = $openWeatherMapApiKey;
    }

    // Create a function to create the Open Weather Map API endpoint each city uses
    // This is so we don't have to keep creating a separate variable per city for the endpoint
    public function constructApiEndpointForCity($lat, $lng)
    {
        $openWeatherMapEndpoint = "api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lng&appid=$this->openWeatherMapApiKey";
        return $openWeatherMapEndpoint;
    }

    public function getCurrentWeatherForNewYork()
    {
        $curl = curl_init($this->constructApiEndpointForCity($this->newYorkLat, $this->newYorkLng));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response . PHP_EOL;
    }
}
