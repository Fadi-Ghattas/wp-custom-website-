<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/11/17
 * Time: 1:15 PM
 */

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);

$fields = [
	'id',
	'post_title',
	'menu_order',
	[
		'acf' => 1,
		'name' => 'project_name_color',
	],
	[
		'acf' => 1,
		'name' => 'project_logo',
	],
	[
		'acf' => 1,
		'name' => 'project_header_title',
	],
	[
		'acf' => 1,
		'name' => 'project_header_title_color',
	],
	[
		'acf' => 1,
		'name' => 'project_header_background_color',
	],
	[
		'acf' => 1,
		'name' => 'project_background_header_image',
	],
	[
		'acf' => 1,
		'name' => 'project_short_description',
	],
	[
		'acf' => 1,
		'name' => 'project_short_description_color',
	],

	[
		'acf' => 1,
		'name' => 'project_info_blocks',
	],

	[
		'acf' => 1,
		'name' => 'project_slider',
	],
	[
		'acf' => 1,
		'name' => 'project_slider_section_background_color',
	],

	[
		'acf' => 1,
		'name' => 'project_show_case_one_image',
	],
	[
		'acf' => 1,
		'name' => 'project_show_case_one_image_background_color',
	],
	[
		'acf' => 1,
		'name' => 'project_show_case_one_description',
	],
	[
		'acf' => 1,
		'name' => 'project_show_case_one_description_color',
	],
	[
		'acf' => 1,
		'name' => 'project_show_case_one_description_background_color',
	],

	[
		'acf' => 1,
		'name' => 'project_show_case_two_title',
	],
	[
		'acf' => 1,
		'name' => 'project_show_case_two_title_color',
	],
	[
		'acf' => 1,
		'name' => 'project_show_case_two_background_image',
	],
	[
		'acf' => 1,
		'name' => 'project_show_case_two_description',
	],
	[
		'acf' => 1,
		'name' => 'project_show_case_two_description_color',
	],

	[
		'acf' => 1,
		'name' => 'project_client_say_title'
	],
	[
		'acf' => 1,
		'name' => 'project_client_say_title_color'
	],
	[
		'acf' => 1,
		'name' => 'project_client_say_blocks',
	],
	[
		'acf' => 1,
		'name' => 'project_client_says_section_background_type',
	],
	[
		'acf' => 1,
		'name' => 'project_client_says_section_background_gradient',
	],
	[
		'acf' => 1,
		'name' => 'project_client_says_section_background_color',
	],
	[
		'acf' => 1,
		'name' => 'project_client_says_section_background_image',
	],

	[
		'acf' => 1,
		'name' => 'project_url_title',
	],
	[
		'acf' => 1,
		'name' => 'project_url_title_color',
	],
	[
		'acf' => 1,
		'name' => 'project_url',
	],
	[
		'acf' => 1,
		'name' => 'project_url_name',
	],
	[
		'acf' => 1,
		'name' => 'project_url_name_color',
	],
	[
		'acf' => 1,
		'name' => 'project_url_section_background_color',
	],

	[
		'acf' => 1,
		'name' => 'project_next_project_link_text_color',
	],
	[
		'acf' => 1,
		'name' => 'project_page_separators_lines_color',
	],

];

$project = ProjectModel::findOne((new ProjectModel())->pod_name, get_the_ID(), $fields);

$next = intval($project['menu_order']) +1;
$fields = ['id'];
$filters = ['limit' => -1, 'page' => 1, 'where' => "t.menu_order = {$next}", 'order_by' => 't.menu_order, t.post_date, project_is_featured.meta_value DESC'];
$nextProject = ProjectModel::search((new ProjectModel())->pod_name, $fields, $filters);

get_header();
get_template_part('template-part', 'topnav');
?>
	<section class="project-header">
		<div class="project-header-container">
			<img class="img-responsive header-image" src="<?php echo esc_url($project['project_background_header_image']['url']); ?>">
			<div class="center header-text">
				<p class="title" style="color: <?php echo $project['project_header_title_color']; ?>"><?php echo $project['project_header_title']; ?></p>
				<p class="name" style="color: <?php echo $project['project_name_color']; ?>"><?php echo $project['post_title']; ?></p>
				<div class="short-description" style="color: <?php echo $project['project_short_description_color']; ?>">
					<?php echo $project['project_short_description']; ?>
				</div>
			</div>
		</div>
	</section>


