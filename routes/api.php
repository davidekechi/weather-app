<?php

include '../autoload.php';

$weather_driver = new Controllers\WeatherDataController();
$weather_driver->searchWeatherData($_GET);

// echo $weather_driver->api_key;

// echo $weather_driver->file_name;