<?php

class WeatherForecast {
    private $lat;
    private $lng;

    public function __construct($lat, $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function getCurrentWeatherPerCity()
    {
        $openWeatherMapApiKey = getenv("OPEN_WEATHER_MAP_API_KEY");
        $openWeatherMapEndpoint = "api.openweathermap.org/data/2.5/weather?lat=$this->lat&lon=$this->lng&appid=$openWeatherMapApiKey";
        $curl = curl_init($openWeatherMapEndpoint);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response . PHP_EOL;
    }
}