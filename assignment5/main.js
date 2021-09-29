function displayResults(httpresponse) {
	// Convert JSON to Javascript
	console.log(httpresponse);
	let response = JSON.parse(httpresponse);
	console.log(response);

	// If no response, do not display showing ___ out of ___ results
	let num_results = response.total_results;
	if(num_results == 0) {
		document.querySelector("#results").classList.add("hidden");
		if(document.querySelector("#no-results").classList.contains("hidden")) {
			document.querySelector("#no-results").classList.remove("hidden");
		}
		document.querySelector("#no-results").innerHTML = "No results found.";
	}
	else {
		if(document.querySelector("#results").classList.contains("hidden")) {
			document.querySelector("#results").classList.remove("hidden");
		}
		document.querySelector("#no-results").classList.add("hidden");
		document.querySelector("#num-results-showing").innerHTML = response.results.length;
		document.querySelector("#num-results").innerHTML = response.total_results;
	}
	document.querySelector("#search-id").value = "";

	// Clear previous results
	let movies = document.querySelector("#all-movies");
	while(movies.hasChildNodes()) {
		movies.removeChild(movies.lastChild);
	}
	
	// Go through each movie result creating correct structure
	// Ensure elemnts are assigned the proper classes and children
	for(let i = 0; i < response.results.length; i++) {
		let movie = document.createElement("div");

		let backdrop = document.createElement("div");
		backdrop.classList.add("backdrop");
		
		let imgElement = document.createElement("img");
		if(response.results[i].poster_path != null) {
			imgElement.src = "http://image.tmdb.org/t/p/w185/" + response.results[i].poster_path;
		}
		else {
			imgElement.src = "img-placeholder.png";
			imgElement.alt = "Image not found";
		}

		backdrop.appendChild(imgElement);

		let title = document.createElement("div");
		title.innerHTML = response.results[i].original_title;

		let date = document.createElement("div");
		date.innerHTML = response.results[i].release_date;
		if(date.innerHTML == "undefined") {
			date.innerHTML = "No release date given.";
		}

		let overlay = document.createElement("div");
		overlay.classList.add("overlay");

		let rating = document.createElement("div");
		rating.innerHTML = "Rating: " + response.results[i].vote_average;
		rating.classList.add("rating");

		let voters = document.createElement("div");
		voters.innerHTML = "Votes: " + response.results[i].vote_count;
		voters.classList.add("voters");

		let synopsis = document.createElement("div");
		synopsis.innerHTML = response.results[i].overview;
		synopsis.classList.add("synopsis");

		// If description too long stop at 200 characters
		let description = response.results[i].overview;
		if(description.length > 200) {
			description = description.substring(0, 200) + "...";
			synopsis.innerHTML = description;
		}

		overlay.appendChild(rating);
		overlay.appendChild(voters);
		overlay.appendChild(synopsis);

		backdrop.appendChild(overlay);
		
		movie.appendChild(backdrop);
		movie.appendChild(title);
		movie.appendChild(date);
		

		movie.classList.add("col-6", "col-md-4", "col-lg-3", "movie", "px-4", "my-2")

		document.querySelector("#all-movies").appendChild(movie);
	}
}

function ajax(endpoint, func) {

	let httpRequest = new XMLHttpRequest();
	httpRequest.open("GET", endpoint);
	httpRequest.send();

	// This will be called when API responds
	httpRequest.onreadystatechange = function() {

		if(httpRequest.readyState == 4) {
			if(httpRequest.status == 200) {
				// We have a successful response, display results
				func(httpRequest.responseText);
			}
		}
	}
}

// Call immediately when page loads
document.querySelector("body").onload = function() {
	ajax("https://api.themoviedb.org/3/movie/now_playing?api_key=0706bb78e20ca4278759bae9920fed1c&language=en-US&page=1", displayResults);
}

// Call when user searches
document.querySelector("#search-form").onsubmit = function(event) {
	event.preventDefault();

	let search = document.querySelector("#search-id").value.trim();

	ajax("https://api.themoviedb.org/3/search/movie?api_key=0706bb78e20ca4278759bae9920fed1c&language=en-US&query="+ search +"&page=1", displayResults);
	
}