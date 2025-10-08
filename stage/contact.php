<?php
/*Template Name: Contact Page Template
*/
get_header(); ?>

<main id="mainContent">
<?php
//help
$contact_sub_heading = get_field('contact_sub_heading');
$contact_heading = get_field('contact_heading');
$contact_description = get_field('contact_description');

$investors_relation_heading = get_field('investors_relation_heading');
$investors_relation_address = get_field('investors_relation_address');
$investors_relation_phone_text = get_field('investors_relation_phone_text');
$investors_relation_phone_number = get_field('investors_relation_phone_number');
$investors_relation_email = get_field('investors_relation_email');

$whistleblower_hotline_heading = get_field('whistleblower_hotline_heading');
$first_phone_number = get_field('first_phone_number');
$place_one = get_field('place_one');
$second_phone_number = get_field('second_phone_number'); 
$place_two = get_field('place_two'); 
$contact_link_text = get_field('contact_link_text'); 
$contact_link = get_field('contact_link');



$contact_by_division_heading = get_field('contact_by_division_heading'); 
//$division_enquiries_and_locations_repeater = get_field('division_enquiries_and_locations_repeater'); 



$contact_by_location_heading = get_field('contact_by_location_heading');
//$division_locations_repeater = get_field('division_locations_repeater');

