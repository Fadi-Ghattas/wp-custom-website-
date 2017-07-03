<?php

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);

$fields = [
	'id',
	'post_title',
	[
		'acf' => 1,
		'name' => 'service_page_header_title',
	],
	[
		'acf' => 1,
		'name' => 'service_page_header_sub_title',
	],
	[
		'acf' => 1,
		'name' => 'service_page_header_background_image',
	],
	[
		'acf' => 1,
		'name' => 'service_page_header_description',
	],
	[
		'acf' => 1,
		'name' => 'service_icon',
	],
	[
		'acf' => 1,
		'name' => 'service_description',
	],
	[
		'acf' => 1,
		'name' => 'service_infos'
	],
	[
		'acf' => 1,
		'name' => 'service_page_branding_background_image',
	],
	[
		'acf' => 1,
		'name' => 'service_page_branding_message',
	],
	[
		'acf' => 1,
		'name' => 'service_related_projects',
		'type' => 'project',
		'relationship' => 1,
		'fields' => [
			'id',
			'post_title',
			[
				'acf' => 1,
				'name' => 'project_card_title',
			],
			[
				'acf' => 1,
				'name' => 'project_card_sub_title',
			],
			[
				'acf' => 1,
				'name' => 'project_card_image',
			],
		],
	],

];

$service = ServiceModel::findOne((new ServiceModel())->pod_name, get_the_ID(), $fields);

get_header();
get_template_part('template-part', 'topnav');
?>

