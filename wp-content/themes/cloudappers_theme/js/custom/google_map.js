jQuery(function ($)
{

	function initMap() {

		var map1, map2;

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

		var marker_content='<div class="markerbg"></div>'+
			'<div class="mapmarker">' +
			'<strong>CloudAppers</strong><br> ' +
			'Media company in Dubai, United Arab Emirates ' +
			'</div><a id="markerlnk" href="https://www.google.ae/maps/place/CloudAppers+FZ+LLC/@25.095842,55.154749,17z/data=!3m1!4b1!4m5!3m4!1s0x3e5f6b5b4131278b:0xabda34c413e04be6!8m2!3d25.095842!4d55.156943?hl=en" target="_blank" >Open in Google Maps</a>';
		var infowindow = new google.maps.InfoWindow({
			content: marker_content
		});

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
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId],
				position: google.maps.ControlPosition.BOTTOM_CENTER
			},
            zoomControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            }

		}

		var option2 = {
			center: {
				lat: parseFloat(script_const.pin_latitude),
				lng: parseFloat(script_const.pin_altitude)
			},
			zoom: 13,
			scrollwheel: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId],
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
			animation: google.maps.Animation.DROP
		});
		marker1.addListener('click', function() {
			infowindow.open(map1, marker1);
			// map1.setCenter(marker1.getPosition());
		});

		$('.map-mob-shadow').on('click touchstart', function(event) {
			infowindow.close(map1, marker1);
		});

		google.maps.event.addListener(map1,'click', function(event) {
			infowindow.close(map1, marker1);
		});

		var marker = new google.maps.Marker({
			position: url,
			map: map2,
			icon: image,
			title: '',
			animation: google.maps.Animation.DROP,
		});
		marker.addListener('click', function() {
			infowindow.open(map2, marker);
			// map2.setCenter(marker.getPosition());

		});

		//popup
		$('#map-popup').on('shown.bs.modal',function(){
			google.maps.event.trigger(map2, "resize");
			return map2.setCenter(url);
		});

	}


	$(window).on("orientationchange",function(event){
		google.maps.event.trigger(map, "resize");

	});


	$(window).on('load', function () {
		initMap();
	});

});

