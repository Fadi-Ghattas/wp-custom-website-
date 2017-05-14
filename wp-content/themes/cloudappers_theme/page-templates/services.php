<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/03/17
 * Time: 10:53 AM
 * Template Name: ServicesPage
 */

$pageOptions = acf_get_group_fields(get_the_ID());
$pageShowCases = ProjectModel::getProjectsAsShowCasesForPage($pageOptions['services_page_show_cases']);
$services = Service::viewAll();

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);

get_header();
get_template_part('template-part', 'topnav');

?>
<?php $services_page_header_image = (!empty($pageOptions['services_page_header_image']['url']) ? esc_url($pageOptions['services_page_header_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/new-services-background_1600x793_acf_cropped.png')); ?>
	<section class="ca-page-header parallax-window" data-parallax="scroll" data-image-src="<?php echo $services_page_header_image; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="title"><?php echo $pageOptions['services_page_header_title']; ?></p>
					<p class="sub-title"><?php echo $pageOptions['services_page_header_subtitle']; ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="ca-page-banner">
		<div class="vertical-line"></div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php echo $pageOptions['services_page_message_section']; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="services">
		<div class="container">
			<div class="row">
				<?php
				$col = 0;$colPos ='';
				foreach ($services as $service) {
					$title = (!empty($service['service_card_title']) ? $service['service_card_title'] : $service['post_title']);
					$description = (!empty($service['service_card_description']) ? $service['service_card_description'] : $service['service_description']);
					$description = limit_text_as_expert($service['id'], $description, 33, '#5d5f74', 0);
					if($col == 0) {$colPos = 'col-lg-left col-md-left col-sm-left col-xs-left';} else if($col == 1) {$colPos = 'col-lg-center col-md-center col-sm-center col-xs-center';} else if($col == 2) {$colPos = 'col-lg-right col-md-right col-sm-right col-xs-right';}
					?>
					<article class="col-xs-12 col-sm-6 col-md-4 col-lg-4 service-item <?php echo $colPos; ?>">
						<a href="<?php echo esc_url(get_permalink($service['id'])); ?>">
							<img class="icon" src="<?php echo esc_url($service['service_icon']['url']); ?>"
								 alt="<?php echo $title; ?>">
							<h1 class="title"><?php echo $title; ?></h1>
							<div class="description"><?php echo $description; ?></div>
							<img class="more"
								 src="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/more-grey-icon@3x.svg'); ?>"/>
						</a>
					</article>
				<?php ($col == 2 ? $col = 0 : $col++); } ?>
			</div>
		</div>
	</section>

<?php $services_page_show_cases_background_image = (!empty($pageOptions['services_page_show_cases_background_image']['url']) ? esc_url($pageOptions['services_page_show_cases_background_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/services-show-you-background-section.jpg')); ?>
	<section class="some-of-show-cases parallax-window" data-parallax="scroll" data-image-src="<?php echo $services_page_show_cases_background_image; ?>">
		<div class="container">
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1><?php echo $pageOptions['services_page_show_cases_title']; ?></h1>
				</div>

				<?php $hover = ['green-card-hover', 'red-card-hover', 'purple-card-hover']; ?>
				<?php $col = 0;$colPos ='';
				for ($i = 0; $i < 3; $i++) {
					$title = (!empty($pageShowCases[$i]['project_card_title']) ? $pageShowCases[$i]['project_card_title'] : $pageShowCases[$i]['post_title']);
					if($col == 0) {$colPos = 'col-lg-left col-sm-left col-xs-left';} else if($col == 1) {$colPos = 'col-lg-center col-sm-center col-xs-center';} else if($col == 2) {$colPos = 'col-lg-right col-sm-right col-xs-right';}
					?>
					<article class="col-xs-12 col-sm-6 col-md-4 col-lg-4 show-case-item zoom-effect <?php echo $colPos; ?>">
						<section class="<?php echo $hover[$i]; ?>">
							<figure>
<!--								<div class="lazy-loader-effect"></div>-->
								<div class="loader">
									<div class="square" ></div>
									<div class="square"></div>
									<div class="square last"></div>
									<div class="square clear"></div>
									<div class="square"></div>
									<div class="square last"></div>
									<div class="square clear"></div>
									<div class="square "></div>
								</div>
								<img class="img-lazy lazy-not-loaded lazy-loader" data-src="<?php echo esc_url($pageShowCases[$i]['project_card_image']['url']); ?>" alt="<?php echo $title; ?>" />
							</figure>
							<a href="<?php echo esc_url(get_permalink($pageShowCases[$i]['id']))?>">
								<div class="overlay bg-rotate">
									<h5><?php echo $title; ?></h5>
									<?php if (!empty($pageShowCases[$i]['project_card_sub_title'])) ?>
									<h6><?php echo $pageShowCases[$i]['project_card_sub_title']; ?></h6>
								</div>
							</a>
						</section>
					</article>
				<?php ($col == 2 ? $col = 0 : $col++); } ?>
			</div>
		</div>
		<a href="#" class="btn-view-all-show-cases c-btn">
			<span></span>
			VIEW FULL SHOWCASE
		</a>
	</section>


	<section class="prefooter lazy-background"
			 data-bg="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/prefooter.png'); ?>">
		<div class="container">
			<div class="row">
				<div class="img-prefooter col-lg-5  col-md-12">
					<img class="img-responsive" src="<?php echo get_template_directory_uri().'/img/infographics-for-banner@3x.png' ?>">
				</div>
				<div class="col-lg-7  col-md-12">
					<h1><?php echo $setting['settings_pre_footer_title']; ?></h1>
					<p><?php echo $setting['settings_pre_footer_subtitle']; ?></p>
					<a href="" class="c-btn">TELL US ABOUT YOUR PROJECT</a>
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();