jQuery(function ($)
{
	var map1, map2;
	function initMap() {
		var customMapType = new google.maps.StyledMapType([
			{
				"featureType": "landscape.natural",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#e0efef"
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"hue": "#1900ff"
					},
					{
						"color": "#c0e8e8"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "geometry",
				"stylers": [
					{
						"lightness": 100
					},
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "labels",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "transit.line",
				"elementType": "geometry",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"lightness": 700
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "all",
				"stylers": [
					{
						"color": "#7dcdcd"
					}
				]
			}
		], {
			name: 'Cloudappers'
		});

		var customMapTypeId = 'custom_style';

		var image = {
			url: script_const.map_pins_url,
			scaledSize: new google.maps.Size(27, 39), // scaled size)
		};

		var url = {
			lat: parseFloat(script_const.pin_latitude),
			lng: parseFloat(script_const.pin_altitude)
		};

		var option1 = {
			center: {
				lat: parseFloat(script_const.pin_latitude),
				lng: parseFloat(script_const.pin_altitude)
			},
			zoom: 13,
			scrollwheel: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
			}
		}

		var option2 = {
			center: {
				lat: parseFloat(script_const.pin_latitude),
				lng: parseFloat(script_const.pin_altitude)
			},
			zoom: 10,
			scrollwheel: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
			}
		}

		map1 = new google.maps.Map(document.getElementById("map"), option1);
		map2 = new google.maps.Map(document.getElementById("map-details"), option2);

		map1.mapTypes.set(customMapTypeId, customMapType);
		map1.setMapTypeId(customMapTypeId);


		var marker1 = new google.maps.Marker({
			position: url,
			map: map1,
			icon: image,
			title: '',
			animation: google.maps.Animation.DROP,
		});

		var marker = new google.maps.Marker({
			position: url,
			map: map2,
			icon: image,
			title: '',
			animation: google.maps.Animation.DROP,
		});

		$('#map-popup').on('shown.bs.modal',function(){
			google.maps.event.trigger(map2, "resize");
			return map2.setCenter(url);
		});
	}

	initMap();
});