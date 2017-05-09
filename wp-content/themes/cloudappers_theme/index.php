<?php

$homePagePost = get_page_by_path('home', OBJECT, 'page' );
$pageOptions = acf_get_group_fields($homePagePost->ID);

$setting= get_page_by_path('cloudappers-setting', OBJECT, 'page' );
$setting = acf_get_group_fields($homePagePost->ID);

$sliderFields = [
	[
		'acf' => 1,
		'name' => 'main_slide_image',
	],
	[
		'acf' => 1,
		'name' => 'main_slide_mobile_image',
	],
	[
		'acf' => 1,
		'name' => 'main_slide_title',
	],
	[
		'acf' => 1,
		'name' => 'main_slide_subtitle',
	],
	[
		'acf' => 1,
		'name' => 'main_slide_description',
	],
	[
		'acf' => 1,
		'name' => 'main_slide_button_text',
	],
	[
		'acf' => 1,
		'name' => 'main_slide_button_link_url',
	],
];
$mainSlider = PodsModel::search('main_slide', $sliderFields);

if(intval($pageOptions['home_page_clients_how_many_to_show']))
	$clients = Client::viewAll(['page' => 'home', 'limit' => intval($pageOptions['home_page_clients_how_many_to_show']) ]);

$services = Service::viewAll(['page' => 'home', 'limit' => 3 ]);

$superFeaturedProject = ProjectModel::getSuperFeaturedProject();
$projects = Project::viewAll(['page' => 'home', 'limit' => 3]);

if(intval($pageOptions['home_page_team_how_many_to_show']))
	$team = Team::viewAll(['page' => 'home', 'limit' => intval($pageOptions['home_page_team_how_many_to_show'])]);

get_header();
get_template_part('template-part', 'topnav');
?>

