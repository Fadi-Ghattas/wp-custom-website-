<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/11/17
 * Time: 1:14 PM
 * Template Name: AboutPage
 */
$homePagePost = get_page_by_path('let-us', OBJECT, 'page');
$pageOptions = acf_get_group_fields($homePagePost->ID);
if (intval($pageOptions['let_us_page_clients_how_many_to_show']))
    $clients = Client::viewAll(['page' => 'home', 'limit' => intval($pageOptions['let_us_page_clients_how_many_to_show'])]);

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);

$timesLines = TimeLine::viewAll();
$sweetWords = SweetWord::viewAll();

get_header();
get_template_part('template-part', 'topnav');

?>

<?php $services_page_header_image = (!empty($pageOptions['let_us_page_header_image']['url']) ? esc_url($pageOptions['let_us_page_header_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/about-header.jpg')); ?>
    <section class="ca-page-header parallax-window" data-parallax="scroll" data-image-src="<?php echo $services_page_header_image; ?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="title"><?php echo $pageOptions['let_us_page_header_title']; ?></p>
                    <p class="sub-title"><?php echo $pageOptions['let_us_page_header_subtitle']; ?></p>
                    <div class="desc"><?php echo $pageOptions['let_us_page_header_description']; ?></div>
                </div>
            </div>
        </div>
    </section>

<?php if (!empty($pageOptions['let_us_page_message_title']) && !empty($pageOptions['let_us_page_message_text'])) { ?>
    <section class="ouraim">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><?php echo $pageOptions['let_us_page_message_title']; ?></h6>
                    <div><?php echo $pageOptions['let_us_page_message_text']; ?></div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if(!empty($timesLines)) { ?>
    <section class="time">
        <h6><?php echo $pageOptions['let_us_page_time_line_title']; ?></h6>
    </section>
    <section class="history">
        <div class="history-slider">
            <?php foreach ($timesLines as $timesLines) { ?>
                <div class="slide" data-desc="<?php echo $timesLines['timeline_year']; ?>">
                    <h1><?php echo $timesLines['post_title']; ?></h1>
                    <div><?php echo $timesLines['timeline_description']; ?></div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>

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

    <section class="why">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center main-title">
                    <h1>Why CloudAppers</h1>
                    <p>
                        We are organised into interdisciplinary project teams and work closely alongside one another
                        throughout the
                        entire duration of the project.
                    </p>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/img/why1.png' ?>"/>
                    <h3>Constant Interaction</h3>
                    <p>Iteration in the form of continuous checks is important. This enables us to keep an eye on
                        everything and guarantee the high quality of our work. Everyone plays a role in helping to
                        validate the results early on, not just on the day of the launch.</p>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/img/why2.png' ?>"/>
                    <h3>Collaborative team work</h3>
                    <p>Transparency through integration: by involving our clients in our workflows, we can offer them a
                        permanent insight into our progress, thereby increasing the quality of the results..</p>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/img/why3.png' ?>"/>
                    <h3>Long-term support</h3>
                    <p>Our work doesn’t end when your website goes online or your campaign is launched. We plan beyond
                        that and support our clients and projects in the long term.</p>
                </div>
            </div>
        </div>
    </section>

<?php if (!empty($clients) && intval($pageOptions['home_page_clients_how_many_to_show'])) { ?>
    <section class="clients">
        <div class="container">
            <div class="row">
                <div class="client-row">
                    <h6>Collaborations based on trust</h6>
                    <?php foreach ($clients as $client) { ?>
                        <a href="<?php echo esc_url($client['client_website_url']); ?>"
                           class="item  col-md-2 col-sm-3 col-xs-4"><img class=""
                                                                         src="<?php echo esc_url($client['client_logo']['url']); ?>"></a>
                    <?php } ?>
                </div>

            </div>
        </div>
        <div class="view-all"><a href="<?php echo home_url('clients'); ?>">VIEW ALL CLIENTS</a></div>
    </section>
<?php } ?>

    <section class="words">
        <div class="left-sec"></div>
        <div class="right-sec"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="words-slider">
                        <div class="slide">
                            <div class="img-slide">
                                <img src="<?php echo get_template_directory_uri() . '/img/s1.jpg' ?>"/>
                            </div>
                            <div class="info-slide">
                                <h6>some sweet words</h6>
                                <p>“It ended up saving us money working with CloudAppers,because they delivered premium
                                    product right from the begining.”</p>
                                <h5>STEVE HARMISON</h5>
                                <h4>CO-FOUNDER & CEO @ ONESTONE</h4>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="img-slide">
                                <img src="<?php echo get_template_directory_uri() . '/img/s1.jpg' ?>"/>
                            </div>
                            <div class="info-slide">
                                <h6>some sweet words</h6>
                                <p>“It ended up saving us money working with CloudAppers,because they delivered premium
                                    product right from the begining.”</p>
                                <h5>STEVE HARMISON</h5>
                                <h4>CO-FOUNDER & CEO @ ONESTONE</h4>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="img-slide">
                                <img src="<?php echo get_template_directory_uri() . '/img/s1.jpg' ?>"/>
                            </div>
                            <div class="info-slide">
                                <h6>some sweet words</h6>
                                <p>“It ended up saving us money working with CloudAppers,because they delivered premium
                                    product right from the begining.”</p>
                                <h5>STEVE HARMISON</h5>
                                <h4>CO-FOUNDER & CEO @ ONESTONE</h4>
                            </div>
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
                    <a href="https://cloudappers.typeform.com/to/dUDCpe" class="c-btn">TELL US ABOUT YOUR PROJECT</a>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
