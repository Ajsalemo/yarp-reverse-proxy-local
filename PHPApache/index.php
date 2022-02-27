<?php

require_once("./weather.php");

// New York City lat/lng coordinates
$newYorkLat = "40.71455";
$newYorkLng = "-74.00712";

// Tokyo lat/lng coordinates
$tokyoLat = "35.68321";
$tokyoLng = "139.80894";

// Paris lat/lng coordinates
$parisLat = "48.863186";
$parisLng = "2.339754";

// Open Weather Map API key
$openWeatherMapApiKey = getenv("OPEN_WEATHER_MAP_API_KEY");

$weatherForecast = new WeatherForecast($openWeatherMapApiKey, $newYorkLat, $newYorkLng, $tokyoLat, $tokyoLng, $parisLat, $parisLng);

$weatherForecast->getCurrentWeatherForNewYork();
