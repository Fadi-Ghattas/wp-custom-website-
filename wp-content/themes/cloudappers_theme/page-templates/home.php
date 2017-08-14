<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/07/17
 * Time: 2:29 PM
 * Template Name: HomePage
 */

$homePageID = get_option( 'page_on_front');
$pageOptions = acf_get_group_fields($homePageID);

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);

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

if (intval($pageOptions['home_page_clients_how_many_to_show']))
	$clients = Client::viewAll(['page' => 'home', 'limit' => intval($pageOptions['home_page_clients_how_many_to_show'])]);

$services = Service::viewAll(['page' => 'home', 'limit' => 3]);

$superFeaturedProject = ProjectModel::getSuperFeaturedProject();
$projects = Project::viewAll(['page' => 'home', 'limit' => 3]);

if (intval($pageOptions['home_page_team_how_many_to_show']))
	$team = Team::viewAll(['page' => 'home', 'limit' => intval($pageOptions['home_page_team_how_many_to_show'])]);

get_header();
get_template_part('template-part', 'topnav');
?>

	<section class="slider-container">
		<div class="home-slider">

			<?php foreach ($mainSlider as $slid) { ?>
				<div class="slide"
					 style="background-image: url('<?php echo esc_url($slid['main_slide_image']['url']); ?>') ;">
					<!--                <picture>-->
					<!--                    <source srcset="-->
					<?php //echo esc_url($slid['main_slide_image']['url']); ?><!--" media="(min-width: 768px)">-->
					<!--                    <source srcset="-->
					<?php //echo esc_url($slid['main_slide_mobile_image']['url']); ?><!--" media="(max-width: 767px)">-->
					<!--                    <img src="--><?php //echo esc_url($slid['main_slide_image']['url']); ?><!--">-->
					<!--                </picture>-->
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
									<a class="c-btn"
									   href="<?php echo esc_url($slid['main_slide_button_link_url']); ?>"><span><span> <?php echo $slid['main_slide_button_text']; ?></span></span></a>
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
					<?php if (!empty($pageOptions['home_page_digital_showcase_title'])) ?>
					<p><?php echo $pageOptions['home_page_digital_showcase_title']; ?></p>
					<?php if (!empty($pageOptions['home_page_digital_showcase_download_button_text'])) { ?>
						<?php if ($pageOptions['home_page_digital_showcase_type'] == 1 && isset($pageOptions['home_page_digital_showcase_file_url'])) { ?>
							<?php if (!empty($pageOptions['home_page_digital_showcase_file_url'])) ?>
								<a class="c-btn" href="<?php echo esc_url($pageOptions['home_page_digital_showcase_file_url']); ?>"
							download><?php echo $pageOptions['home_page_digital_showcase_download_button_text']; ?></a>
						<?php } else if ($pageOptions['home_page_digital_showcase_type'] == 2 && isset($pageOptions['home_page_digital_showcase_file'])) { ?>
							<?php if (!empty($pageOptions['home_page_digital_showcase_file'])) ?>
								<a class="c-btn" href="<?php echo esc_url($pageOptions['home_page_digital_showcase_file']['url']); ?>"
							download><?php echo $pageOptions['home_page_digital_showcase_download_button_text']; ?></a>
						<?php } ?>
					<?php } ?>
					<?php if (!empty($pageOptions['home_page_digital_showcase_hashtag_text'])) ?>
					<!--                <p>-->
					<?php //echo $pageOptions['home_page_digital_showcase_hashtag_text']; ?><!--</p>-->
				</div>
			</div>
		</div>
	</section>

    <section class="what-we-do" id="services">
        <div class="container">
            <div class="row col-eq-height">
                <?php foreach ($services as $service) { ?>
                    <div class="app col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <a href="<?php echo esc_url(get_permalink($service['id'])); ?>">
                            <div class="liner-effect"></div>
                            <img src="<?php echo esc_url($service['service_icon']['url']); ?>"/>
                            <h1><?php echo $service['service_card_title']; ?></h1>
                            <div class="description"><?php echo $service['service_card_description']; ?></div>
                            <img class="more"
                                 src="<?php echo get_stylesheet_directory_uri() . '/img/more-grey-icon@3x.svg' ?>"/>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="view-all"><a href="<?php echo esc_url(home_url('services')); ?>">VIEW ALL SERVICES</a></div>
    </section>

<?php if (!empty($clients) && intval($pageOptions['home_page_clients_how_many_to_show'])) { ?>
	<section class="clients">
		<div class="container">
			<div class="row">

				<div class="client-row">
					<?php foreach ($clients as $client) { ?>
						<a href="javascript:void(0);"
						   class="item  col-md-2 col-sm-3 col-xs-4" target="_blank">
							<img class="" src="<?php echo esc_url($client['client_logo']['url']); ?>"></a>
					<?php } ?>
				</div>

			</div>
		</div>
		<div class="view-all"><a href="<?php echo esc_url(home_url('clients')); ?>">VIEW ALL CLIENTS</a></div>
	</section>
<?php } ?>



	<section class="showyou">
		<div class="bg-showyou hidden-lg hidden-md"></div>
		<h3 class="mob-title  hidden-lg hidden-md hidden-sm">show you</h3>
		<img class="img-project"
			 src="<?php echo esc_url($superFeaturedProject['project_super_featured_background_image']['url']) ?>"
			 alt="<?php echo $superFeaturedProject['post_title']; ?>"/>

		<div class="container">
			<div class="row">
				<div class="col-lg-12 project-info">
					<a class="c-btn" href="<?php echo esc_url(home_url('portfolio')); ?>">Recent Project</a>
					<h5><?php echo(!empty($superFeaturedProject['project_super_featured_title']) ? $superFeaturedProject['project_super_featured_title'] : $superFeaturedProject['post_title']) ?></h5>
					<?php echo(!empty($superFeaturedProject['project_super_featured_subtitle']) ? '<h6>' . $superFeaturedProject['project_super_featured_subtitle'] . '</h6>' : (!empty($superFeaturedProject['project_type']['post_title']) ? '<h6>' . $superFeaturedProject['project_type']['post_title'] . '</h6>' : '')); ?>
					<a class="project-link rotate"
					   href="<?php echo esc_url(get_permalink($superFeaturedProject['id'])); ?>"></a>
				</div>
			</div>

			<div class="row projects">

				<?php foreach ($projects as $project) {
					$title = (!empty($project['project_card_title']) ? $project['project_card_title'] : $project['post_title']);
					?>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 zoom-effect">
						<section class="">
							<figure>
								<!--<div class="lazy-loader-effect"></div>-->
								<div class="loader">
									<div class="square"></div>
									<div class="square"></div>
									<div class="square last"></div>
									<div class="square clear"></div>
									<div class="square"></div>
									<div class="square last"></div>
									<div class="square clear"></div>
									<div class="square "></div>
								</div>
								<img class="img-lazy lazy-not-loaded lazy-loader"
									 data-src="<?php echo esc_url($project['project_card_image']['url']) ?>"
									 alt="<?php echo $project['project_card_title'] ?>"/>
							</figure>
							<a href="<?php echo esc_url(get_permalink($project['id'])); ?>">
								<div class="overlay bg-rotate">
									<h5><?php echo $title; ?></h5>
									<?php if (!empty($project['project_card_sub_title'])) ?>
									<h6><?php echo $project['project_card_sub_title']; ?></h6>
								</div>
							</a>
						</section>

					</div>
				<?php } ?>

			</div>
		</div>

		<div class="view-all"><a href="<?php echo esc_url(home_url('portfolio')); ?>">VIEW FULL SHOWCASE</a></div>

	</section>

	<section class="prefooter lazy-background"
			 data-bg="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/prefooter.png'); ?>">
		<div class="container">
			<div class="row">
				<div class="img-prefooter col-lg-5  col-md-12">
					<img class="img-responsive"
						 src="<?php echo get_template_directory_uri() . '/img/infographics-for-banner@3x.png' ?>">
				</div>
				<div class="col-lg-7  col-md-12">
					<h1><?php echo $setting['settings_pre_footer_title']; ?></h1>
					<p><?php echo $setting['settings_pre_footer_subtitle']; ?></p>
					<a  href="<?php echo home_url('get-a-quote'); ?>" class="c-btn">TELL US ABOUT YOUR
						PROJECT</a>
				</div>
			</div>
		</div>
	</section>

<?php //if (!empty($team) && intval($pageOptions['home_page_team_how_many_to_show'])) { ?>
<!--	<section class="team">-->
<!--		<div class="container">-->
<!--			<div class="row title">-->
<!--				<div class="col-lg-12">-->
<!--					<h1>--><?php //echo $pageOptions['home_page_team_title']; ?><!--</h1>-->
<!--					<p>--><?php //echo $pageOptions['home_page_team_subtitle']; ?><!--</p>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="row members">-->
<!--				--><?php
//				$hoverCount = 0;
//				foreach ($team as $teamMember) {
//					$hover = ['gradient-purple', 'gradient-pink', 'gradient-green'];
//					?>
<!--					<div class="responsive-loader col-lg-3 col-md-4 col-sm-6 col-xs-6">-->
<!--						<section class="--><?php //echo $hover[$hoverCount]; ?><!--">-->
<!--							<a href="--><?php //echo esc_url(home_url('team')); ?><!--">-->
<!--								<figure>-->
<!--									<!--<div class="lazy-loader-effect"></div>-->
<!--									<div class="loader">-->
<!--										<div class="square"></div>-->
<!--										<div class="square"></div>-->
<!--										<div class="square last"></div>-->
<!--										<div class="square clear"></div>-->
<!--										<div class="square"></div>-->
<!--										<div class="square last"></div>-->
<!--										<div class="square clear"></div>-->
<!--										<div class="square "></div>-->
<!--									</div>-->
<!--									<img class="img-lazy lazy-not-loaded lazy-loader"-->
<!--										 data-src="--><?php //echo esc_url($teamMember['team_member_profile_image']['url']); ?><!--"-->
<!--										 alt="--><?php //echo $teamMember['post_title']; ?><!--"/>-->
<!--								</figure>-->
<!--							</a>-->
<!--							<div class="overlay member-info">-->
<!--								<a href="--><?php //echo esc_url(home_url('team')); ?><!--">-->
<!--									<h5>--><?php //echo $teamMember['post_title']; ?><!--</h5>-->
<!--									<h6>--><?php //echo $teamMember['team_member_title']; ?><!--</h6>-->
<!--								</a>-->
<!--							</div>-->
<!---->
<!--						</section>-->
<!--					</div>-->
<!--					--><?php //($hoverCount == 2 ? $hoverCount = 0 : $hoverCount++);
//				} ?>
<!--			</div>-->
<!--			<div class="row join">-->
<!--				<div class="col-lg-12">-->
<!--					<h2>I want to create amazing things with CloudAppers!</h2>-->
<!--					<a href="javascript:void(0)" id="take-me-in" class="c-rbtn"><span><span>TAKE ME IN</span></span></a>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="view-all"><a href="--><?php //echo esc_url(home_url('team')); ?><!--">MEET THE WHOLE FAMILY</a></div>-->
<!--	</section>-->

<?php
//} ?>

	<section class="contact col-eq-height">
		<div class="map col-lg-6">
			<div class="map-mob-shadow"></div>
			<div id="map"></div>
			<div class="address-ca">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<h6><?php echo $setting['settings_address_title']; ?></h6>
							<div class="details">
								<p class="address-details"><?php echo $setting['settings_address_text']; ?></p>
								<p class="open-time">Open Sun to Thurs.<br>10am until 6pm</p>
								<p class="phone"><a href="tel:<?php echo $setting['settings_mobile_number']; ?>"><?php echo $setting['settings_mobile_number']; ?></a></p>
								<p class="email"><a href="mailto:<?php echo $setting['settings_company_email']; ?>"><?php echo $setting['settings_company_email']; ?></a></p>
							</div>
						</div>
						<div class="col-lg-6">
							<!--                        <a class="c-rbtn" href="-->
							<?php //echo esc_url('https://www.google.com/maps?q=' . $pageOptions['home_page_map_pins'][0]['home_page_map_pin_latitude'] . ',' . $pageOptions['home_page_map_pins'][0]['home_page_map_pin_altitude'] . '&ll=' . $pageOptions['home_page_map_pins'][0]['home_page_map_pin_latitude'] . ',' . $pageOptions['home_page_map_pins'][0]['home_page_map_pin_altitude'] . '&z=13'); ?><!--">take me there</a>-->
							<a id="take-me-there" href="https://www.google.ae/maps/place/CloudAppers+FZ+LLC/@25.095842,55.154749,17z/data=!3m1!4b1!4m5!3m4!1s0x3e5f6b5b4131278b:0xabda34c413e04be6!8m2!3d25.095842!4d55.156943?hl=en" target="_blank" class="c-rbtn" href="">take me there</a>
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
							<form method="post" action="" id="GetInTouchForm">
								<div class="form-group place-lbl">
									<label for="name">Name</label>
									<input type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group place-lbl">
									<label for="email">E-mail</label>
									<input type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group note">
									<label for="note">Tell us anything that's on your mind</label>
									<input type="text" class="form-control" id="note" name="note">
								</div>
								<button type="submit" class="c-btn">GET IN TOUCH</button>
								<div class="form-group ms">
									<p class="message"></p>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="copyright">
			<!--<img src="-->
			<?php //echo esc_url(get_template_directory_uri() . '/img/CA-full-logo@3x.svg'); ?><!--" width="236px">-->
			<div>
				<!--        <img src="-->
				<?php //echo esc_url(get_template_directory_uri() . '/img/CA-full-logo.png'); ?><!--">-->
				<embed src="<?php echo get_stylesheet_directory_uri() . '/img/CA-full-logo@3x.svg' ?>" alt="CloudAppers"/>
				<p>© 2008-<?php echo date('Y'); ?> CloudAppers. All Rights Reserved</p>
			</div>
			<div id="footer">
				<div class="social hidden-xs">
					<ul>
						<li><a target="_blank" href="https://twitter.com/cloudappers">Twitter</a></li>
						<li><a target="_blank" href="https://www.facebook.com/CloudAppers/">Facebook</a></li>
						<li><a target="_blank" href="https://www.instagram.com/cloudappers/">Instagram</a></li>
						<li><a target="_blank" href="https://www.behance.net/cloudappers/">Behance</a></li>
					</ul>
				</div>
				<div class="mob hidden-lg hidden-md">
					<div class="nav-social">
						<div class="social">
							<a class="facebook" href="<?php echo esc_url($setting['facebook_link']); ?>"></a>
							<a class="twitter" href="<?php echo esc_url($setting['twitter_link']); ?>"></a>
							<a class="instagram" href="<?php echo esc_url($setting['instagram_link']); ?>"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>