default_map = {
    zoom: 13,
    center: new google.maps.LatLng(53.185259,-2.887602),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }

$(document).ready(function() {
	$(".map").each(function() {
		this.map = new google.maps.Map(this, default_map);
		this.points = new Array();
	});
	
	
	$("#events").live("pjax:end", function () {
		//home_ajaxed_map();
	});
	//home_ajaxed_map();
});

function home_ajaxed_map() {
	m = $("#home-map").get(0);
	for (i in m.points) {
		m.points[i].setMap(null);
	}
	m.points = new Array();
	$("#events input[name$='_lat']").each(function(m) {
		return function(i, el) {
			id = $(el).attr("name");
			id = id.substring(0, id.length-4);
			lat = $("input[name="+id+"_lat]").val();
			lng = $("input[name="+id+"_lng]").val();
			ll = new google.maps.LatLng(lat, lng);
			p = new google.maps.Marker({
				position: ll,
				map: m.map
			});
			m.points.push(p);
		};
	}(m));
	m.bounds = new google.maps.LatLngBounds();
	for (i in m.points) {
		m.bounds.extend(m.points[i].getPosition());
	}
	m.map.fitBounds(m.bounds);
}