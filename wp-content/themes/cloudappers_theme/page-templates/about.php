<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/11/17
 * Time: 1:14 PM
 * Template Name: AboutPage
 */
$homePagePost = get_page_by_path('home', OBJECT, 'page');
$pageOptions = acf_get_group_fields($homePagePost->ID);
if (intval($pageOptions['home_page_clients_how_many_to_show']))
    $clients = Client::viewAll(['page' => 'home', 'limit' => intval($pageOptions['home_page_clients_how_many_to_show'])]);

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);


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
                        into a single functional unit of design gurus and tech geeks. </p>
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

    <section class="time">
        <h6>some blast from the past</h6>
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
                    <img class="img-responsive" src="<?php echo get_template_directory_uri().'/img/why1.png'?>" />
                    <h3>Constant Interaction</h3>
                    <p>Iteration in the form of continuous checks is important. This enables us to keep an eye on
                        everything and guarantee the high quality of our work. Everyone plays a role in helping to
                        validate the results early on, not just on the day of the launch.</p>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri().'/img/why2.png'?>" />
                    <h3>Collaborative team work</h3>
                    <p>Transparency through integration: by involving our clients in our workflows, we can offer them a
                        permanent insight into our progress, thereby increasing the quality of the results..</p>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri().'/img/why3.png'?>" />
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
