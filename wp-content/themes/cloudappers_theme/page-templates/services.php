<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/03/17
 * Time: 10:53 AM
 * Template Name: ServicesPage
 */

get_header();
get_template_part('template-part', 'topnav');
$pageOptions = acf_get_group_fields(get_the_ID());
$pageShowCases = ProjectModel::getProjectsAsShowCasesForPage($pageOptions['services_page_show_cases']);
$services = Service::viewAll();

?>

	<section class="ca-page-header parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url($pageOptions['services_page_header_image']['url']); ?>">
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
				<?php foreach ($services as $service) {
					$title = (!empty($service['service_card_title']) ? $service['service_card_title'] : $service['post_title']);
					$description = (!empty($service['service_card_description']) ? $service['service_card_description'] : $service['service_description']);
					$description = limit_text_as_expert($service['id'], $description, 33, '#5d5f74', 0);
					?>
					<article class="col-xs-12 col-sm-6 col-md-4 col-lg-4 service-item">
							<a href="<?php echo get_permalink($service['id']); ?>">
								<img class="icon" src="<?php echo esc_url($service['service_icon']['url']); ?>" alt="<?php echo $title; ?>">
								<p class="title"><?php echo  $title; ?></p>
								<div class="description"><?php echo  $description; ?></div>
								<img class="more" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/more-grey-icon@3x.svg'); ?>"/>
							</a>
					</article>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="show-cases">
		<div class="container">
			<div class="row">
				<article class="col-xs-12 col-sm-6 col-md-4 col-lg-4 show-case-item">
					<figure>
						<img src="" >
					</figure>
				</article>
			</div>
		</div>
	</section>

<?php
get_footer();