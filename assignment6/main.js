let key = "82758b21c16045a2a3f760006007ca78";

$(window).on("load", function(event) {
	event.preventDefault();

	$.ajax({
		method: "GET",
		url: "https://api.weatherbit.io/v2.0/current",
		data: {
			key: key,
			units: "I",
			city: "Los Angeles, CA"
		}
	})
	.done(function(results) {
		console.log(results.data[0].weather.description);
		$("#current_temp").html(results.data[0].temp);
		$("#description").html(results.data[0].weather.description);
		$("#feels_like").html(results.data[0].app_temp);
	})
	.fail(function() {
		console.log("Error!");
	});
	// prevent form from being submitted
	return false;
});

$(".dropdown-menu button").click(function() {
	$("#selected").text($(this).text());

	$.ajax({
		method: "GET",
		url: "https://api.weatherbit.io/v2.0/current",
		data: {
			key: key,
			units: "I",
			city: $(this).text()
		}
	})
	.done(function(results) {
		console.log(results);
		$("#current_temp").html(results.data[0].temp);
		$("#description").html(results.data[0].weather.description);
		$("#feels_like").html(results.data[0].app_temp);
	})
	.fail(function() {
		console.log("Error!");
	});
	// prevent form from being submitted
	

});

$("#items-list").on("click", ".task-text" , function() {
	  		$(this).toggleClass("completed");
	  		$(this).parent().toggleClass("done");
	  	});

$("#items-list").on("click", ".fa-square", function() {
	  		$(this).parent().fadeOut(500, function() {
	  			$(this.remove());
	  		});
	  	});

$("#adder").on("click", function() {
	  		$("#input-field").slideToggle(1000);
	  	});

$("#new-item-form").on("submit", function(event) {
	event.preventDefault();
	console.log("submitted");
	$("#items-list").append('<li class="list-group-item task"> <i class="far fa-square mr-2"></i> <span class="task-text">'+ $("#new_item").val() +'</span> </li>');
	$("#new_item").val("");
});



