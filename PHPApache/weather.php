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

    // ** Params **
    // $openWeatherMapApiKey, $newYorkLat, $newYorkLng, $tokyoLat, $tokyoLng, $parisLat
    // The above params are all passed in through the new instance of this class in index.php
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
        $openWeatherMapEndpoint = "api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lng&units=imperial&appid=$this->openWeatherMapApiKey";
        return $openWeatherMapEndpoint;
    }

    // This is the response data from calling the OpenWeatherMap API endpoint
    // This can be shared across city functions
    public function constructApiEndpointResponse($curl)
    {
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Accept: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // Execute the GET request to the specified endpoint passed in through getCurrentWeatherFor<cityname>
        $response = curl_exec($curl);
        // Close the cURL session
        curl_close($curl);
        // Push the response to the specified city array
        $jsonRes = json_decode($response);

        // Send back a structured response
        echo PHP_EOL;
        echo "City: " . $jsonRes->name . ", " . $jsonRes->sys->country . PHP_EOL;
        echo "Forecast: " . $jsonRes->weather[0]->main . PHP_EOL;
        echo "Description: " . $jsonRes->weather[0]->description . PHP_EOL;
        echo "Temperature: " . $jsonRes->main->temp . PHP_EOL;
        echo "Temperature (feels like): " . $jsonRes->main->feels_like . PHP_EOL;
        echo "Wind: " . $jsonRes->wind->speed . PHP_EOL;
        echo PHP_EOL;
    }

    // Get the current weather for New York
    public function getCurrentWeatherForNewYork()
    {
        $curl = curl_init($this->constructApiEndpointForCity($this->newYorkLat, $this->newYorkLng));
        $this->constructApiEndpointResponse($curl);
    }

    // Get the current weather for Tokyo
    public function getCurrentWeatherForTokyo()
    {
        $curl = curl_init($this->constructApiEndpointForCity($this->tokyoLat, $this->tokyoLng));
        $this->constructApiEndpointResponse($curl);
    }

    // Get the current weather for Paris
    public function getCurrentWeatherForParis()
    {
        $curl = curl_init($this->constructApiEndpointForCity($this->parisLat, $this->parisLng));
        $this->constructApiEndpointResponse($curl);
    }
}
