<?php

namespace Controllers;

use app\Models\WeatherData;

class WeatherDataController extends WeatherData
{
	public $api_key = 12345;

	public function searchWeatherData($request)
	{
		$city = "Lagos";
		$country = "Nigeria";

		if ($request['q'] && $request['q'] != null) {
			$city = trim(explode(",", $request['q'])[0]);
			$country = trim(explode(",", $request['q'])[1]);
		}

		$key = $city."_".$country;

		if (file_exists($this->file_name)) {

			$stored_weather_data = (array) $this->readWeatherData();

			if (array_key_exists($key, $stored_weather_data) && !empty($stored_weather_data[$key])) {
				$city_weather_data = $stored_weather_data[$key];

				if (explode(" ", $city_weather_data->current->last_updated)[0] == date("Y-m-d")) {
					$forecasts = $city_weather_data->forecast->forecastday;

					foreach ($forecasts[0]->hour as $hour) {
						if ($hour->time == date("Y-m-d h:00")) {
							
							// Set the content type to JSON
							// header('Content-Type: application/json');

							echo 'from file...<hr/>';
							// Output JSON data
							echo json_encode($hour);
						}
					}
				}else{
					echo 'online1...<hr/>';
					$this->writeWeatherData(json_decode($this->getWeatherData($city, $country)), $city, $country);
				}
			}else{
				echo 'online2...<hr/>';
				$this->writeWeatherData(json_decode($this->getWeatherData($city, $country)), $city, $country);
			}
		}else{
			echo 'online3...<hr/>';
			$this->writeWeatherData(json_decode($this->getWeatherData($city, $country)), $city, $country);
		}
	}

	public function readWeatherData()
	{
		clearstatcache(); // Clear PHP's file status cache

		if (!file_exists($this->file_name) || filesize($this->file_name) === 0) {
	        return [];
	    }

	    return $this->readFile();
	}

	public function writeWeatherData($new_weather_data, $city, $country)
	{
		$key = $city."_".$country;

		$weather_data_store = [];

		$weather_data_store[$key] = (array) $new_weather_data;


		if (file_exists($this->file_name)) {
			$stored_weather_data = (array) $this->readWeatherData();
			unset($stored_weather_data[$key]);
			$weather_data = array_merge($stored_weather_data, $weather_data_store);
		}else{
			$weather_data = $weather_data_store;
		}

		$this->writeFile($weather_data);

		$this->searchWeatherData(['q' => $city.', '.$country]);
	}
}