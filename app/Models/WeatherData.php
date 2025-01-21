<?php

namespace App\Models;

class WeatherData
{
	private $api_key = '026364dacbb6440394562313250701';
	protected $file_name = '/tmp/WeatherFile.json';

	protected function readFile()
	{
		$handle = fopen($this->file_name, 'r') or die("Unable to open file!");
		$weather_data = fread($handle, filesize($this->file_name));
		fclose($handle);

		return json_decode($weather_data) ?: [];
	}

	protected function writeFile($weather_data)
	{
		$handle = fopen($this->file_name, 'w') or die("Unable to open file!");
		fwrite($handle, json_encode($weather_data));
		fflush($handle); // Flush the buffer
		fclose($handle);
	}

	protected function getWeatherData($city, $country)
	{

		$api_url = "http://api.weatherapi.com/v1/forecast.json?key=".$this->api_key."&q=".urlencode($city.', '.$country)."&days=5&aqi=no&alerts=no";

		$api_response = file_get_contents($api_url);

		return $api_response;
	}
}