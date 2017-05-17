<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/11/17
 * Time: 1:14 PM
 * Template Name: AboutPage
 */

get_header();
get_template_part('template-part', 'topnav');

?>

<?php $services_page_header_image = (!empty($pageOptions['services_page_header_image']['url']) ? esc_url($pageOptions['services_page_header_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/about-header.jpg')); ?>
    <section class="ca-page-header parallax-window" data-parallax="scroll"
             data-image-src="<?php echo $services_page_header_image; ?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="title">WE ARE</p>
                    <p class="sub-title">CLOUDAPPERS</p>
                    <p class="desc">We were born as complete strangers from different corners of the planet, and grew to
                        become one
                        big happy family. We embrace the weirdness that makes us so individually different yet unites us
                        into  a single functional unit of design gurus and tech geeks. </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ouraim">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6>our aim</h6>
                    <p>To deliver positive digital experiences that make us proud.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="process">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>process</h1>
                    <p>The Below Diagram Lets you know what to expect from us and what is expected from you at each
                        milestone of the project cycle.
                    </p>
                    <img src="<?php echo get_template_directory_uri() . '/img/precess.png' ?> "/>
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
                    <a href="https://cloudappers.typeform.com/to/dUDCpe" class="c-btn">TELL US ABOUT YOUR PROJECT</a>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
