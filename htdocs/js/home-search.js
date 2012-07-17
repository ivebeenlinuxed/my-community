var geocoder;

$(document).ready(function() {
	$("#location").keyup(function() {
		if (this.to != undefined) {
			clearTimeout(this.to);
		}
		if ($("#location").val() != "") {
			this.to = setTimeout(checkLocation, 1000);
		}
		resetLocation();
	});
	
	geocoder = new google.maps.Geocoder();
	/*
	$("#location").popover({
		title: "Geolocation",
		content: "Please wait a second while we have a look and verify the location...",
		trigger: "manual"
	}).focus(function() {
		$(this).popover("show");
		p = $(this).data("popover");
		c = $(".popover-content", p.$tip);
		p.$tip.attr("id", "geo-popover");
		map = c.get(0);
		map.map = new google.maps.Map(map, default_map);
		$(this).popover("show");
	}).blur(function() {
		$(this).popover("hide");
	});
	*/
});

function resetLocation() {
	console.log("RESET LOCATION");
	$("#location").parent().removeClass("error").removeClass("success");
	if ($("#location").data("tooltip")) {
		$("#location").tooltip("hide");
	}
}

function checkLocation() {
	console.log("CHECK LOCATION");
	geocoder.geocode({address: $("#location").val(), region: "UK"}, function(result, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			$("#location").parent().addClass("success");
			r = result[0];
			$('#location').tooltip({trigger: "manual", delay: 0});
			$("#location").data("tooltip").options.title = r.formatted_address;
			$('#location').tooltip("show");
			
			$("#search_lat").val(r.geometry.location.lat());
			$("#search_lng").val(r.geometry.location.lng());
			
			
			trigger_count();
			console.log("OK");
		} else {
			$("#location").parent().addClass("error");
			$('#location').tooltip({trigger: "manual", title: "Oops! We cannot currently find where you mean..."}).tooltip("show");
			trigger_count();
			console.log("GEOCODE ERROR: "+status);
		}
	});
}

/**
 * Triggers the update of the count at bottom of the search box
 */
function trigger_count() {
	$.ajax({
		url: "search/total.json",
		data: {lat: $("#search_lat").val(), lng: $("#search_lng"), keywords: $("#search_keywords"), type: $("#search_type")},
		success: function() {
			console.log("SUCCESS");
		}
	});
}