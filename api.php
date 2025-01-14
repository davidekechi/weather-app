<?php

function readWeatherData() {
	$file_path = '/tmp/WeatherFile.json';

	clearstatcache(); // Clear PHP's file status cache

	if (!file_exists($file_path) || filesize($file_path) === 0) {
        return [];
    }

	$weather_file = fopen($file_path, 'r') or die("Unable to open file!");
	$stored_data = fread($weather_file, filesize($file_path));
	fclose($weather_file);

	return json_decode($stored_data) ?: [];
}

function writeWeatherData($new_weather_data, $city, $country) {

	$weather_data_store = [];

	$weather_data_store[$city."_".$country] = $new_weather_data;


	if (file_exists('/tmp/WeatherFile.json')) {
		$weather_data = array_merge(((array) readWeatherData()), ((array) $weather_data_store));
	}else{
		$weather_data = $weather_data_store;
	}

	$handle = fopen('/tmp/WeatherFile.json', 'w') or die("Unable to open file!");
	fwrite($handle, json_encode($weather_data));
	fflush($handle); // Flush the buffer
	fclose($handle);

	searchWeatherData($city, $country);
}

function getWeatherData($city, $country) {

	$api_url = "http://api.weatherapi.com/v1/forecast.json?key=026364dacbb6440394562313250701&q=".urlencode($city.', '.$country)."&days=5&aqi=no&alerts=no";

	$api_response = file_get_contents($api_url);

	writeWeatherData(json_decode($api_response), $city, $country);
}

function searchWeatherData($city, $country) {
	$key = $city."_".$country;

	if (file_exists('/tmp/WeatherFile.json')) {

		$stored_weather_data = (array) readWeatherData();

		if (array_key_exists($key, $stored_weather_data) && !empty($stored_weather_data[$key])) {
			$city_weather_data = $stored_weather_data[$key];

			echo 'printing from file...'. PHP_EOL;
			print_r($city_weather_data);
		}else{
			echo 'printing online...'. PHP_EOL;
			unset($stored_weather_data[$key]);
			getWeatherData($city, $country);
		}
	}else{
		getWeatherData($city, $country);
	}
}

searchWeatherData('Bauchi', 'Nigeria');