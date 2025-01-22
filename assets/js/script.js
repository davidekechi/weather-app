let searchForm = $(".searchForm")[0];

window.addEventListener('load', function() {
	let city = "Lagos";
	let country = "Nigeria";

	getWeatherData(city, country);
});

searchForm.addEventListener('submit', function(event) {
	event.preventDefault();
	
	let searchInput = $(".searchInput")[0].value;

	let city = (searchInput.split(",")[0]).trim();
	let country = (searchInput.split(",")[1]).trim();

	getWeatherData(city, country);
});

function getWeatherData(city, country) {

	fetch('./routes/api.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Parse the JSON from the response
    })
    .then(data => {

        console.log(data); // Access the JSON data here

        Object.entries(data.astro).forEach(([key, value]) => {

        	if ($("#" + key)[0]) {
        		$("#" + key)[0].innerHTML = value;
        	}
        });

        Object.entries(data.attributes).forEach(([key, value]) => {

        	if ($("#" + key)[0]) {
        		$("#" + key)[0].innerHTML = value;
        	}

        	if (key == "condition") {
	        	$("#conditionText")[0].innerHTML = value.text;
        	}
        });
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}