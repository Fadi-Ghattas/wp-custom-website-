<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/11/17
 * Time: 1:15 PM
 * Template Name: ContactUsPage
 */

get_header();
get_template_part('template-part', 'topnav');
?>

<?php $services_page_header_image = (!empty($pageOptions['let_us_page_header_image']['url']) ? esc_url($pageOptions['let_us_page_header_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/contactus-header.png')); ?>

    <section class="ca-page-header parallax-window" data-parallax="scroll" data-bleed="50" data-image-src="<?php echo $services_page_header_image; ?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="title">What's cooking</p>
                    <p class="sub-title">Good Looking</p>
                    <div class="desc">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blue-desc">
        <div class="right-top-div">
            <img alt="I'm live" class="img-responsive" src="<?php echo get_template_directory_uri() . '/img/IamLive.png' ?>">
            <div class="live-desc">
                I'm live
            </div>
        </div>
        <div class="container">
            <div class="blue-desc-text">
                A magical place where great app ideas are hand-crafted into successful
                businesses thanks to the talented bunch of digital
                freaks we proudly home
            </div>
        </div>
    </section>

    <section class="prefooter lazy-background"
             data-bg="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/prefooter.png'); ?>">
        <div class="container">
            <div class="row">
                <div class="img-prefooter col-lg-5  col-md-12">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/img/infographics-for-banner@3x.png' ?>">
                </div>
                <div class="col-lg-7  col-md-12">
                    <h1>Ready to make your idea happens?</h1>
                    <p>That's the spirits! Let's make history together</p>
                    <a href="https://cloudappers.typeform.com/to/dUDCpe" class="c-btn">TELL US ABOUT YOUR PROJECT</a>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();
