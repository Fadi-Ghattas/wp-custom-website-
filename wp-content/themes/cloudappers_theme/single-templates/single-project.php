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


get_header();
get_template_part('template-part', 'topnav');
?>
	<section class="project-header">
		<div class="project-header-container">
			<img class="header-image" src="<?php echo esc_url($project['project_background_header_image']['url']); ?>">
			<div class="center header-text">
				<p class="title" style="color: <?php echo $project['project_header_title_color']; ?>"><?php echo $project['project_header_title']; ?></p>
				<p class="name" style="color: <?php echo $project['project_name_color']; ?>"><?php echo $project['post_title']; ?></p>
				<div class="short-description" style="color: <?php echo $project['project_short_description_color']; ?>">
					<?php echo $project['project_short_description']; ?>
				</div>
			</div>
		</div>
	</section>


<?php if (!empty($project['project_info_blocks'])) { ?>
	<section class="project-info">
		<div class="container">
			<div class="row">
				<?php foreach ($project['project_info_blocks'] as $info_block) { ?>
					<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6 info-item <?php echo ($info_block['project_block_type'] == 3 ? 'logo' : ''); ?>">
						<?php if($info_block['project_block_type'] == 1) { ?>
							<h1 class="title" style="color: <?php echo $info_block['project_block_title_color']; ?>"><?php echo $info_block['project_block_title']; ?></h1>
							<div class="description" style="<?php echo $info_block['project_block_description_color'] ?>">
								<?php echo $info_block['project_block_description'] ?>
							</div>
						<?php } else if ($info_block['project_block_type'] == 3) { ?>
								<img src="<?php echo $project['project_logo']['url']; ?>" alt="<?php echo $project['post_title']; ?>">
						<?php } else if ($info_block['project_block_type'] == 2) { ?>
								<img src="<?php echo $info_block['project_block_image']['url']; ?>" alt="<?php echo $project['post_title']; ?>">
						<?php } ?>
					</article>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>


<?php if (!empty($project['project_slider'])) { ?>
	<section class="project-slider">
		<div class="container">
			<div class="row">
				<div class="slider">
					<?php foreach ($project['project_slider'] as $slid) { ?>
						<div class="slide">
							<img src="<?php echo esc_url($slid['url']); ?>">
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<?php if(!empty($project['project_show_case_one_description'])) { ?>
	<section class="show-case-one">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 description-container">
					<div class="description" style="color:<?php echo $project['project_show_case_one_description_color']; ?>">
						<?php echo $project['project_show_case_one_description']; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<?php if(!empty($project['project_show_case_one_image'])) { ?>
	<section class="show-case-one-image">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 description-container">
					<img src="<?php echo esc_url($project['project_show_case_one_image']['url']); ?>">
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<?php

get_footer();