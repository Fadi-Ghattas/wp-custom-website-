<!-- end main container -->

<?php

$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
$setting = acf_get_group_fields($setting->ID);
wp_footer();

?>

<?php if (!is_home()) { ?>
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="copyright">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/CA-full-logo.png'); ?>">
                        </a>
                        <p>© 2008-<?php echo date('Y'); ?> CloudAppers. All Rights Reserved</p>
                    </div>
                    <div class="footer-menu">
                        <a href="">Let Us</a>
                        <a href="">Show you</a>
                        <a href="">What we can do</a>
                        <a href="">For you</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 address">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/blue-CA-icon@3x.svg' ?>"/>
                    <div class="details">
                        <p class="address-details"><?php echo $setting['settings_address_text']; ?></p>
                        <p class="mob"><?php echo $setting['settings_mobile_number']; ?></p>
                        <p class="phone"><?php echo $setting['settings_tel_number']; ?></p>
                    </div>
                    <div class="social">
                        <ul>
                            <li><a href="">Twitter</a></li>
                            <li><a href="">Facebook</a></li>
                            <li><a href="">Instagram</a></li>
                            <li><a href="">Dribbble</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


<div id="JobModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2>Now hiring</h2>
                <h3>Uncle Sam may want you, but so do we</h3>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <form method="post" action="" enctype="multipart/form-data">
                            <!-- Text input-->
                            <div class="form-group col-lg-6">
                                <label class="control-label" for="full_name">Full Name</label>
                                <input id="full_name" name="full_name" type="text"
                                       class="form-control input-md"/>
                            </div>

                            <!-- Text input-->
                            <div class="form-group col-lg-6">
                                <label class="control-label" for="email">Email</label>
                                <input id="email" name="email" type="email"
                                       class="form-control input-md"/>
                            </div>

                            <!-- Text input-->
                            <div class="form-group col-lg-6">
                                <label class="control-label" for="phone">Phone</label>
                                <input id="phone" name="phone" type="text"
                                       class="form-control input-md"/>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group col-lg-6">
                                <label class="control-label" for="location">Locations</label>
                                <select id="location" name="location" class="form-control">
                                    <option value=""></option>
                                    <option value="Dubai">Dubai</option>
                                    <option value="Lebanon">Lebanon</option>
                                </select>
                            </div>

                            <!-- Text input-->
                            <div class="form-group col-lg-6">
                                <label class="control-label" for="years_of_experience">Years of Experience</label>
                                <input id="years_of_experience" name="years_of_experience" type="text"
                                       class="form-control input-md"/>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group col-lg-6">
                                <label class="control-label" for="expected_salary">Expected Salary
                                    <span>$</span></label>
                                <select id="expected_salary" name="expected_salary" class="form-control">
                                    <option value=""></option>
                                    <option value="100 - 200">100 - 200</option>
                                    <option value="200 - 300">200 - 300</option>
                                </select>
                            </div>

                            <!-- File Button -->
                            <div class="form-group col-lg-12">
                                <label class="control-label" for="cv_file">Upload CV</label>
                                <!--data-allowed-file-extensions='["docx", "doc", "ppt", "pdf"]'-->
                                <input id="cv_file" name="cv_file" type="file" class="file"
                                       data-show-preview="false"
                                       data-show-upload="false"/>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group col-lg-12">
                                <label class="control-label" for="cv_info_one">What do you do when you’re not
                                    working?</label>
                                <textarea class="form-control" id="cv_info_one" name="cv_info_one"></textarea>
                            </div>

                            <div class="form-group col-lg-12 captcha-container">
                                <div id="JobCaptcha"></div>
                            </div>

                            <div class="form-group col-lg-12 form-submit">
                                <button class="submit-btn c-btn" type="submit">TAKE ME IN</button>
                            </div>

                            <div class="form-group col-lg-12 form-message">
                                <p class="message"></p>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="map-popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="map-details"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>