let searchForm = $(".searchForm")[0];

// let todayTemperature = $("#todayTemperature")[0].value;
// let todayConditionText = $("#todayConditionText")[0].value;
// let todayCity = $("#todayCity")[0].value;
// let todayDate = $("#todayDate")[0].value;
// let todayWindSpeed = $("#todayWindSpeed")[0].value;
// let todayHumidity = $("#todayHumidity")[0].value;
// let todayPressure = $("#todayPressure")[0].value;
// let todayVisibility = $("#todayVisibility")[0].value;
// let todaySunrise = $("#todaySunrise")[0].value;
// let todaySunset = $("#todaySunset")[0].value;

searchForm.addEventListener('submit', function(event) {
	event.preventDefault();
	
	let searchInput = $(".searchInput")[0].value;

	let city = (searchInput.split(",")[0]).trim();
	let country = (searchInput.split(",")[1]).trim();

	getWeatherData(city, country);
});

function getWeatherData(city, country) {

	fetch('./api.php')
	    .then(response => {
	        if (!response.ok) {
	            throw new Error('Network response was not ok');
	        }
	        return response.json(); // Parse the JSON from the response
	    })
	    .then(data => {

	        console.log(data); // Access the JSON data here
	        // Example: Display the temperature
	        // console.log(`Temperature: ${data.temperature}°C`);

	        Object.entries(data).forEach(([key, value]) => {

	        	if ($("#" + key)[0]) {
	        		$("#" + key)[0].innerHTML = value;
	        	}

	        	// console.log("#"+key);
	        	// $("#" + key)[0].innerHTML = value;
	        });
	    })
	    .catch(error => {
	        console.error('There was a problem with the fetch operation:', error);
	    });
}