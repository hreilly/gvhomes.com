<?php

//////////////////////////////////////////////////////////////////
// Dynamic Form shortcode
//////////////////////////////////////////////////////////////////

// Last touch - 01/03/19 - Hannah Reilly

// This shortcode is designed to place a modal ActiveCampaign form called by a button that can be changed dependent on placement. When the form is triggered, it fills two hidden fields with the current URI and the referring URL. It is integrated with ActiveCampaign automations to send custom notifications with the provided information and segment users to a web inquiry list, as well as applying a tag. This shortcode also depends on a SASS file and JS file. The SASS has been compiled to the main theme CSS and a link to the script is placed in the footer. If you only plan to use the shortcode on a few pages, you can remove the script from the footer and uncomment the script link at the end of the form in the shortcode.

// Changing the styling for a particular integration is as easy as identifying the segment you want to alter and changing the CSS. You can also change some content in the form, as long as you don't alter IDs or other information required to communicate with ActiveCampaign. Feel free to edit the styling, but avoid touching the Javascript.

function custom_ac_form_func( $atts ) {
	
	// Attributes - Defaults to 'post-banner'
	$a = shortcode_atts( array(
		'type' 	  => 'post-banner',
		'display' => 'lightbox',
	), $atts );

	// VARS

	// Get the title of the page/post
	$pagename = get_the_title();
	// Get the current URI
	$pageuri = $_SERVER['REQUEST_URI'];
	// Get the previous page from a user's history
	$referrer = $_SERVER['HTTP_REFERER'];
	// Inline form title
	$form_title = 'Have a question for sales?';
	// ActiveCampaign form
	$form12 = '<form method="POST" action="https://granvillehomes.activehosted.com/proc.php" id="_form_12_" class="_form _form_12 _inline-form  _dark" novalidate>
			<input type="hidden" name="u" value="12" />
			<input type="hidden" name="f" value="12" />
			<input type="hidden" name="s" />
			<input type="hidden" name="c" value="0" />
			<input type="hidden" name="m" value="0" />
			<input type="hidden" name="act" value="sub" />
			<input type="hidden" name="v" value="2" />
			<div class="_form-content">
			<div class="_form_element _x85408846 _full_width _clear" >
				<div class="_form-title">'
				 . $form_title . 
				'</div>
			</div>
			<div class="page-divider-gradient"></div>
			<div class="_form_element _x87547384 _full_width _clear" >
				<div class="_html-code">
				<p>
					We can help you with information about plans, communities, or anything else.
				</p>
				</div>
			</div>
			<div class="_form_element _x05349138 _full_width " >
				<label class="_form-label">
				Full Name
				</label>
				<div class="_field-wrapper">
				<input type="text" name="fullname" placeholder="Type your name" />
				</div>
			</div>
			<div class="_form_element _x32304360 _full_width " >
				<label class="_form-label">
				Email*
				</label>
				<div class="_field-wrapper">
				<input type="text" name="email" placeholder="Type your email" required/>
				</div>
			</div>
			<div class="_form_element _x61506501 _full_width " >
				<label class="_form-label">
				Phone (Opt.)
				</label>
				<div class="_field-wrapper">
				<input type="text" name="phone" placeholder="Type your phone number" />
				</div>
			</div>
			<div class="_form_element _field18 _full_width " >
				<label class="_form-label">
				How can we help you?
				</label>
				<div class="_field-wrapper">
				<textarea name="field[18]" placeholder="" style="height: 91px;" ></textarea>
				</div>
			</div>
			<div class="_form_element _field20 _full_width " style="display: none;">
				<label class="_form-label">
				Current Page
				</label>
				<div class="_field-wrapper">
				<input type="text" name="field[20]" value="' . $pageuri . '" placeholder="" />
				</div>
			</div>
			<div class="_form_element _field21 _full_width " style="display: none;">
				<label class="_form-label">
				Referrer
				</label>
				<div class="_field-wrapper">
				<input type="text" name="field[21]" value="' . $referrer . '" placeholder="" />
				</div>
			</div>
			<div class="_form_element _x46612259 _full_width ">
				<label class="_form-label">
				</label>
				<div class="g-recaptcha" data-sitekey="6LcwIw8TAAAAACP1ysM08EhCgzd6q5JAOUR1a0Go">
				</div>
			</div>
			<div class="_button-wrapper _full_width">
				<button id="_form_12_submit" class="subtle-button _submit" type="submit">
				Send to Sales
				</button>
			</div>
			<div class="_clear-element">
			</div>
			</div>
			<div class="_form-thank-you" style="display:none;">
			</div>
			</form>
			<!-- Link to JS File -->
			<script src="/wp-content/themes/understrap/js/ac-inquiry-form-12.js"></script>';
	
	
		// Displays a button or banner that renders the form in a lightbox.
		if ( esc_attr($a['display']) == 'lightbox' ) {
		
			// This is the default type	
			if ( esc_attr($a['type']) == 'post-banner' ) {
			
				$content .= '<div class="footer-cta-background" style="background-color: #ffffff;">';
					$content .= '<div class="footer-cta-content" style="background-color: #ffffff;">';
						// Banner style - shows on individual floor plan pages
						if ( get_post_type() == 'floorplans' ) {
							$content .= '<div class="footer-cta-text">Talk to someone who knows the <span style="font-weight: 700;">' . $pagename . '</span> inside and out.';
								$content .= '<div class="page-divider-narrow" style="margin-top: 10px;"></div>';
									$content .= '<div class="large-button-wrapper">';
										$content .= '<a href="#" data-featherlight="#ac-inquiry-form-12" data-featherlight-persist="true" class="subtle-button gold-button">Contact an Agent</a>';
									$content .= '</div>';
								$content .= '</div>';
							$content .= '</div>';
						} 
						// Banner style - shows on child community pages
						elseif ( get_post_type() == 'communities' ) {
							$content .= '<div class="footer-cta-text">Anything you want to know about <span style="font-weight: 700;">' . $pagename . '</span>?';
								$content .= '<div class="page-divider-narrow"></div>';
									$content .= '<div class="large-button-wrapper">';
										$content .= '<a href="#" data-featherlight="#ac-inquiry-form-12" data-featherlight-persist="true" class="subtle-button gold-button">Contact an Agent</a>';
									$content .= '</div>';
								$content .= '</div>';
							$content .= '</div>';
						} 
						// Banner style - generic format that doesn't call any variables
						else {
							$content .= '<div class="footer-cta-text">Let us help with <span style="font-weight: 700;">your questions</span>.';
								$content .= '<div class="page-divider-narrow"></div>';
									$content .= '<div class="large-button-wrapper">';
										$content .= '<a href="#" data-featherlight="#ac-inquiry-form-12" data-featherlight-persist="true" class="subtle-button gold-button">Contact an Agent</a>';
									$content .= '</div>';
								$content .= '</div>';
							$content .= '</div>';
						}
					$content .= '</div>';
				$content .= '</div>';
			} 
			// Footer button style
			elseif ( esc_attr($a['type']) == 'footer' ) {
				
				$content .= '<br>';
				$content .= '<a href="#" data-featherlight="#ac-inquiry-form-12" data-featherlight-persist="true" class="subtle-button" style="color: #ffffff;">Contact an Agent</a>';

			} 
			// Contingency for undefined type value
			else {
				
				$content .= 'This is not a valid type for the customACform shortcode. Currently, "post-banner" and "footer" are the only supported types.';
			}
			// Append the form to the page in a hidden div
				$content .= '<div style="display:none;">';
					$content .= '<div id="ac-inquiry-form-12">';	
						$content .= $form12;
					$content .= '</div>';
				$content .= '</div>';
		} 
		// Will display the form content inline
		elseif ( esc_attr($a['display']) == 'inline' ) {
			
			$content .= '<div style="background-image: linear-gradient(#eeeeee, #ffffff);">';
				$content .= $form12;
			$content .= '</div>';

		} 
		// Handles errors for unsupported display values
		else {

			$content .= '<p>This display value is not currently supported by customACform.</p>';

		}

	return $content;

}
add_shortcode( 'customACform', 'custom_ac_form_func' );

?>