<?php

require_once("./weather.php");

$lat = "40.71455";
$lng = "-74.00712";

$weatherForecast = new WeatherForecast($lat, $lng);

$weatherForecast->getCurrentWeatherPerCity();
