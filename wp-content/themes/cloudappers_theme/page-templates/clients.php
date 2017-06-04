<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/03/17
 * Time: 10:40 AM
 * Template Name: ClientsPage
 */

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);

$pageOptions = acf_get_group_fields(get_the_ID());

$clients = Client::viewAll();

get_header();
get_template_part('template-part', 'topnav');
?>

<?php $services_page_header_image = (!empty($pageOptions['clients_page_header_image']['url']) ? esc_url($pageOptions['clients_page_header_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/clients_page_header_image.png')); ?>
	<section class="ca-page-header parallax-window" data-parallax="scroll" data-bleed="50" data-image-src="<?php echo $services_page_header_image; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="title"><?php echo $pageOptions['clients_page_header_title']; ?></p>
					<p class="sub-title"><?php echo $pageOptions['clients_page_header_subtitle']; ?></p>
				</div>
			</div>
		</div>
	</section>
    <div class="main-wrapper">
	<section class="ca-page-banner">
	<!--<div class="vertical-line"></div>-->
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php echo $pageOptions['clients_page_header_description']; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="clients">
		<div class="container">
			<div class="row">
				<div class="client-row">
					<?php foreach ($clients as $client) { ?>
						<a href="<?php echo esc_url($client['client_website_url']); ?>"
						   class="item  col-md-2 col-sm-3 col-xs-4">
							<img src="<?php echo esc_url($client['client_logo']['url']); ?>">
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>


	<section class="prefooter lazy-background" data-bg="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/prefooter.png'); ?>">
		<div class="container">
			<div class="row">
				<div class="img-prefooter col-lg-5  col-md-12">
					<img class="img-responsive" src="<?php echo get_template_directory_uri() . '/img/infographics-for-banner@3x.png' ?>">
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
