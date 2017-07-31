<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/11/17
 * Time: 1:15 PM
 * Template Name: ContactUsPage
 */

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);

$pageOptions = acf_get_group_fields(get_the_ID());

$homePagePost = get_page_by_path('home', OBJECT, 'page');
$homeOptions = acf_get_group_fields($homePagePost->ID);

$jobs = Job::viewAll();

get_header();
get_template_part('template-part', 'topnav');
?>

<?php


$services_page_header_image = (!empty($pageOptions['for_you_page_header_image']['url']) ? esc_url($pageOptions['for_you_page_header_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/contactus-header.png'));
?>

    <section class="ca-page-header parallax-window" data-parallax="scroll" data-bleed="50" data-image-src="<?php echo $services_page_header_image; ?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="title"><?php echo $pageOptions['for_you_page_header_title']; ?></p>
                    <p class="sub-title"><?php echo $pageOptions['for_you_page_header_subtitle']; ?></p>
                </div>
            </div>
        </div>
    </section>
    <div class="main-wrapper">
    <section class="ca-page-banner">
        <div class="right-top-div">
            <img alt="I'm live" class="img-responsive"
                 src="<?php echo get_template_directory_uri() . '/img/IamLive.png' ?>">
            <div class="live-desc">
                I'm live
            </div>
        </div>
        <div class="container">
            <div><?php echo $pageOptions['for_you_page_message']; ?></div>
        </div>
    </section>

<?php if (!empty($jobs)) { ?>
    <section class="join">
        <div class="container">

            <div class="row title">
                <div class="col-lg-12">
                    <h6><?php echo $pageOptions['for_you_page_opportunities_title']; ?></h6>
                    <h1><?php echo $pageOptions['for_you_page_opportunities_subtitle']; ?></h1>
                </div>
            </div>
            <div class="table-title row  hidden-xs">
                <div class="col-lg-5 col-md-5 col-sm-6"><h5>POSITION</h5></div>
                <div class="col-lg-5 col-md-5 col-sm-6"><h5>DESCRIPTION</h5></div>
            </div>

            <?php foreach ($jobs as $job) {
                $jobState = strip_tags($job['job_state'][0]['post_title']);
                ?>
                <div class="row">
                    <div class="position col-lg-5 col-md-5 col-sm-6">
						<h5 class="hidden-lg hidden-md hidden-sm">POSITION</h5>
						<p><?php echo strip_tags($job['job_type'][0]['post_title']); ?>
                            <?php //echo $job['post_title']; ?>
                            <span><?php echo strip_tags($job['job_location'][0]['post_title']) . (!empty($jobState) ? ', ' . $jobState : '') ; ?></span>
                        </p>
                    </div>
                    <div class="desc col-lg-5 col-md-5 col-sm-6">
                        <h5 class="hidden-lg hidden-md hidden-sm">DESCRIPTION</h5>
                        <p> <?php echo strip_tags($job['job_description']); ?>
                            <!--<span>--><?php //echo strip_tags($job['job_type'][0]['post_title']); ?><!--</span>-->
                        </p>
                    </div>
                    <div class="apply col-lg-2 col-md-2 col-sm-12">
                        <a href="javascript:void(0)" class="apply-for-position c-btn"
                           data-location="<?php echo $job['job_location'][0]['id']; ?>"
                           data-state="<?php echo $jobState ?>"
                           data-applied-position="<?php echo $job['post_title']; ?>">apply</a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </section>
<?php } ?>

    <section class="contact col-eq-height">
        <div class="map col-lg-6">
            <div class="map-mob-shadow"></div>
            <div id="map"></div>
            <div class="address-ca">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 ">
                            <h6><?php echo $setting['settings_address_title']; ?></h6>
                            <div class="details">
                                <p class="address-details"><?php echo $setting['settings_address_text']; ?></p>
                                <p class="open-time">Open Sun to Thurs.<br> 10am until 6pm</p>
                                <p class="phone"><a href="tel:<?php echo $setting['settings_mobile_number']; ?>"><?php echo $setting['settings_mobile_number']; ?></a></p>
<!--                            <p class="mobile"><a href="tel:--><?php //echo $setting['settings_tel_number']; ?><!--">--><?php //echo $setting['settings_tel_number']; ?><!--</a></p>-->
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <!-- <a class="c-rbtn" href="-->
                            <?php //echo esc_url('https://www.google.com/maps?q=' . $pageOptions['home_page_map_pins'][0]['home_page_map_pin_latitude'] . ',' . $pageOptions['home_page_map_pins'][0]['home_page_map_pin_altitude'] . '&ll=' . $pageOptions['home_page_map_pins'][0]['home_page_map_pin_latitude'] . ',' . $pageOptions['home_page_map_pins'][0]['home_page_map_pin_altitude'] . '&z=13'); ?><!--">take me there</a>-->
                            <a id="take-me-there" href="https://www.google.ae/maps/place/CloudAppers+FZ+LLC/@25.095842,55.154749,17z/data=!3m1!4b1!4m5!3m4!1s0x3e5f6b5b4131278b:0xabda34c413e04be6!8m2!3d25.095842!4d55.156943?hl=en" target="_blank" class="c-rbtn" href="">take me there</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6>Drop us a line</h6>
                            <h1>say hello!</h1>
                            <form method="post" action="" id="GetInTouchForm">
                                <div class="form-group place-lbl">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group place-lbl">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group place-lbl">
                                    <label for="name">Company</label>
                                    <input type="text" class="form-control" id="company" name="company">
                                </div>
                                <div class="form-group place-lbl">
                                    <label for="name">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="form-group note">
                                    <label for="note">What we need to know?</label>
                                    <input type="text" class="form-control" id="note" name="note">
                                </div>
                                <button type="submit" class="c-btn">GET IN TOUCH</button>
                                <div class="form-group ms">
                                    <p class="message"></p>
                                </div>
                            </form>
                        </div>
                    </div>
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
                    <h1>Wanna bring your app idea to life?</h1>
<!--                    <p>That's the spirits! Let's make history together</p>-->
                        <!--New feedback-->
                        <p>So do we. Let's make history together!</p>
                    <a href="<?php echo home_url('get-a-quote'); ?>" class="c-btn">TELL US ABOUT YOUR PROJECT</a>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