<?php $services_page_header_image = (!empty($service['service_page_header_background_image']['url']) ? esc_url($service['service_page_header_background_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/new-services-background_1600x793_acf_cropped.png')); ?>
	<section class="ca-page-header parallax-window" data-parallax="scroll" data-bleed="50" data-image-src="<?php echo $services_page_header_image; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="title"><?php echo $service['service_page_header_title']; ?></p>
					<p class="sub-title"><?php echo $service['service_page_header_sub_title']; ?></p>
				</div>
			</div>
		</div>
	</section>
    <div class="main-wrapper">

	<?php if (!empty($service['service_page_header_description'])){ ?>
	<section class="ca-page-banner">
	<!--<div class="vertical-line"></div>-->
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php echo $service['service_page_header_description']; ?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

	<section class="service-details">
		<div class="container">
			<div class="row center">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 flex-center">
					<div class="icon-container center">
						<img class="icon" src="<?php echo esc_url($service['service_icon']['url']); ?>" />
					</div>
					<div class="vertical-line"></div>
					<h1 class="title center"><?php echo $service['post_title']; ?>.</h1>
					<div class="description">
						<?php echo str_replace($service['service_description'], ["<br>", "<br/>", "</br>"], "<br/>"); ?>
					</div>
				</div>
			</div>
		</div>
		<a href="/get-a-quote/" class="btn-view-all-show-cases c-btn sold-btn">
			I'M SOLD. LET'S GET STARTED
		</a>
	</section>

<?php
if(!empty($service['service_page_branding_message'])) {
$service_branding_header_image = (!empty($service['service_page_branding_background_image']['url']) ? esc_url($service['service_page_branding_background_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/service_page_branding_background_image.png')); ?>
	<section class="branding" style="background-image: url(<?php echo $service_branding_header_image; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="description">
						<?php echo $service['service_page_branding_message']; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="back-btn">
		<a href="<?=get_home_url()?>#services" class="btn-view-all-show-cases c-btn sold-btn">
			BACK TO SERVICES
		</a>
	</section>
<?php } ?>

<?php if(!empty($service['service_infos'])) { ?>
	<section class="info">
		<div class="container">
			<div class="row">
				<?php
				$col = 0;$colPos ='';
				foreach ($service['service_infos'] as $index  => $info) {
					if($col == 0) {
						$colPos = 'col-lg-left col-sm-left col-xs-left';
					} else if($col == 1) {
						$colPos = 'col-lg-right col-sm-right col-xs-right';
					}
					$colSize = (sizeof($service['service_infos']) != 1 ? 'col-xs-12 col-sm-6 col-md-6 col-lg-6' : 'col-xs-12 col-sm-12 col-md-12 col-lg-12');
					$colPos ='';
					?>
					<div class="<?php echo $colSize; ?> service-info-item <?php echo $colPos; ?> <?php echo ($index == (sizeof($service['service_infos']) - 1) ? 'last' : '') ?> <?php echo ( ($index == (sizeof($service['service_infos']) - 2)) && $col == 0 ? 'before-last' : '') ?>">
						<h1 class="title"><?php echo $info['info_title']; ?></h1>
						<div class="description"><?php echo $info['info_description']; ?></div>
					</div>
					<?php if ($col == 0 && sizeof($service['service_infos']) != 1) { ?>
						<div class="full-center-vertical-divider"></div>
					<?php } ?>
					<?php if ($col == 1) { ?>
						<div class="clear"></div>
					<?php } ?>
				<?php ($col == 1 ? $col = 0 : $col++); } ?>
			</div>
		</div>
	</section>
<?php } ?>


<?php //$services_page_show_cases_background_image = (!empty($pageOptions['services_page_show_cases_background_image']['url']) ? esc_url($pageOptions['services_page_show_cases_background_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/services-show-you-background-section.jpg')); ?>
<?php if(!empty($service['service_related_projects'])) { ?>
<?php //$services_page_show_cases_background_image = (esc_url(get_stylesheet_directory_uri() . '/img/services-show-you-background-section.jpg')); ?>
	<section class="some-of-show-cases">
		<span class="word-background">show you</span>
		<div class="container">
			<div class="row related-projects">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!--<h1>--><?php ////echo $pageOptions['services_page_show_cases_title']; ?><!--</h1>-->
					<h1>OTHER SERVICES</h1>
				</div>

				<?php $hover = ['green-card-hover', 'red-card-hover', 'purple-card-hover']; ?>
				<?php $mobHover = ['purple-card-gradient', 'pink-card-gradient', 'blue-card-gradient', 'red-card-gradient']; ?>
				<?php  $col = 0;$colPos =''; $mobHoverCount = 0;
				foreach ($service['service_related_projects'] as $project) {
					$title = (!empty($project['project_card_title']) ? $project['project_card_title'] : $project['post_title']);
					if($col == 0) {
						$colPos = 'col-lg-left col-sm-left col-xs-left';
					} else if($col == 1) {
						$colPos = 'col-lg-center col-sm-center col-xs-center';
					} else if($col == 2) {
						$colPos = 'col-lg-right col-sm-right col-xs-right';
					}
					$colPos = '';
					?>
					<article class="col-xs-12 col-sm-6 col-md-4 col-lg-4 show-case-item zoom-effect <?php echo $colPos; ?>">
						<section class="<?php echo $hover[$col]; ?>">
							<figure>
								<!--<div class="lazy-loader-effect"></div>-->
								<div class="loader"><div class="square" ></div><div class="square"></div><div class="square last"></div><div class="square clear"></div><div class="square"></div><div class="square last"></div><div class="square clear"></div><div class="square "></div></div>
								<a  href="<?php echo esc_url(get_permalink($project['id'])); ?>">
									<img class="img-lazy lazy-not-loaded lazy-loader" data-src="<?php echo esc_url($project['project_card_image']['url']); ?>" alt="<?php echo $title; ?>" />
								</a>
							</figure>
							<a class="desk" href="<?php echo esc_url(get_permalink($project['id'])); ?>">
								<div class="overlay bg-rotate">
									<h5><?php echo $title; ?></h5>
									<?php if (!empty($project['project_card_sub_title'])) ?>
									<h6><?php echo $project['project_card_sub_title']; ?></h6>
								</div>
							</a>
							<a class="mob <?php echo $mobHover[$mobHoverCount]; ?>" href="<?php echo esc_url(get_permalink($project['id'])); ?>">
								<div >
									<h5><?php echo $title; ?></h5>
									<?php if (!empty($project['project_card_sub_title'])) ?>
									<h6><?php echo $project['project_card_sub_title']; ?></h6>
								</div>
							</a>
						</section>
					</article>
					<?php ($col == 2 ? $col = 0 : $col++); ($mobHoverCount == 3 ? $mobHoverCount = 0 : $mobHoverCount++);} ?>
			</div>
		</div>
		<a href="<?php echo esc_url(home_url('about-us')); ?>" class="btn-view-all-show-cases c-btn">
			<span></span>
			VIEW FULL SHOWCASE
		</a>
	</section>
<?php } ?>

	<section class="prefooter lazy-background" data-bg="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/prefooter.png'); ?>">
		<div class="container">
			<div class="row">
				<div class="img-prefooter col-lg-5  col-md-12">
					<img class="img-responsive" src="<?php echo get_template_directory_uri().'/img/infographics-for-banner@3x.png' ?>">
				</div>
				<div class="col-lg-7  col-md-12">
					<h1><?php echo $setting['settings_pre_footer_title']; ?></h1>
					<p><?php echo $setting['settings_pre_footer_subtitle']; ?></p>
					<a href="<?php echo home_url('get-a-quote'); ?>" class="c-btn">TELL US ABOUT YOUR PROJECT</a>
				</div>
			</div>
		</div>
	</section>

<?php get_footer();