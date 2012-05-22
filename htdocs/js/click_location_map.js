var click_map;
var markers;
var click_marker;
lichfield = new OpenLayers.LonLat(-1.826, 52.6860)
//lichfield = new OpenLayers.LonLat(90, 10);


$(document).ready(function() {
	if ($("#click_map").length == 1) {
		setupMap();
	}
});

function setupMap() {
	map = new OpenLayers.Map("click_map");
    map.addLayer(new OpenLayers.Layer.OSM());
 
    var lonLat = new OpenLayers.LonLat(-1.826, 52.6860)
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );
 
    var zoom=13;
 
    var markers = new OpenLayers.Layer.Markers( "Markers" );
    markers.addMarker(click_marker = new OpenLayers.Marker(lonLat));
    click_marker.map = map;
    map.addLayer(markers);
    map.setCenter (lonLat, zoom);
    
    
    c = OpenLayers.Class(OpenLayers.Control, {                
        defaultHandlerOptions: {
            'single': true,
            'double': false,
            'pixelTolerance': 0,
            'stopSingle': false,
            'stopDouble': false
        },

        initialize: function(options) {
            this.handlerOptions = OpenLayers.Util.extend(
                {}, this.defaultHandlerOptions
            );
            OpenLayers.Control.prototype.initialize.apply(
                this, arguments
            ); 
            this.handler = new OpenLayers.Handler.Click(
                this, {
                    'click': this.trigger
                }, this.handlerOptions
            );
        }, 

        trigger: function(e) {
            lonlat = map.getLonLatFromViewPortPx(e.xy);
            map.panTo(lonlat);
            click_marker.moveTo(map.getLayerPxFromViewPortPx(e.xy));
            ll = lonlat.clone().transform(map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326"));
            //console.log(lonlat);
            $("#click_lat").val(ll.lat);
            $("#click_lng").val(ll.lon);
            //return lonlat;
        }

    });
    var click = new c();
    map.addControl(click);
    click.activate();
}