<section class="slider-container">
	<div class="home-slider">

		<?php foreach ($mainSlider as $slid) { ?>
			<div class="slide">
				<picture>
					<source srcset="<?php echo esc_url($slid['main_slide_image']['url']); ?>" media="(min-width: 750px)">
					<source srcset="<?php echo esc_url($slid['main_slide_mobile_image']['url']); ?>" media="(max-width: 749px)">
					<img src="<?php echo esc_url($slid['main_slide_image']['url']); ?>">
				</picture>
				<div class="container slide-desc">
					<div class="row">
						<div class="col-lg-12">
							<div class="slid-content">
								<?php if (!empty($slid['main_slide_title'])) ?>
								<h5><?php echo $slid['main_slide_title']; ?></h5>
								<?php if (!empty($slid['main_slide_subtitle'])) ?>
								<h1><?php echo $slid['main_slide_subtitle']; ?></h1>
								<?php if (!empty($slid['main_slide_description'])) ?>
								<div class="description"><?php echo $slid['main_slide_description']; ?></div>
								<?php if (!empty($slid['main_slide_button_text']) && !empty($slid['main_slide_button_link_url'])) ?>
								<a class="c-btn" href="<?php echo esc_url($slid['main_slide_button_link_url']); ?>"><?php echo $slid['main_slide_button_text']; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

	</div>
</section>

<section class="showcase">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php if(!empty($pageOptions['home_page_digital_showcase_title'])) ?>
					<p><?php echo $pageOptions['home_page_digital_showcase_title']; ?></p>
				<?php if(!empty($pageOptions['home_page_digital_showcase_download_button_text'])) { ?>
					<?php if($pageOptions['home_page_digital_showcase_type'] == 1 && isset($pageOptions['home_page_digital_showcase_file_url'])) { ?>
						<?php if(!empty($pageOptions['home_page_digital_showcase_file_url'])) ?>
							<a class="c-btn" href="<?php echo esc_url($pageOptions['home_page_digital_showcase_file_url']);?>" download><?php echo  $pageOptions['home_page_digital_showcase_download_button_text'];?></a>
					<?php } else if($pageOptions['home_page_digital_showcase_type'] == 2 && isset($pageOptions['home_page_digital_showcase_file'])) { ?>
					<?php if(!empty($pageOptions['home_page_digital_showcase_file'])) ?>
							<a class="c-btn" href="<?php echo esc_url($pageOptions['home_page_digital_showcase_file']['url']);?>" download><?php echo  $pageOptions['home_page_digital_showcase_download_button_text'];?></a>
					<?php } ?>
				<?php } ?>
				<?php if(!empty($pageOptions['home_page_digital_showcase_hashtag_text']))?>
					<p><?php echo $pageOptions['home_page_digital_showcase_hashtag_text']; ?></p>
			</div>
		</div>
	</div>
</section>

<?php if (!empty($clients) && intval($pageOptions['home_page_clients_how_many_to_show'])) { ?>
<section class="clients">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="client-row">
					<?php foreach ($clients as $client) { ?>
						<a href="<?php echo esc_url($client['client_website_url']); ?>" class="item"><img class="" src="<?php echo esc_url($client['client_logo']['url']); ?>"></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="view-all"><a href="<?php echo home_url('clients'); ?>">VIEW ALL CLIENTS</a></div>
</section>
<?php } ?>

<section class="what-we-do">
	<div class="container">
		<div class="row col-eq-height">
			<?php foreach ($services as $service) { ?>
				<div class="app col-lg-4">
					<a href="<?php echo esc_url(get_permalink($service['id'])); ?>">
						<img src="<?php echo esc_url($service['service_icon']['url']); ?>"/>
						<h1><?php echo $service['service_card_title']; ?></h1>
						<div class="description"><?php echo $service['service_card_description']; ?></div>
						<img class="more" src="<?php echo get_stylesheet_directory_uri() . '/img/more-grey-icon@3x.svg' ?>"/>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="view-all"><a href="">VIEW ALL</a></div>
</section>

<section class="showyou">

	<img class="img-project" src="<?php echo esc_url($superFeaturedProject['project_super_featured_background_image']['url']) ?>" alt="<?php echo $superFeaturedProject['post_title']; ?>"/>

	<div class="container">
		<div class="row">
			<div class="col-lg-12 project-info">
				<a class="c-btn" href="<?php echo esc_url(home_url('projects')); ?>">Recent Project</a>
				<h5><?php echo (!empty($superFeaturedProject['project_super_featured_title']) ? $superFeaturedProject['project_super_featured_title'] : $superFeaturedProject['post_title'] )?></h5>
				<?php echo (!empty($superFeaturedProject['project_super_featured_subtitle']) ? '<h6>' . $superFeaturedProject['project_super_featured_subtitle'] . '</h6>' : (!empty($superFeaturedProject['project_type']['post_title']) ? '<h6>' . $superFeaturedProject['project_type']['post_title'] . '</h6>' : '') ); ?>
				<a class="project-link rotate" href="<?php echo esc_url(get_permalink($superFeaturedProject['id'])); ?>"></a>
			</div>
		</div>

		<div class="row projects">


			<?php foreach ($projects as $project) {
				$title = (!empty($project['project_card_title']) ? $project['project_card_title'] : $project['post_title']);
				?>
				<div class="col-lg-4">
					<img src="<?php echo esc_url($project['project_card_image']['url']) ?>" alt="<?php echo $project['project_card_title']?>">
					<a href="<?php echo esc_url(get_permalink($project['id'])); ?>">
						<div class="bg-rotate">
							<h5><?php echo $title; ?></h5>
							<?php if (!empty($project['project_card_sub_title'])) ?>
							<h6><?php echo $project['project_card_sub_title']; ?></h6>
						</div>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>

	<div class="view-all"><a href="<?php esc_url(home_url('projects')); ?>">VIEW FULL SHOWCASE</a></div>

</section>

<section class="prefooter lazy-background" data-bg="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/prefooter.jpg'); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><?php echo $setting['settings_pre_footer_title']; ?></h1>
				<p><?php echo $setting['settings_pre_footer_subtitle'] ;?></p>
				<a href="" class="c-btn">TELL US ABOUT YOUR PROJECT</a>
			</div>
		</div>
	</div>
</section>

<section class="team">
	<div class="container">
		<div class="row title">
			<div class="col-lg-12">
				<h1><?php echo $pageOptions['home_page_team_title']; ?></h1>
				<p><?php echo $pageOptions['home_page_team_subtitle']; ?></p>
			</div>
		</div>
		<div class="row members">
			<?php
			$hoverCount = 0;
			foreach ($team as $teamMember) {
				$hover = ['gradient-purple','gradient-pink','gradient-green'];
				?>
				<div class="col-lg-3 <?php echo $hover[$hoverCount];?> ">
					<img src="<?php echo esc_url($teamMember['team_member_profile_image']['url']); ?>"/>
					<div class="member-info">
						<h5><?php echo $teamMember['post_title']; ?></h5>
						<h6><?php echo $teamMember['team_member_position']['post_title']; ?></h6>
					</div>
				</div>
			<?php ($hoverCount == 2 ? $hoverCount = 0 : $hoverCount++ ); } ?>
		</div>
		<div class="row join">
			<div class="col-lg-12">
				<h2>I want to create amazing things with you !</h2>
				<a href="" class="c-rbtn">TAKE ME IN</a>
			</div>
		</div>
	</div>
</section>

<section class="contact col-eq-height">
	<div class="col-lg-6">
		<div id="map"></div>
		<div class="address">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6">
						<h6><?php echo $setting['settings_address_title'];?></h6>
						<div class="details">
							<p class="address-details"><?php echo $setting['settings_address_text']; ?></p>
							<p class="mob"><?php echo $setting['settings_mobile_number']; ?></p>
							<p class="phone"><?php echo $setting['settings_tel_number']; ?></p>
						</div>
					</div>
					<div class="col-lg-6">
						<a href="<?php echo esc_url('https://www.google.com/maps?q=' . $pageOptions['home_page_map_pins'][0]['home_page_map_pin_latitude'] . ',' . $pageOptions['home_page_map_pins'][0]['home_page_map_pin_altitude'] . '&ll='. $pageOptions['home_page_map_pins'][0]['home_page_map_pin_latitude'] .','. $pageOptions['home_page_map_pins'][0]['home_page_map_pin_altitude'] .'&z=13'); ?>">take me there</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1>say hello!</h1>
						<form method="post" action="">
							<div class="form-group place-lbl">
								<input type="text" class="form-control" id="name" placeholder="Name">
							</div>
							<div class="form-group place-lbl">
								<input type="email" class="form-control" id="email" placeholder="E-mail">
							</div>
							<div class="form-group note">
								<label for="note">What we need to know?</label>
								<input type="text" class="form-control" id="note">
							</div>
							<button type="submit" class="c-btn">GET IN TOUCH</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<img src="<?php echo esc_url(get_template_directory_uri() . '/img/CA-full-logo.png'); ?>">
			<p>© 2008-<?php echo date('Y'); ?> CloudAppers. All Rights Reserved</p>
		</div>
	</div>
</section>

<!--Google map-->
<script>
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
		var mapDiv = document.getElementById('map');
		var image = {
			url: "<?php echo esc_url($pageOptions['home_page_map_pins'][0]['home_page_map_pin_image']['url']); ?>",
			scaledSize: new google.maps.Size(27, 39), // scaled size)
		};
		var url = {lat: <?php echo $pageOptions['home_page_map_pins'][0]['home_page_map_pin_latitude']; ?>, lng: <?php echo $pageOptions['home_page_map_pins'][0]['home_page_map_pin_altitude']; ?>};
		var map = new google.maps.Map(mapDiv, {
			center: {
				lat: <?php echo $pageOptions['home_page_map_pins'][0]['home_page_map_pin_latitude']; ?>,
				lng: <?php echo $pageOptions['home_page_map_pins'][0]['home_page_map_pin_altitude']; ?>
			},
			zoom: 13,
			scrollwheel: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
			}
		});

		map.mapTypes.set(customMapTypeId, customMapType);
		map.setMapTypeId(customMapTypeId);

		var marker = new google.maps.Marker({
			position: url,
			map: map,
			icon: image,
			title: '',
			animation: google.maps.Animation.DROP,
		});
	}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWs0rsi44WbJwTxkHdutuiLXXyQZ8pd68&callback=initMap"></script>

<?php get_footer(); ?>

