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
?>
<!--	<section class="ca-page-header" style="background: url(--><?php //echo esc_url($pageOptions['services_page_header_image']['url']); ?>/*) no-repeat center;">*/
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

				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

				</div>

			</div>
		</div>
	</section>
<?php
get_footer();