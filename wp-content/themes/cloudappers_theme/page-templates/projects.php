<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/11/17
 * Time: 1:14 PM
 * Template Name: ProjectsPage
 */

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);

$pageOptions = acf_get_group_fields(get_the_ID());

$projects = Project::viewAll();
$projectTypes = ProjectType::viewAll();


get_header();
get_template_part('template-part', 'topnav');

?>

<?php $services_page_header_image = (!empty($pageOptions['show_you_page_header_image']['url']) ? esc_url($pageOptions['show_you_page_header_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/show_you_page_header_image.png')); ?>
	<section class="ca-page-header parallax-window" data-parallax="scroll" data-image-src="<?php echo $services_page_header_image; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="title"><?php echo $pageOptions['show_you_page_header_title']; ?></p>
					<p class="sub-title"><?php echo $pageOptions['show_you_page_header_subtitle']; ?></p>
				</div>
			</div>
		</div>
	</section>

<section class="all-projects some-of-show-cases">
	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
				<div class="filters-back">
					<div class="filters-container">
						<ul class="filters">
							<li><a href="#">
									<img class="icon" src="<?php echo esc_url(get_stylesheet_directory_uri(). '/img/all-icon.png'); ?>">
									<img class="icon-hover" src="<?php echo esc_url(get_stylesheet_directory_uri(). '/img/all-icon.hover.png');?>">
									ALL
								</a></li>

							<?php foreach ($projectTypes as $projectType) { ?>
							<li><a href="#" data-type=".<?php echo $projectType['post_title']; ?>">
									<img class="icon" src="<?php echo esc_url($projectType['project_type_icon']['url']); ?>">
									<img class="icon-hover" src="<?php echo esc_url($projectType['project_type_icon_on_hover']['url']); ?>">
									<?php echo $projectType['post_title']; ?>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>

			<div class="clear"></div>

			<div class="grid">
				<div class="grid-sizer col-xs-12 col-sm-6 col-md-4 col-lg-4"></div>
				<?php $hover = ['green-card-hover', 'red-card-hover', 'purple-card-hover']; ?>
				<?php $col = 0;$colPos ='';
				foreach ($projects as $project) {
					$title = (!empty($project['project_card_title']) ? $project['project_card_title'] : $project['post_title']);
					if($col == 0) {$colPos = 'col-lg-left col-sm-left col-xs-left';} else if($col == 1) {$colPos = 'col-lg-center col-sm-center col-xs-center';} else if($col == 2) {$colPos = 'col-lg-right col-sm-right col-xs-right';}
					?>
					<article class="col-xs-12 col-sm-6 col-md-4 col-lg-4 show-case-item zoom-effect <?php echo $colPos; ?> <?php echo $project['project_type'][0]['post_title']; ?>" data-type="<?php echo $project['project_type'][0]['post_title']; ?>">
						<section class="<?php echo $hover[$col]; ?>">
							<figure>
								<!--<div class="lazy-loader-effect"></div>-->
								<div class="loader"><div class="square" ></div><div class="square"></div><div class="square last"></div><div class="square clear"></div><div class="square"></div><div class="square last"></div><div class="square clear"></div><div class="square "></div></div>
								<img class="img-lazy lazy-not-loaded lazy-loader lazy-iso-not-loaded" data-src="<?php echo esc_url($project['project_card_image']['url']); ?>" alt="<?php echo $title; ?>" />
							</figure>
							<a href="<?php echo esc_url(get_permalink($pageShowCases[$i]['id'])); ?>">
								<div class="overlay bg-rotate">
									<h5><?php echo $title; ?></h5>
									<?php if (!empty($project['project_card_sub_title'])) ?>
									<h6><?php echo $project['project_card_sub_title']; ?></h6>
								</div>
							</a>
						</section>
					</article>
					<?php ($col == 2 ? $col = 0 : $col++); } ?>
			</div>

		</div>
	</div>
</section>

<?php
get_footer();