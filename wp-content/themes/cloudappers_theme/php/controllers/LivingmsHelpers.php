<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 3/30/2017
 * Time: 2:59 PM
 */
class LivingmsHelpers
{
	public static function getRegistrationCodes()
	{
		$registrationCodesPods = queries::getAllPods('registration_code', ['name']);
		$registrationCodes = [];
		foreach ($registrationCodesPods as $code) {
			$registrationCodes [] = $code['name'];
		}
		return $registrationCodes;
	}

	public static function getSideBar()
	{
		$template = '';
		$sideBarShortCode = '';
		$pageName = wp_getPostSlug();

		switch ($pageName) {
			case ($pageName == 'sms-erinnerungsservice'):
				$sideBarShortCode = ' [vc_column]
 
 									[vc_row_inner][vc_column_inner ]
                                  [vc_single_image image="5422" img_size="" alignment="center" image_hovers="false"]
                                  [vc_column_text]
                                                <p class="log-info">Das MS Service Programm, das nur einen Mittelpunkt hat: Sie!</p>
                                                [/vc_column_text][/vc_column_inner][/vc_row_inner]
                                       
                                       [vc_row_inner][vc_column_inner css=".vc_custom_1493106742745{margin-bottom: 20px !important;}"][vc_single_image image="8304" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/bestellservice" el_class="rebistar-image"][ultimate_heading main_heading="Bestellservice"]Erhalten Sie regelmäßig Infomaterialien und Therapiezubehör
                                       </br> 
                                        [dt_button el_class="sidebar-more" link="/bestellservice"]mehr erfahren[/dt_button]
                                        [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                       
                                       [vc_row_inner][vc_column_inner][vc_single_image image="8305" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/kostenlose-hotline" el_class="rebistar-image"][ultimate_heading main_heading="Kostenlose Hotline"]Sie haben Fragen? Wir helfen Ihnen gerne weiter!
                                       </br> 
                                        [dt_button el_class="sidebar-more" link="/kostenlose-hotline"]mehr erfahren[/dt_button]
                                        [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                       
                                       [vc_row_inner][vc_column_inner][vc_single_image image="8306" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/ms-dialog" el_class="rebistar-image"][ultimate_heading main_heading="MSdialog"]Ein neuer Weg, die MS-Therapie gemeinsam zu managen
                                       </br>
                                        [dt_button el_class="sidebar-more" link="/ms-dialog"]mehr erfahren[/dt_button]
                                        [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                       
                                       [/vc_column]';
				break;
			case ($pageName == 'bestellservice'):

				$sideBarShortCode = '[vc_column]

			[vc_row_inner][vc_column_inner ]
                                  [vc_single_image image="5422" img_size="" alignment="center" image_hovers="false"]
                                  [vc_column_text]
                                                <p class="log-info">Das MS Service Programm, das nur einen Mittelpunkt hat: Sie!</p>
                                                [/vc_column_text][/vc_column_inner][/vc_row_inner]
                                                
                                       [vc_row_inner][vc_column_inner css=".vc_custom_1493106742745{margin-bottom: 20px !important;}"][vc_single_image image="8294" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/sms-erinnerungsservice" el_class="rebistar-image"][ultimate_heading main_heading="SMS-Erinnerungsservice"]Wir erinnern Sie an ausgewählten Tagen direkt per SMS
                                       </br>
                                       [dt_button el_class="sidebar-more" link="/sms-erinnerungsservice"]mehr erfahren[/dt_button]
                                       [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                       
                                       [vc_row_inner][vc_column_inner][vc_single_image image="8305" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/kostenlose-hotline" el_class="rebistar-image"][ultimate_heading main_heading="Kostenlose Hotline"]Sie haben Fragen? Wir helfen Ihnen gerne weiter!
                                       </br> [dt_button el_class="sidebar-more" link="/kostenlose-hotline"]mehr erfahren[/dt_button] 
                                       [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                       
                                       [vc_row_inner][vc_column_inner][vc_single_image image="8306" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/ms-dialog" el_class="rebistar-image"][ultimate_heading main_heading="MSdialog"]Ein neuer Weg, die MS-Therapie gemeinsam zu managen
                                       </br> [dt_button el_class="sidebar-more" link="/ms-dialog"]mehr erfahren[/dt_button]
                                        [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                       
                                       [/vc_column]';
				break;
			case ($pageName == 'kostenlose-hotline'):

				$sideBarShortCode = '[vc_column]

			[vc_row_inner][vc_column_inner ]
                                  [vc_single_image image="5422" img_size="" alignment="center" image_hovers="false"]
                                  [vc_column_text]
                                                <p class="log-info">Das MS Service Programm, das nur einen Mittelpunkt hat: Sie!</p>
                                                [/vc_column_text][/vc_column_inner][/vc_row_inner]
                                                
                                       [vc_row_inner][vc_column_inner css=".vc_custom_1493106742745{margin-bottom: 20px !important;}"][vc_single_image image="8294" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/sms-erinnerungsservice" el_class="rebistar-image"][ultimate_heading main_heading="SMS-Erinnerungsservice"]Wir erinnern Sie an ausgewählten Tagen direkt per SMS
                                       </br>[dt_button el_class="sidebar-more" link="/sms-erinnerungsservice"]mehr erfahren[/dt_button]
                                        [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                       
                                       [vc_row_inner][vc_column_inner css=".vc_custom_1493106742745{margin-bottom: 20px !important;}"][vc_single_image image="8304" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/bestellservice" el_class="rebistar-image"][ultimate_heading main_heading="Bestellservice"]Erhalten Sie regelmäßig Infomaterialien und Therapiezubehör
                                       </br>  [dt_button el_class="sidebar-more" link="/bestellservice"]mehr erfahren[/dt_button]
                                       [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                                                             
                                       [vc_row_inner][vc_column_inner][vc_single_image image="8306" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/ms-dialog" el_class="rebistar-image"][ultimate_heading main_heading="MSdialog"]Ein neuer Weg, die MS-Therapie gemeinsam zu managen
                                       </br> [dt_button el_class="sidebar-more" link="/ms-dialog"]mehr erfahren[/dt_button] [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                       
                                       [/vc_column]';
				break;
			case ($pageName == 'ms-dialog'):

				$sideBarShortCode = '[vc_column]

			[vc_row_inner][vc_column_inner ]
                                  [vc_single_image image="5422" img_size="" alignment="center" image_hovers="false"]
                                  [vc_column_text]
                                                <p class="log-info">Das MS Service Programm, das nur einen Mittelpunkt hat: Sie!</p>
                                                [/vc_column_text][/vc_column_inner][/vc_row_inner]
                                                
                                       [vc_row_inner][vc_column_inner css=".vc_custom_1493106742745{margin-bottom: 20px !important;}"][vc_single_image image="8294" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/sms-erinnerungsservice" el_class="rebistar-image"][ultimate_heading main_heading="SMS-Erinnerungsservice"]Wir erinnern Sie an ausgewählten Tagen direkt per SMS
                                       </br>[dt_button el_class="sidebar-more" link="/sms-erinnerungsservice"]mehr erfahren[/dt_button]
                                       [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                       
                                       [vc_row_inner][vc_column_inner css=".vc_custom_1493106742745{margin-bottom: 20px !important;}"][vc_single_image image="8304" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/bestellservice" el_class="rebistar-image"][ultimate_heading main_heading="Bestellservice"]Erhalten Sie regelmäßig Infomaterialien und Therapiezubehör
                                       </br>  [dt_button el_class="sidebar-more" link="/bestellservice"]mehr erfahren[/dt_button]
                                       [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                       
                                       [vc_row_inner][vc_column_inner][vc_single_image image="8305" img_size="300 x 220" alignment="center" onclick="custom_link" lazy_loading="true" link="/kostenlose-hotline" el_class="rebistar-image"][ultimate_heading main_heading="Kostenlose Hotline"]Sie haben Fragen? Wir helfen Ihnen gerne weiter!
                                       </br>[dt_button el_class="sidebar-more" link="/kostenlose-hotline"]mehr erfahren[/dt_button] 
                                       [/ultimate_heading][/vc_column_inner][/vc_row_inner]
                                    
                                       
                                       [/vc_column]';
				break;
		}

		$template = '<div id="sidbare-sms">' .do_shortcode($sideBarShortCode). '</div>';
		return $template;
	}
}