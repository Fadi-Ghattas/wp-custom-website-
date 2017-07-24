
<?php

if (has_nav_menu('main_menu')) :
    $setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
    $setting = acf_get_group_fields($setting->ID);
    ?>

    <section class="top-menu">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-inverse" role="navigation">

                            <div class="navbar-header">
                                <a class="logo-mob hidden-lg hidden-md hidden-sm "
                                   href="<?php echo home_url(); ?>">
                                    <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() . '/img/white-ca-icon@3x.svg' ?>" alt="CloudAppers"/>
                                </a>
                                <a class="logo-desk hidden-xs" href="<?php echo home_url(); ?>">
                                    <embed class="hidden-md hidden-sm" src="<?php echo get_stylesheet_directory_uri() . '/img/CA-full-logo@3x.svg' ?>" alt="CloudAppers"/>
<!--                                    <img src="--><?php //echo get_stylesheet_directory_uri() . '/img/CA-full-logo.png' ?><!--" alt="CloudAppers"/>-->
                                    <embed class="img-float" src="<?php echo get_stylesheet_directory_uri() . '/img/blue-CA-icon.svg' ?>" alt="CloudAppers"/>
                                </a>

                                <button id="nav-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
                                    <!--                            <span class="sr-only">-->
                                    <?php //_e('Toggle navigation', 'devdmbootstrap3'); ?><!--</span>-->
                                    <!--                            <span class="icon-bar"></span>-->
                                    <!--                            <span class="icon-bar"></span>-->
                                    <!--                            <span class="icon-bar"></span>-->
                                    <span></span>
                                </button>
                            </div>

                            <?php
                            wp_nav_menu([
                                    'theme_location' => 'main_menu',
                                    'depth' => 2,
                                    'container' => 'div',
                                    'container_class' => 'collapse navbar-collapse navbar-1-collapse',
                                    'menu_class' => 'nav navbar-nav',
                                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                    'walker' => new wp_bootstrap_navwalker()]
                            );
                            ?>

                            <div class="nav-social">
                                <div class="copyright">
                                    <embed src="<?php echo get_stylesheet_directory_uri() . '/img/CA-full-logo@3x.svg' ?>" alt="CloudAppers"/>
<!--                                    <img src="--><?php //echo esc_url(get_template_directory_uri() . '/img/CA-full-logo.png'); ?><!--">-->
                                    <p>© 2008-<?php echo date('Y'); ?> CloudAppers. All Rights Reserved</p>
                                </div>
                                <div class="social">
                                    <a class="facebook" href="<?php echo esc_url($setting['facebook_link']); ?>"></a>
                                    <a class="twitter" href="<?php echo esc_url($setting['twitter_link']); ?>"></a>
                                    <a class="instagram" href="<?php echo esc_url($setting['instagram_link']); ?>"></a>
                                </div>
                            </div>

                        </nav>
                    </div>
                </div>
            </div>

        </div>

    </section>

<?php endif; ?>