if($contact_sub_heading!='' || $contact_heading!='' || $contact_description!='' || $investors_relation_heading!='' || $investors_relation_address!='' || $investors_relation_phone_text!='' || $investors_relation_phone_number!='' || $investors_relation_email!='' || $whistleblower_hotline_heading!='' || $first_phone_number!='' || $place_one!='' || $second_phone_number!='' || $place_two!='' || $contact_link_text!='' || $contact_link!='' || $contact_by_division_heading!='' || have_rows('division_enquiries_and_locations_repeater') || $contact_by_location_heading!='' || have_rows('division_locations_repeater')){
?>
<section class="contact-section">
  <div class="container">
    <div class="contact-main flex pos-relative">
        <?php if($contact_sub_heading!='' || $contact_heading!='' || $contact_description!='' || $investors_relation_heading!='' || $investors_relation_address!='' || $investors_relation_phone_text!='' || $investors_relation_phone_number!='' || $investors_relation_email!='' || $whistleblower_hotline_heading!='' || $first_phone_number!='' || $place_one!='' || $second_phone_number!='' || $place_two!='' || $contact_link_text!='' || $contact_link!=''){ ?>
      <div class="contact-lt" data-js-animation="fade-in-up">
        <?php if($contact_sub_heading!='' || $contact_heading!='' || $contact_description!=''){ ?>    
        <div class="contact-desc">
          <?php if($contact_sub_heading!=''){ ?>  
          <span class="optional-text"><?=$contact_sub_heading?></span>
          <?php } ?>
          <?php if($contact_heading!=''){ ?>
          <h1><?=$contact_heading?></h1>
          <?php } ?>
          <?php if($contact_description!=''){ echo $contact_description; } ?>
        </div>
         <?php } ?>   
         <?php if($investors_relation_heading!='' || $investors_relation_address!='' || $investors_relation_phone_text!='' || $investors_relation_phone_number!='' || $investors_relation_email!='' || $whistleblower_hotline_heading!='' || $first_phone_number!='' || $place_one!='' || $second_phone_number!='' || $place_two!='' || $contact_link_text!='' || $contact_link!=''){ ?>
        <div class="contact-address-lists flex">
            <?php if($investors_relation_heading!='' || $investors_relation_address!='' || $investors_relation_phone_text!='' || $investors_relation_phone_number!='' || $investors_relation_email!=''){ ?>
          <div class="contact-address-item">
            <?php if($investors_relation_heading!=''){ ?>
            <h2 class="h5"><?=$investors_relation_heading?></h2>
            <?php } ?>
            <?php if($investors_relation_address!=''){ ?>
            <p><?=$investors_relation_address?></p>
            <?php } ?>
            <?php if($investors_relation_phone_text!='' || $investors_relation_phone_number!='' || $investors_relation_email!=''){ ?>
            <ul>
                <?php if($investors_relation_phone_text!='' && $investors_relation_phone_number!=''){ ?>
                    <li><a href="tel:<?=$investors_relation_phone_number?>"><?=$investors_relation_phone_text?></a></li>
                <?php } ?>
                <?php if($investors_relation_email!=''){ ?>
                    <li><a href="mailto:<?=$investors_relation_email?>"><?=$investors_relation_email?></a></li>
                <?php } ?>
            </ul>
            <?php } ?>
          </div>
          <?php } ?>
          <?php if($whistleblower_hotline_heading!='' || $first_phone_number!='' || $place_one!='' || $second_phone_number!='' || $place_two!='' || $contact_link_text!='' || $contact_link!=''){ ?>
          <div class="contact-address-item">
            <?php if($whistleblower_hotline_heading!=''){ ?>
            <h2 class="h5"><?=$whistleblower_hotline_heading?></h2>
            <?php } ?>
            <?php if($first_phone_number!='' || $place_one!='' || $second_phone_number!='' || $place_two!=''){ ?>
            <ul>
              <?php if($first_phone_number!='' && $place_one!=''){ ?>  
              <li><a href="tel:<?=$first_phone_number?>"><?=$first_phone_number?> (<?=$place_one?>)</a></li>
              <?php } ?>
              <?php if($second_phone_number!='' || $place_two!=''){ ?>
              <li><a href="tel:<?=$second_phone_number?>"><?=$second_phone_number?> (<?=$place_two?>)</a></li>
              <?php } ?>
            </ul>
            <?php } ?>
            <?php if($contact_link_text!='' && $contact_link!=''){ ?>
            <a href="<?=$contact_link?>" class="btn-link flex"><i class="fa-regular fa-arrow-right-long"></i>
             <span><?=$contact_link_text?></span>
            </a>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
      </div>
      <?php } ?>
      <?php if($contact_by_division_heading!='' || have_rows('division_enquiries_and_locations_repeater') || $contact_by_location_heading!='' || have_rows('division_locations_repeater')){ ?>          
      <div class="contact-rt" data-js-animation="fade-in">
        <div class="tabs" id="demoTabs">
          <!-- Tab list with ARIA roles for accessibility -->
          <ul class="tab-list flex" role="tablist" aria-label="Demo Tabs">
            <?php if($contact_by_division_heading!=''){ ?>
            <li>
              <span class="tab" role="tab" id="tab-1" aria-controls="panel-1" aria-selected="true" tabindex="0"><?=$contact_by_division_heading?></span>
            </li>
            <?php } ?>
            <?php if($contact_by_location_heading!=''){ ?>
            <li>
              <span class="tab" role="tab" id="tab-2" aria-controls="panel-2" aria-selected="false" tabindex="-1"><?=$contact_by_location_heading?></span>
            </li>
            <?php } ?>
          </ul>
          <!-- Panels -->
           <?php if(have_rows('division_enquiries_and_locations_repeater')){ ?>
          <div id="panel-1" class="panel" role="tabpanel" aria-labelledby="tab-1">
            <div class="accordion-main">
                <?php   
                while( have_rows('division_enquiries_and_locations_repeater') ) : the_row();
                $enquiries_and_locations_repeater_address_or_content = get_sub_field('enquiries_and_locations_repeater_address_or_content');
                $enquiries_and_locations_repeater_heading = get_sub_field('enquiries_and_locations_repeater_heading');
                $enquiries_and_locations_repeater_location_name = get_sub_field('enquiries_and_locations_repeater_location_name');
                $enquiries_and_locations_repeater_address = get_sub_field('enquiries_and_locations_repeater_address');
                $enquiries_and_locations_repeater_phone_number = get_sub_field('enquiries_and_locations_repeater_phone_number');
                $enquiries_and_locations_repeater_email = get_sub_field('enquiries_and_locations_repeater_email');
                $enquiries_and_locations_repeater_content = get_sub_field('enquiries_and_locations_repeater_content');                
                if($enquiries_and_locations_repeater_heading!='' || $enquiries_and_locations_repeater_location_name!='' || $enquiries_and_locations_repeater_address!='' || $enquiries_and_locations_repeater_phone_number!='' || $enquiries_and_locations_repeater_email!='' || $enquiries_and_locations_repeater_content!=''){                                             
                ?>
              <div class="accordion">
                <div class="accordion-item"> 
                    <?php if($enquiries_and_locations_repeater_heading!=''){ ?>
                    <a href="#" class="accordion-heading"><span class="title"><?=$enquiries_and_locations_repeater_heading?></span> </a>
                    <?php } ?>
                    <?php  if($enquiries_and_locations_repeater_address_or_content=='content' && $enquiries_and_locations_repeater_content!='' ) { ?>
                    <div class="content">
                        <?=$enquiries_and_locations_repeater_content?>
                    </div>
                    <?php 

                  } elseif($enquiries_and_locations_repeater_address_or_content=='address' || $enquiries_and_locations_repeater_location_name!='' || $enquiries_and_locations_repeater_address!='' || $enquiries_and_locations_repeater_phone_number!='' || $enquiries_and_locations_repeater_email!=''){ ?>
                  <div class="content">
                      <div class="accordion-contact-details flex">
                        <?php if($enquiries_and_locations_repeater_location_name!='' || $enquiries_and_locations_repeater_address!=''){ ?>
                        <div class="contact-detail-item">
                          <?php if($enquiries_and_locations_repeater_location_name!=''){ ?>
                          <h2 class="h5"><?=$enquiries_and_locations_repeater_location_name?></h2>
                          <?php } ?>
                          <?php if($enquiries_and_locations_repeater_address!=''){ ?>
                          <p><?=$enquiries_and_locations_repeater_address?></p>
                          <?php } ?>
                        </div>
                        <?php } ?>
                        <?php if($enquiries_and_locations_repeater_phone_number!='' || $enquiries_and_locations_repeater_email!=''){ ?>    
                        <div class="contact-detail-item">
                          <ul>
                            <?php if($enquiries_and_locations_repeater_phone_number!=''){ ?>
                            <li><a href="tel:<?=$enquiries_and_locations_repeater_phone_number?>"><?=$enquiries_and_locations_repeater_phone_number?></a></li>
                            <?php } ?>
                            <?php if($enquiries_and_locations_repeater_email!=''){ ?>
                            <li><a href="mailto:<?=$enquiries_and_locations_repeater_email?>"><?=$enquiries_and_locations_repeater_email?></a></li>
                            <?php } ?>
                          </ul>
                        </div>
                        <?php } ?>
                      </div>
                  </div>
                  <?php  } ?>

                </div>
              </div>
              <?php } endwhile; ?>
              <!-- end of accordion -->
            </div>
          </div>
          <?php } ?>
          <?php if(have_rows('division_locations_repeater')){ ?>
          <div id="panel-2" class="panel hidden" role="tabpanel" aria-labelledby="tab-2" tabindex="0">
            <div class="accordion-main">
              <?php   
                while( have_rows('division_locations_repeater') ) : the_row();
                $locations_repeater_address_or_content = get_sub_field('locations_repeater_address_or_content');
                $locations_repeater_heading = get_sub_field('locations_repeater_heading');
                $locations_repeater_location_name = get_sub_field('locations_repeater_location_name');
                $locations_repeater_address = get_sub_field('locations_repeater_address');
                $locations_repeater_phone_number = get_sub_field('locations_repeater_phone_number');
                $locations_repeater_email = get_sub_field('locations_repeater_email');
                $locations_repeater_content = get_sub_field('locations_repeater_content');
                if($locations_repeater_heading!='' || $locations_repeater_location_name!='' || $locations_repeater_address!='' || $locations_repeater_phone_number!='' || $locations_repeater_email!=''){                                             
              
              ?>
                <div class="accordion">
                <div class="accordion-item"> 
                    <?php if($locations_repeater_heading!=''){ ?>
                    <a href="#" class="accordion-heading"><span class="title"><?=$locations_repeater_heading?></span> </a>
                    <?php } ?>
                <?php 
                if($locations_repeater_address_or_content=='content' && $locations_repeater_content!=''){
                    echo '<div class="content">'.$locations_repeater_content.'</div>';
                }elseif($locations_repeater_address_or_content=='address' || $locations_repeater_location_name!='' || $locations_repeater_address!='' || $locations_repeater_phone_number!='' || $locations_repeater_email!=''){
                ?>
                    <div class="content">
                      <div class="accordion-contact-details flex">
                        <?php if($locations_repeater_location_name!='' || $locations_repeater_address!=''){ ?>
                        <div class="contact-detail-item">
                          <?php if($locations_repeater_location_name!=''){ ?>
                          <h2 class="h5"><?=$locations_repeater_location_name?></h2>
                          <?php } ?>
                          <?php if($locations_repeater_address!=''){ ?>
                          <p><?=$locations_repeater_address?></p>
                          <?php } ?>
                        </div>
                        <?php } ?>
                        <?php if($locations_repeater_phone_number!='' || $locations_repeater_email!=''){ ?>
                        <div class="contact-detail-item">
                          <ul>
                            <?php if($locations_repeater_phone_number!=''){ ?> 
                            <li><a href="tel:<?=$locations_repeater_phone_number?>"><?=$locations_repeater_phone_number?></a></li>
                            <?php } ?>
                            <?php if($locations_repeater_email!=''){ ?>
                            <li><a href="mailto:<?=$locations_repeater_email?>"><?=$locations_repeater_email?></a></li>
                            <?php } ?>
                          </ul>
                        </div>
                        <?php } ?>
                      </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <?php } endwhile; ?>
              <!-- end of accordion -->

            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
      <div class="contact-bg pos-absolute">
        <figure role="none" class="object-fit"> 
          <img src="<?=get_template_directory_uri()?>/dist/images/logo-shape-white.svg" alt="Contact Background">
        </figure>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<section class="signup-module">
  <div class="background-bg">
    <picture class="object-fit">
      <source srcset="https://northlandpower.kinsta.cloud/html/images/newsletter-bg@2x.jpg" media="(min-width:768px)">
      <img src="https://northlandpower.kinsta.cloud/html/images/newsletter-bg-mob@2x.jpg" alt="Newsletter Background" title="Newsletter Background"> </picture>
  </div>
  <div class="container">
    <div class="signup-main">
      <div class="section-heading">Stay Connected</div>
      <div class="signup-wrap flex">
        <div class="signup-lt">
          <div class="news-icon">
            <figure role="none"> <img src="https://northlandpower.kinsta.cloud/html/images/icon-two.svg" alt="Newsletter Icon" title="Newsletter Icon"> </figure>
          </div>
          <div class="h4">Get the latest updates on clean energy and our global projects.</div>
        </div>
        <!-- end of signup lt -->
        <div class="signup-rt">
          <div class="signup-form">
            <div class="frm_forms  with_frm_style frm_style_formidable-style" id="frm_form_2_container" data-token="c678b0b74144a3e98d0179159de902a4">
              <form enctype="multipart/form-data" method="post" class="frm-show-form  frm_ajax_submit  frm_pro_form " id="form_newsletter-signup" data-token="c678b0b74144a3e98d0179159de902a4" style="overflow-x: visible;">
                <div class="frm_form_fields ">
                  <fieldset>
                    <div class="frm_fields_container">
                      <input type="hidden" name="frm_action" value="create">
                      <input type="hidden" name="form_id" value="2">
                      <input type="hidden" name="frm_hide_fields_2" id="frm_hide_fields_2" value="">
                      <input type="hidden" name="form_key" value="newsletter-signup">
                      <input type="hidden" name="item_meta[0]" value="">
                      <input type="hidden" id="frm_submit_entry_2" name="frm_submit_entry_2" value="af44715f4c">
                      <input type="hidden" name="_wp_http_referer" value="/">
                      <div id="frm_field_10_container" class="frm_form_field form-field frm_required_field frm_none_container frm_blank_field">
                        <label for="field_348y0" id="field_348y0_label" class="frm_primary_label">Enter your email address<span class="frm_required" aria-hidden="true">*</span> </label>
                        <input type="email" id="field_348y0" name="item_meta[10]" value="" autocomplete="email" placeholder="Enter your email address" data-reqmsg="Your email address cannot be blank." aria-required="true" data-invmsg="Your email address is invalid" aria-invalid="false">
                      </div>
                      <div id="frm_field_9_container" class="frm_form_field form-field  frm_submit-btn">
                        <div class="frm_submit frm_flex">
                          <button class="frm_button_submit frm_final_submit" type="submit" formnovalidate="formnovalidate">Submit</button>
                        </div>
                      </div>
                      <input type="hidden" name="item_key" value="">
                      <input name="frm_state" type="hidden" value="ENGCqwhtClm8dRqDbW8dVNrqeM2L8uEhoHAABA4JXDxZhmBFuou0CNeHRGdxkrJQ">
                    </div>
                  </fieldset>
                </div>
                <p style="display: none !important;" class="akismet-fields-container" data-prefix="ak_">
                  <label>Δ
                    <textarea name="ak_hp_textarea" cols="45" rows="8" maxlength="100"></textarea>
                  </label>
                  <input type="hidden" id="ak_js_1" name="ak_js" value="1757440441573">
                  <script>document.getElementById( "ak_js_1" ).setAttribute( "value", ( new Date() ).getTime() );</script></p>
              </form>
            </div>
            <div class="disclaimer">We respect your privacy. Unsubscribe anytime.</div>
          </div>
        </div>
        <!-- end of signup rt --> 
      </div>
      <!-- end of signup wrap --> 
    </div>
  </div>
</section>
<!-- end of signup --> 

  </main>
<?php get_footer(); ?>