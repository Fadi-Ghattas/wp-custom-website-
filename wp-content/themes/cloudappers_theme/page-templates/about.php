<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/11/17
 * Time: 1:14 PM
 * Template Name: AboutPage
 */
$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);

$pageOptions = acf_get_group_fields(get_the_ID());
if (intval($pageOptions['let_us_page_clients_how_many_to_show']))
    $clients = Client::viewAll(['page' => 'home', 'limit' => intval($pageOptions['let_us_page_clients_how_many_to_show'])]);

$timesLines = TimeLine::viewAll();
$sweetWords = SweetWord::viewAll();

get_header();
get_template_part('template-part', 'topnav');

?>

<?php $services_page_header_image = (!empty($pageOptions['let_us_page_header_image']['url']) ? esc_url($pageOptions['let_us_page_header_image']['url']) : esc_url(get_stylesheet_directory_uri() . '/img/about-header.jpg')); ?>
    <section class="ca-page-header parallax-window" data-parallax="scroll" data-bleed="50"
             data-image-src="<?php echo $services_page_header_image; ?>">
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
    <div class="main-wrapper">
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

<?php if (!empty($timesLines)) { ?>
    <section class="time">
        <h6><?php echo $pageOptions['let_us_page_time_line_title']; ?></h6>
    </section>
    <section class="history">
        <div class="history-pager container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="slider-nav">
                        <?php foreach ($timesLines as $year) { ?>
                            <li>
                                <a href="javascript:void(0)"><span><?php echo $year['timeline_year']; ?></span>
                                    <div class="pulse1"></div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

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

<?php if (!empty($pageOptions['let_us_page_process_image'])) { ?>
    <section class="process">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo $pageOptions['let_us_page_process_title']; ?></h1>
                    <div><?php echo $pageOptions['let_us_page_process_description']; ?></div>
                    <img src="<?php echo $pageOptions['let_us_page_process_image']['url']; ?> "/>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (!empty($pageOptions['let_us_page_why_cloudappers_reasons_blocks'])) { ?>
    <section class="why">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center main-title">
                    <h1><?php echo $pageOptions['let_us_page_why_cloudappers_title']; ?></h1>
                    <div><?php echo $pageOptions['let_us_page_why_cloudappers_subtitle']; ?></div>
                </div>

                <?php foreach ($pageOptions['let_us_page_why_cloudappers_reasons_blocks'] as $reason) { ?>
                    <div class="why-desc col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="why-img">
                            <img class="img-responsive"
                                 src="<?php echo esc_url($reason['why_cloudappers_reason_block_icon']['url']); ?>"/>
                        </div>
                        <h3><?php echo $reason['why_cloudappers_reason_block_title']; ?></h3>
                        <div><?php echo $reason['why_cloudappers_reason_block_description']; ?></div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
<?php } ?>

<?php if (!empty($clients) && intval($pageOptions['let_us_page_clients_how_many_to_show'])) { ?>
    <section class="clients">
        <div class="container">
            <div class="row">
                <div class="client-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <h6>Collaborations based on trust</h6>
                    </div>
                    <?php foreach ($clients as $client) { ?>
                        <a href="<?php echo esc_url($client['client_website_url']); ?>"
                           class="item  col-md-2 col-sm-3 col-xs-4">
                            <img class="" src="<?php echo esc_url($client['client_logo']['url']); ?>">
                        </a>
                    <?php } ?>
                </div>

            </div>
        </div>
        <div class="view-all"><a href="<?php echo home_url('clients'); ?>">VIEW ALL CLIENTS</a></div>
    </section>
<?php } ?>

<?php if (!empty($sweetWords)) { ?>
    <section class="words">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="words-slider">
                        <?php foreach ($sweetWords as $sweetWord) { ?>
                            <div class="slide">
                                <div class="img-slide">
                                    <img src="<?php echo esc_url($sweetWord['sweet_word_image']['url']); ?>"/>
                                </div>
                                <div class="info-slide">
                                    <h6><?php echo $sweetWord['post_title']; ?></h6>
                                    <div><?php echo $sweetWord['sweet_word']; ?></div>
                                    <h5><?php echo $sweetWord['sweet_word_by']; ?></h5>
                                    <h4><?php echo $sweetWord['sweet_word_by_info']; ?></h4>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
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
                    <a target="_blank" href="https://cloudappers.typeform.com/to/dUDCpe" class="c-btn">TELL US ABOUT YOUR PROJECT</a>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