<?php if (!empty($project['project_info_blocks'])) {
	$rows = 0;
	?>
	<section class="project-info">
		<?php if (sizeof($project['project_info_blocks']) != 1) { ?>
			<?php foreach ($project['project_info_blocks'] as $info_block) { ?>
				<?php if ($rows == 0) { ?>
					<div class="project-info-row">
						<div class="container">
							<div class="row">
						<?php } ?>
						<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6 info-item <?php echo($info_block['project_block_type'] == 3 ? 'logo' : ''); ?>">
							<?php if ($info_block['project_block_type'] == 1) { ?>
								<h1 class="title" style="color: <?php echo $info_block['project_block_title_color']; ?>"><?php echo $info_block['project_block_title']; ?></h1>
								<div class="description" style="<?php echo $info_block['project_block_description_color'] ?>">
									<?php echo $info_block['project_block_description'] ?>
								</div>
							<?php } else if ($info_block['project_block_type'] == 3) { ?>
								<img class="img-responsive" src="<?php echo $project['project_logo']['url']; ?>" alt="<?php echo $project['post_title']; ?>">
							<?php } else if ($info_block['project_block_type'] == 2) { ?>
								<img class="img-responsive" src="<?php echo $info_block['project_block_image']['url']; ?>" alt="<?php echo $project['post_title']; ?>">
							<?php } ?>
						</article>
						<?php ($rows < 1 ? $rows++ : $rows = 0); ?>
						<?php if ($rows == 0) { ?>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		<?php } else { ?>

			<?php foreach ($project['project_info_blocks'] as $info_block) { ?>
				<div class="project-info-row">
					<div class="container">
						<div class="row">
							<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-item <?php echo($info_block['project_block_type'] == 3 ? 'logo' : ''); ?>">
								<?php if ($info_block['project_block_type'] == 1) { ?>
									<h1 class="title" style="color: <?php echo $info_block['project_block_title_color']; ?>"><?php echo $info_block['project_block_title']; ?></h1>
									<div class="description" style="<?php echo $info_block['project_block_description_color'] ?>">
										<?php echo $info_block['project_block_description'] ?>
									</div>
								<?php } else if ($info_block['project_block_type'] == 3) { ?>
									<img class="img-responsive" src="<?php echo $project['project_logo']['url']; ?>" alt="<?php echo $project['post_title']; ?>">
								<?php } else if ($info_block['project_block_type'] == 2) { ?>
									<img class="img-responsive" src="<?php echo $info_block['project_block_image']['url']; ?>" alt="<?php echo $project['post_title']; ?>">
								<?php } ?>
							</article>
						</div>
					</div>
				</div>
			<?php } ?>

		<?php } ?>

		<a href="#">
			<div class="move-section">
				<div class="icono-arrow1-down"></div>
			</div>
		</a>

	</section>

<?php } ?>

<?php if (!empty($project['project_slider'])) { ?>
	<section class="project-slider" style="background: <?php echo $project['project_slider_section_background_color'];?>;">
		<div class="container">
			<div class="row">
				<div class="slider">
					<?php foreach ($project['project_slider'] as $slid) { ?>
						<div class="slide">
							<img class="img-responsive" src="<?php echo esc_url($slid['url']); ?>">
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<?php if(!empty($project['project_show_case_one_description'])) { ?>
	<section class="show-case-one" style="background-color:<?php echo $project['project_show_case_one_description_background_color']; ?>;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 description-container">
					<div class="description" style="color:<?php echo $project['project_show_case_one_description_color']; ?>;">
						<?php echo $project['project_show_case_one_description']; ?>
					</div>
				</div>
			</div>
		</div>
		<a href="#">
			<div class="move-section">
				<div class="icono-arrow1-down"></div>
			</div>
		</a>
	</section>
<?php } ?>

<?php if(!empty($project['project_show_case_one_image'])) { ?>
	<section class="show-case-one-image" style="background: <?php echo $project['project_show_case_one_image_background_color']; ?>;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 img-container">
					<img class="img-responsive" src="<?php echo esc_url($project['project_show_case_one_image']['url']); ?>">
				</div>
			</div>
		</div>
		<a href="#">
			<div class="move-section">
				<div class="icono-arrow1-down"></div>
			</div>
		</a>
	</section>
<?php } ?>

<?php if(!empty($project['project_show_case_two_background_image'])) { ?>
	<section class="show-case-two">
		<img class="img-responsive" src="<?php echo esc_url($project['project_show_case_two_background_image']['url']); ?>">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1 class="title" style="color: <?php echo $project['project_show_case_two_title_color']; ?>">
						<?php echo $project['project_show_case_two_title']; ?>
					</h1>
					<div class="description" style="color: <?php echo $project['project_show_case_two_description_color']; ?>">
						<?php echo $project['project_show_case_two_description']; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<?php if(!empty($project['project_client_say_blocks']))
{
	$background = 'background: #f78ca0';
	if($project['project_client_says_section_background_type'] == 1)
		$background = $project['project_client_says_section_background_gradient'];
	else if ($project['project_client_says_section_background_type'] == 2)
		$background = 'background: url(' . $project['project_client_says_section_background_image']['url'].') no-repeat 100% 100%';
	else
		$background = 'background: ' . $project['project_client_says_section_background_color'];
	?>

	<section class="client-say" style="<?php echo $background; ?>;">
		<div class="container">
			<div class="row">
					<h1 class="title" style="color: <?php echo $project['project_client_say_title_color']; ?>">
						<?php echo $project['project_client_say_title']; ?>
					</h1>

				<div class="row say-blocks">
					<?php foreach ($project['project_client_say_blocks'] as $say) { ?>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 say-block" style="color: <?php echo $say['project_client_say_block_color'] ?>">
							<div>
								<?php echo $say['project_client_say_block']; ?>
							</div>
						</div>
					<?php } ?>
				</div>

			</div>
		</div>
	</section>
<?php } ?>

<?php if(!empty($project['project_url'])) { ?>

	<section class="project-url" style="background: <?php echo $project['project_url_section_background_color']; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1 class="title" style="color: <?php echo $project['project_url_title_color']; ?>">
						<?php echo $project['project_url_title']; ?>
					</h1>
					<a class="url-name" href="<?php echo esc_url($project['project_url']); ?>" style="color: <?php echo $project['project_url_name_color']; ?>">
						<p><?php echo $project['project_url_name']; ?></p>
						<div class="icono-arrow1-left-up"></div>
					</a>
				</div>
			</div>
		</div>
		<a href="<?php echo get_permalink($nextProject['id']); ?>" class="next-project-btn">
			<span>NEXT PROJECT</span>
			<div class="icono-arrow1-left"></div>
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
					<a href="" class="c-btn">TELL US ABOUT YOUR PROJECT</a>
				</div>
			</div>
		</div>
	</section>

<?php

get_footer();