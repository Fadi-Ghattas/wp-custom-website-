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
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  hidden-xs">
                    <div class="copyright">
                        <a href="<?php echo home_url(); ?>">
                            <embed src="<?php echo esc_url(get_template_directory_uri() . '/img/CA-full-logo@3x.svg'); ?>">
<!--                            <img src="--><?php //echo esc_url(get_template_directory_uri() . '/img/CA-full-logo.png'); ?><!--">-->
                        </a>
                    </div>
                    <div class="footer-menu">
                        <a href="<?php echo esc_url(home_url('let-us')); ?>">LET US</a>
                        <a href="<?php echo esc_url(home_url('show-you')); ?>">SHOW YOU</a>
                        <a href="<?php echo esc_url(home_url('what-we-can-do')); ?>">WHAT WE CAN DO</a>
                        <a href="<?php echo esc_url(home_url('for-you')); ?>">FOR YOU</a>
                    </div>
                    <div class="copyright hidden-xs copyrightdesk">
                        <p>© 2008-<?php echo date('Y'); ?> cloudappers. all rights reserved</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  hidden-xs address-ca">
                <!--<img src="--><?php //echo get_stylesheet_directory_uri() . '/img/blue-CA-icon@3x.png' ?><!--"/>-->
                    <div class="details">
                        <p class="address-details"><?php echo $setting['settings_address_text']; ?></p>
                        <p class="open-time">Open Sun to Thurs.<br> 10am  until 6pm</p>
                        <a href="tel:<?php echo $setting['settings_mobile_number']; ?>"><p class="phone"><?php echo $setting['settings_mobile_number']; ?></p></a>
                    <!--<a href="tel:--><?php //echo $setting['settings_tel_number']; ?><!--"><p class="mobile">--><?php //echo $setting['settings_tel_number']; ?><!--</p></a>-->
                    </div>
                    <div class="social">
                        <ul>
                            <li><a target="_blank" href="https://twitter.com/cloudappers">Twitter</a></li>
                            <li><a target="_blank" href="https://www.facebook.com/CloudAppers/">Facebook</a></li>
                            <li><a target="_blank" href="https://www.instagram.com/cloudappers/">Instagram</a></li>
                            <li><a target="_blank" href="https://www.behance.net/cloudappers/">Behance</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mob hidden-lg hidden-md">
                    <div class="nav-social">
                        <div class="copyright">
                            <embed src="<?php echo esc_url(get_template_directory_uri() . '/img/CA-full-logo@3x.svg'); ?>">
<!--                            <img src="--><?php //echo esc_url(get_template_directory_uri() . '/img/CA-full-logo.png'); ?><!--">-->
                            <p>© 2008-2017 CloudAppers. All Rights Reserved</p>
                        </div>
                        <div class="social">
                            <a class="facebook" href="#"></a>
                            <a class="twitter" href="#"></a>
                            <a class="instagram" href="#"></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php } ?>

<?php
if (is_home() || in_array(basename(get_page_template()), ['home.php','contact-us.php','about.php'])) {
    $jobsLocations = JobLocation::viewAll();
    $jobsSalariesRanges = JobSalaryRange::viewAll();
    ?>
<div id="JobModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2>Now hiring</h2>
                <h3>Uncle Sam may want you<!--<span id="applied-position"></span>-->, but so do we</h3>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <form method="post" action="" enctype="multipart/form-data">

                            <input id="cv_state" type="hidden" value=""/>
                            <input id="applied_position" type="hidden" value=""/>

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
                                    <?php foreach ($jobsLocations as $jobLocations) { ?>
                                        <option value="<?php echo $jobLocations['id']; ?>"><?php echo $jobLocations['post_title']; ?></option>
                                    <?php } ?>
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
                                <input id="expected_salary" name="expected_salary" type="text"
                                       class="form-control input-md"/>
<!--                                <select id="expected_salary" name="expected_salary" class="form-control">-->
<!--                                    <option value=""></option>-->
<!--                                    --><?php //foreach ($jobsSalariesRanges as $ranges) { ?>
<!--                                        <option value="--><?php //echo $ranges['post_title']; ?><!--">--><?php //echo $ranges['post_title']; ?><!--</option>-->
<!--                                    --><?php //} ?>
<!--                                </select>-->
                            </div>

                            <!-- File Button -->
                            <div class="form-group col-lg-12 up-cv">
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
<!--                                <textarea class="form-control"  id="cv_info_one" name="cv_info_one" ></textarea>-->
                                <input id="cv_info_one" name="cv_info_one" type="text" class="form-control input-md"/>
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
                <button type="button" class="close mob" data-dismiss="modal">&times;</button>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="map-details"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php } ?>
</div>

</div>
</body>
</html>