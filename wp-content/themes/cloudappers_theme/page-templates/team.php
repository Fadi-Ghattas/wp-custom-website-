<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/16/17
 * Time: 12:46 PM
 * Template Name: TeamPage
 */

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);

$pageOptions = acf_get_group_fields(get_the_ID());

$team = Team::viewAll();
$positions = Position::viewAll();

get_header();
get_template_part('template-part', 'topnav');
?>

<?php $services_page_header_image = (!empty($pageOptions['team_page_header_image']['url']) ? esc_url($pageOptions['team_page_header_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/team_page_header_image.png')); ?>
    <section class="ca-page-header parallax-window" data-parallax="scroll" data-bleed="50"
             data-image-src="<?php echo $services_page_header_image; ?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="title"><?php echo $pageOptions['team_page_header_title']; ?></p>
                    <p class="sub-title"><?php echo $pageOptions['team_page_header_subtitle']; ?></p>
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
                    <?php echo $pageOptions['team_page_header_description']; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="all-the-team team">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
                    <ul class="filters">
                        <?php foreach ($positions as $position) { ?>
                            <li>
                                <a href="#"
                                   data-type=".<?php echo str_replace(' ', '_', strtolower($position['post_title'])); ?>">
                                    <img class="icon" src="<?php echo esc_url($position['position_icon']['url']); ?>">
                                    <img class="icon-hover"
                                         src="<?php echo esc_url($position['position_icon_on_hover']['url']); ?>">
                                    <p class="filter-text"
                                       style="color: <?php echo $position['position_font_color'] ?>"><?php echo $position['post_title']; ?></p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="clear"></div>
                <div class="grid-container">
                    <div class="grid">
                    <div class="members">
                        <div class="grid-sizer col-lg-3 col-md-4 col-sm-6 col-xs-6"></div>
                        <?php
                        $hoverCount = 0;
                        foreach ($team as $teamMember) {
                            $hover = ['gradient-purple', 'gradient-pink', 'gradient-green'];
                            ?>
                            <div class="responsive-loader col-lg-3 col-md-4 col-sm-6 col-xs-6 team-member <?php echo str_replace(' ', '_', strtolower($teamMember['team_member_position'][0]['post_title'])); ?>">
                                <section class="<?php echo $hover[$hoverCount]; ?>">
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
                                             data-src="<?php echo esc_url($teamMember['team_member_profile_image']['url']); ?>"
                                             alt="<?php echo $teamMember['post_title']; ?>"/>
                                    </figure>
                                    <div class="overlay member-info">
                                        <h5><?php echo $teamMember['post_title']; ?></h5>
                                        <h6><?php echo $teamMember['team_member_title']; ?></h6>
                                    </div>
                                </section>
                            </div>
                            <?php ($hoverCount == 2 ? $hoverCount = 0 : $hoverCount++);
                        } ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
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
                    <a href="<?php echo home_url('get-a-quote'); ?>" class="c-btn">TELL US ABOUT
                        YOUR PROJECT</a>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();