<?php
/*
Template Name: Sustainability Page Template
*/
get_header(); ?>

<main id="mainContent">
<?php
//banner 
$banner_desktop_image = get_field('banner_desktop_image');
$banner_mobile_image = (get_field('banner_mobile_image'))?get_field('banner_mobile_image'):get_field('banner_desktop_image');
$banner_image_text = get_field('banner_image_text');
$flip_the_content_to_right_or_left = get_field('flip_the_content_to_right_or_left');
//$banner_graph_svg = get_field('banner_graph_svg');
$banner_sub_heading = get_field('banner_sub_heading');
$banner_heading = get_field('banner_heading');
$banner_description = get_field('banner_description');
$banner_button_text_one = get_field('banner_button_text_one');
$banner_button_link_one = get_field('banner_button_link_one');
$banner_button_text_two = get_field('banner_button_text_two');
$banner_button_link_two = get_field('banner_button_link_two');
if($banner_desktop_image!='' || $banner_mobile_image!='' || $banner_image_text!='' || $banner_sub_heading!='' || $banner_heading!='' || $banner_description!='' || $banner_button_text_one!='' || $banner_button_link_one!='' || $banner_button_text_two!='' || $banner_button_link_two!=''){

if($flip_the_content_to_right_or_left=='right'){
   $banner_text_align = 'text-reverse'; 
}?>
<section class="hero-banner-section pos-relative <?=$banner_text_align?>">
    <?php if($banner_desktop_image!='' || $banner_mobile_image!=''){ ?>
    <div class="background-bg pos-absolute">
        <picture class="object-fit">
            <source srcset="<?=$banner_desktop_image['url']?>" media="(min-width:768px)">
            <img src="<?=$banner_mobile_image['url']?>" alt="<?=$banner_desktop_image['alt']?>" title="<?=$banner_desktop_image['alt']?>"> 
        </picture>
    </div>
    <?php } ?>
    <?php if($banner_image_text!='' || $banner_sub_heading!='' || $banner_heading!='' || $banner_description!='' || $banner_button_text_one!='' || $banner_button_link_one!='' || $banner_button_text_two!='' || $banner_button_link_two!=''){ ?>
    <div class="container-lg">
        <div class="container">
            <div class="hero-banner-main">
                <?php if($banner_sub_heading!='' || $banner_heading!='' || $banner_description!='' || $banner_button_text_one!='' || $banner_button_link_one!='' || $banner_button_text_two!='' || $banner_button_link_two!=''){ ?>
                <div class="hero-banner-text">
                    <?php if($banner_sub_heading!=''){ ?>
                    <span class="optional-text"><?=$banner_sub_heading?></span>
                    <?php } ?>
                    <?php if($banner_heading!=''){ ?>
                    <h1><?=$banner_heading?></h1>
                    <?php } ?>
                    <?php if($banner_description){ echo $banner_description; } ?>
                    <?php if($banner_button_text_one!='' || $banner_button_link_one!='' || $banner_button_text_two!='' || $banner_button_link_two!=''){ ?>
                    <div class="banner-btn-wrap">
                        <?php if($banner_button_text_one!='' && $banner_button_link_one!=''){ ?> 
                        <a href="<?=$banner_button_link_one?>" class="button btn-white"  style="color: var(--green-dark);"><?=$banner_button_text_one?></a>
                        <?php } ?>
                        <?php if($banner_button_text_two!='' && $banner_button_link_two!=''){ ?>
                        <a href="<?=$banner_button_link_two?>" class="button outline-btn"><?=$banner_button_text_two?></a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                <?php if($banner_image_text!=''){ ?>
                <div class="banner-widget-wrap">
                <div class="banner-widget-bg" style="background: var(--orange-transparent);"></div>
                <div class="banner-widget-main">
                    <div class="banner-widget-icon"><!-- graph icon goes here --></div>
                    <p><?=$banner_image_text?></p>
                </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
</section>
<?php } ?>

<?php
//what we do
$what_we_do_background_logo  = get_field('what_we_do_background_logo');
$what_we_do_sub_heading  = get_field('what_we_do_sub_heading');
$what_we_do_heading  = get_field('what_we_do_heading');
if($what_we_do_background_logo!='' || $what_we_do_sub_heading!='' || $what_we_do_heading!=''){ 
?>
<section class="what-we-do-section">
    <div class="container">
        <div class="what-we-do-main flex">
            <?php if($what_we_do_sub_heading!='' || $what_we_do_heading!=''){  ?>
            <div class="what-we-do-text">
                <?php if($what_we_do_sub_heading!=''){ ?>
                <span class="optional-text"><?=$what_we_do_sub_heading?></span>
                <?php } ?>
                <?php if($what_we_do_heading!=''){ ?>
                <h2><?=$what_we_do_heading?></h2>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if($what_we_do_background_logo!=''){  ?>
            <div class="what-we-do-image">
                <figure class="object-fit">
                    <img src="<?=$what_we_do_background_logo['url']?>" alt="<?=$what_we_do_background_logo['alt']?>" title="<?=$what_we_do_background_logo['alt']?>">
                </figure>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
<!-- end of what we do section -->
 <?php
 //video
$video_image_or_video = get_field('video_image_or_video');
$video_desktop_image = get_field('video_desktop_image');
$video_mobile_image = get_field('video_mobile_image');
$video_poster_desktop_image = get_field('video_poster_desktop_image');
$video_poster_mobile_image = get_field('video_poster_mobile_image');
$video_platform = get_field('video_platform');
$video_yotube_id = get_field('video_yotube_id');
$video_vimeo_id = get_field('video_vimeo_id');
if($video_image_or_video!='' || $video_desktop_image!='' || $video_mobile_image!='' || $video_poster_desktop_image!='' || $video_poster_mobile_image!='' || $video_platform!='' || $video_yotube_id!='' || $video_vimeo_id!=''){

$final_desktop_url = '';
$final_mobile_url = '';
$video_url = '';
if($video_image_or_video=='video'){
$final_desktop_url = $video_poster_desktop_image;
$final_mobile_url = ($video_poster_mobile_image)? $video_poster_mobile_image : $video_poster_desktop_image;
if($video_platform=='youtube'){
    $video_url = 'https://www.youtube.com/watch?v='.$video_yotube_id;
    $video_class = 'youtube_popup_show';
}
if($video_platform=='vimeo'){
    $video_url = 'https://vimeo.com/'.$video_vimeo_id;
    $video_class = 'vimeo_popup_show';    
}

}
if($video_image_or_video=='image'){
$final_desktop_url = $video_desktop_image;
$final_mobile_url = ($video_mobile_image)? $video_mobile_image : $video_desktop_image;
}

?>
 <section class="media-big-section pos-relative">
    <div class="container">
        <div class="media-big-main">
            <?php if($final_desktop_url!='' || $final_mobile_url!='' || $video_yotube_id!='' || $video_vimeo_id!=''){ ?>            
            <div class="media-big-image pos-absolute">
                <picture class="object-fit">
                    <source srcset="<?=$final_desktop_url['url']?>" media="(min-width:768px)">
                    <img src="<?=$final_mobile_url['url']?>" alt="<?=$final_desktop_url['alt']?>" title="<?=$final_desktop_url['alt']?>">
                </picture>
                <?php if($video_image_or_video=='video' || $video_url!=''){ ?>
                <div class="play-btn-main flex flex-center"> 
                    <a class="play-btn flex popup-youtube flex-center <?=$video_class?>" href="<?=$video_url?>" tabindex="0"> 
                        <span class="play-btn-wrap"><img src="https://northlandpower.kinsta.cloud/html/images/play-green.svg" alt="Play" title="Play"></span> 
                    </a> 
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
 </section>
<?php } ?>
<!-- end of media big section -->

<?php
//Why smarter investors
$why_smarter_investors_background_logo = get_field('why_smarter_investors_background_logo');
$why_smarter_investors_sub_heading = get_field('why_smarter_investors_sub_heading');
$why_smarter_investors_heading = get_field('why_smarter_investors_heading');
$why_smarter_investors_description = get_field('why_smarter_investors_description');
$why_smarter_investors_button_text = get_field('why_smarter_investors_button_text');
$why_smarter_investors_button_link = get_field('why_smarter_investors_button_link');
if($why_smarter_investors_background_logo!='' || $why_smarter_investors_sub_heading!='' || $why_smarter_investors_heading!='' || $why_smarter_investors_description!='' || $why_smarter_investors_button_text!='' ||  $why_smarter_investors_button_link!=''){
?>
<section class="about-section">
    <div class="container">
        <div class="about-main flex pos-relative">
            <?php if($why_smarter_investors_sub_heading!='' || $why_smarter_investors_heading!='' || $why_smarter_investors_button_text!='' ||  $why_smarter_investors_button_link!=''){ ?>
            <div class="about-heading">
                <?php if($why_smarter_investors_sub_heading!=''){ ?>                
                <span class="optional-text"><?=$why_smarter_investors_sub_heading?></span>
                <?php } ?>
                <?php if($why_smarter_investors_heading!=''){ ?>
                <h2><?=$why_smarter_investors_heading?></h2>
                <?php } ?>
                <?php if($why_smarter_investors_button_text!='' &&  $why_smarter_investors_button_link!=''){ ?>
                <a href="<?=$why_smarter_investors_button_link?>" class="button"><?=$why_smarter_investors_button_text?></a>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if($why_smarter_investors_description!=''){ ?>
            <div class="about-text">
                <?=$why_smarter_investors_description?>
            </div>
            <?php } ?>
            <?php if($why_smarter_investors_background_logo!='') { ?>
            <div class="about-bg pos-absolute">
                <figure class="object-fit">
                    <img src="<?=$why_smarter_investors_background_logo['url']?>" alt="<?=$why_smarter_investors_background_logo['alt']?>" title="<?=$why_smarter_investors_background_logo['alt']?>">
                </figure>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
<!-- end of about section -->
<?php
//Statistics
if(have_rows('statistics_repeater')){ 
?>
<section class="stats-section">
    <div class="container-lg">
        <div class="stats-main flex" data-counter-main="counter-main">
            <?php 
              while( have_rows('statistics_repeater') ) : the_row(); 
              $statistics_repeater_icon = get_sub_field('statistics_repeater_icon');
              $statistics_color_picker = get_sub_field('statistics_color_picker');
              $statistics_repeater_before_number = get_sub_field('statistics_repeater_before_number');
              $statistics_repeater_number = get_sub_field('statistics_repeater_number');                                          
              $statistics_repeater_after_number = get_sub_field('statistics_repeater_after_number');
              $statistics_repeater_description = get_sub_field('statistics_repeater_description');
              if($statistics_repeater_icon!='' || $statistics_color_picker!='' || $statistics_repeater_before_number!='' || $statistics_repeater_number!='' || $statistics_repeater_after_number!='' || $statistics_repeater_description!=''){                                              
            ?>
            <div class="stats-item" style="background: <?=$statistics_color_picker?>;">
                <div class="stats-item-inner flex aligncenter">
                    <?php if($statistics_repeater_icon!=''){ ?>
                    <div class="stats-icon">
                        <figure class="object-fit">
                            <img src="<?=$statistics_repeater_icon['url']?>" alt="<?=$statistics_repeater_icon['alt']?>" title="<?=$statistics_repeater_icon['alt']?>">
                        </figure>
                    </div>
                    <?php } ?>
                    <?php if($statistics_repeater_before_number!='' || $statistics_repeater_number!='' || $statistics_repeater_after_number!='' || $statistics_repeater_description!=''){ ?>
                    <div class="stats-text">
                        <div class="counter-main flex flex-center">
                            <?php if($statistics_repeater_before_number!=''){ ?>
                            <span><?=$statistics_repeater_before_number?></span>
                            <?php } ?>
                            <?php if($statistics_repeater_number!=''){ ?>                            
                            <span class="counter" data-duration="2000" data-count-to="<?=$statistics_repeater_number?>" data-animate="counter"><?=$statistics_repeater_number?></span>
                            <?php } ?>
                            <?php if($statistics_repeater_after_number!=''){ ?>                            
                            <span><?=$statistics_repeater_after_number?></span>
                            <?php } ?>
                        </div>
                        <?php 
                            if($statistics_repeater_description!=''){ 
                                echo $statistics_repeater_description;
                            }
                        ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } endwhile; ?>
        </div>            
    </div>
</section>
<?php } ?>
<!-- end of stats section -->
<?php
//awards_and_recognition
$awards_and_recognition_heading = get_field('awards_and_recognition_heading'); 
$awards_and_recognition_description = get_field('awards_and_recognition_description'); 
//awards_and_recognition_logo
if($awards_and_recognition_heading!='' || $awards_and_recognition_description!='' || have_rows('awards_and_recognition_logo')){
?>

<section class="awards-section pos-relative">
  <div class="container">
    <div class="awards-main flex">
    <?php if($awards_and_recognition_heading!='' || $awards_and_recognition_description!=''){ ?>
      <div class="awards-heading">
        <?php  if($awards_and_recognition_heading){ ?>
        <h2><?=$awards_and_recognition_heading?></h2>
        <?php } ?>
        <?php if($awards_and_recognition_description){ echo $awards_and_recognition_description; } ?>
      </div>
      <?php } ?>
      <?php if(have_rows('awards_and_recognition_logo')){ ?>
      <div class="awards-lists flex">
        <?php while( have_rows('awards_and_recognition_logo') ) : the_row(); 
        $logo = get_sub_field('logo');
        if($logo){
         ?>
        <div class="awards-item">
          <figure class="object-fit">
            <img src="<?=$logo['url']?>" alt="<?=$logo['alt']?>" title="<?=$logo['alt']?>">
          </figure>
        </div>
        <?php } endwhile; ?>
        
        
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php } ?>

<?php
//CTA's

if(have_rows('cta_repeater_section')){
?>
<section class="repeater-section pos-relative repeater-light-bg">
  <div class="repeater-main">
    <?php
        while( have_rows('cta_repeater_section') ) : the_row(); 
        $repeater_section_background_image  = get_sub_field('repeater_section_background_image');
        $repeater_section_image  = get_sub_field('repeater_section_image');
        $repeater_section_sub_heading  = get_sub_field('repeater_section_sub_heading');
        $repeater_section_heading  = get_sub_field('repeater_section_heading');
        $repeater_section_description  = get_sub_field('repeater_section_description');
        $repeater_section_button_text  = get_sub_field('repeater_section_button_text');
        $repeater_section_button_link  = get_sub_field('repeater_section_button_link');
        if($repeater_section_background_image!='' || $repeater_section_image!='' || $repeater_section_sub_heading!='' || $repeater_section_heading!='' || $repeater_section_description!='' || $repeater_section_button_text!='' || $repeater_section_button_link!='' ){        
    ?>
    <div class="repeater-list">
      <div class="container">
        <?php if($repeater_section_background_image!=''){ ?>
        <div class="background-bg">
          <figure class="object-fit"> 
              <img src="<?=$repeater_section_background_image['url']?>" alt="<?=$repeater_section_background_image['alt']?>" title="<?=$repeater_section_background_image['alt']?>"> 
          </figure>
        </div><!-- end of background bg -->
        <?php } ?>
        <?php 
        if($repeater_section_image!='' || $repeater_section_sub_heading!='' || $repeater_section_heading!='' || $repeater_section_description!='' || $repeater_section_button_text!='' || $repeater_section_button_link!='' ){                
        ?>
        <div class="repeater-list-inner flex">
           <?php if($repeater_section_image!=''){ ?>
          <div class="repeater-img">
            <figure class="object-fit" role="none"> 
                <img src="<?=$repeater_section_image['url']?>" alt="<?=$repeater_section_image['alt']?>"> 
            </figure>
          </div>
          <?php } ?>
          <!-- end of repeater img-->
           <?php 
        if($repeater_section_sub_heading!='' || $repeater_section_heading!='' || $repeater_section_description!='' || $repeater_section_button_text!='' || $repeater_section_button_link!='' ){                
        ?>
          <div class="repeater-text">
            <?php if($repeater_section_sub_heading!=''){ ?> 
            <span class="optional-text"><?=$repeater_section_sub_heading?></span>
            <?php } ?>
            <?php if($repeater_section_heading!=''){ ?>
            <div class="h2"><?=$repeater_section_heading?></div>
            <?php } ?>
            <?php if($repeater_section_description!=''){
                echo $repeater_section_description;
            } ?>
            <?php if($repeater_section_button_text!='' || $repeater_section_button_link!=''){ ?>
            <div class="btn"> <a href="<?=$repeater_section_button_link?>" class="button"><?=$repeater_section_button_text?></a></div>
            <?php } ?>
          </div>
          <?php } ?>
          <!-- end of repeater text --> 
        </div>
        <?php } ?>
        <!-- end of repeater list inner --> 
      </div>
    </div>
    <?php } endwhile; ?>
    <!-- end of repeater list -->
        
  </div>
</section>
<?php } ?>
<!-- end of repeater section -->

<?php
//features
if(have_rows('statistics_repeater_one')){

?>
<section class="services-section">
    <div class="container-lg">
        <div class="services-main flex">
            <?php
                while( have_rows('statistics_repeater_one') ) : the_row(); 
                $statistics_repeater_icon = get_sub_field('statistics_repeater_icon');
                $statistics_color_picker = get_sub_field('statistics_color_picker');
                $statistics_repeater_before_number = get_sub_field('statistics_repeater_before_number');
                $statistics_repeater_number = get_sub_field('statistics_repeater_number');
                $statistics_repeater_after_number = get_sub_field('statistics_repeater_after_number');
                $statistics_repeater_description = get_sub_field('statistics_repeater_description');
                if($statistics_repeater_icon!='' || $statistics_color_picker!='' || $statistics_repeater_before_number!='' || $statistics_repeater_number!='' || $statistics_repeater_after_number!='' || $statistics_repeater_description!=''){
            ?>
            <div class="services-item" style="background: <?=$statistics_color_picker?>;">
                <div class="services-item-inner flex aligncenter">
                    <?php if($statistics_repeater_icon!=''){ ?>
                    <div class="services-icon">
                        <figure class="object-fit">
                            <img src="<?=$statistics_repeater_icon['url']?>" alt="<?=$statistics_repeater_icon['alt']?>" title="<?=$statistics_repeater_icon['alt']?>">
                        </figure>
                    </div>
                    <?php } ?>
                    <div class="services-text">
                        <?php if($statistics_repeater_number){ ?>
                        <h2 class="h5"><?=$statistics_repeater_number?></h2>
                        <?php } ?>
                        <?php  if($statistics_repeater_description) {
                            echo $statistics_repeater_description;
                        } ?>
                    </div>
                </div>
            </div>
            <?php } endwhile; ?>
            
            
            

        </div>            
    </div>
</section>
<?php } ?>
<!-- end of services section -->
<?php 
//case study
$case_studies_heading = get_field('case_studies_heading');
if($case_studies_heading!='' || have_rows('case_studies_repeater')){
?>
<section class="case-studies-section">
    <div class="container">
        <div class="case-studies-main">
            <?php if($case_studies_heading!=''){ ?>
            <div class="case-studies-heading">
                <h2 class="h3"><?=$case_studies_heading?></h2>
            </div>
            <?php } ?>
            <?php if(have_rows('case_studies_repeater')) { ?>
            <div class="case-studies-lists">
                <?php  
                while( have_rows('case_studies_repeater') ) : the_row();
                $case_studies_image = get_sub_field('case_studies_image');
                $case_studies_sub_heading = get_sub_field('case_studies_sub_heading');
                $case_studies_heading = get_sub_field('case_studies_heading');
                $case_studies_time_line_text = get_sub_field('case_studies_time_line_text');
                $case_studies_description = get_sub_field('case_studies_description');
                $case_studies_button_text = get_sub_field('case_studies_button_text');
                $case_studies_button_link = get_sub_field('case_studies_button_link');
                if($case_studies_image!='' || $case_studies_sub_heading!='' ||  $case_studies_heading!='' || $case_studies_time_line_text!='' || $case_studies_description!='' || $case_studies_button_text!='' || $case_studies_button_link!=''){                                  
                ?>
                <div class="case-studies-item">
                    <div class="case-studies-inner flex">
                        <?php if($case_studies_image!='' || $case_studies_time_line_text!=''){ ?>
                        <div class="case-studies-image pos-relative">
                            <?php if($case_studies_image!=''){ ?>
                            <figure class="case-studies-thumb object-fit">
                                <img src="<?=$case_studies_image['url']?>" alt="<?=$case_studies_image['alt']?>">
                            </figure>
                            <?php } ?>
                            <?php if($case_studies_time_line_text!=''){ ?>
                            <div class="graph-icon-wrap">
                              <div class="graph-bg" style="background: var(--green-dark-transparent);"></div>
                              <div class="graph-icon-main">
                                <div class="graph-icon"><!-- graph icon goes here --></div>
                                <p><?=$case_studies_time_line_text?></p>
                              </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php if($case_studies_sub_heading!='' ||  $case_studies_heading!='' ||  $case_studies_description!='' || $case_studies_button_text!='' || $case_studies_button_link!=''){ ?>
                        <div class="case-studies-text">
                            <?php if($case_studies_sub_heading!=''){ ?>
                            <span class="optional-text"><?=$case_studies_sub_heading?></span>
                            <?php } ?>
                            <?php if($case_studies_heading!=''){ ?>
                            <h2><?=$case_studies_heading?></h2>
                            <?php } ?>
                            <?php if($case_studies_description!=''){ echo $case_studies_description;  } ?>
                            <?php if($case_studies_button_text!='' && $case_studies_button_link!=''){ ?>
                            <a href="<?=$case_studies_button_link?>" class="button"><?=$case_studies_button_text?></a>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } endwhile; ?>
                
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
<!-- end of case studies section -->
<?php
//cta
$leading_with_purpose_desktop_image = get_field('leading_with_purpose_desktop_image');
$leading_with_purpose_mobile_image = (get_field('leading_with_purpose_mobile_image'))?get_field('leading_with_purpose_mobile_image'):get_field('leading_with_purpose_desktop_image');
$leading_with_purpose_image_text = get_field('leading_with_purpose_image_text');
$leading_with_purpose_sub_heading = get_field('leading_with_purpose_sub_heading');
$leading_with_purpose_heading = get_field('leading_with_purpose_heading');
$leading_with_purpose_button_text_one = get_field('leading_with_purpose_button_text_one');
$leading_with_purpose_button_link_one = get_field('leading_with_purpose_button_link_one');
$leading_with_purpose_button_text_two = get_field('leading_with_purpose_button_text_two');
$leading_with_purpose_button_link_two = get_field('leading_with_purpose_button_link_two');

if($leading_with_purpose_desktop_image!='' || $leading_with_purpose_mobile_image!='' || $leading_with_purpose_image_text!='' || $leading_with_purpose_sub_heading!='' || $leading_with_purpose_heading!='' || $leading_with_purpose_button_text_one!='' || $leading_with_purpose_button_link_one!='' || $leading_with_purpose_button_text_two!='' || $leading_with_purpose_button_link_two!=''){ 
?>
    <section class="cta-module pos-relative" style="background: var(--green-dark);">
    <?php if($leading_with_purpose_desktop_image!='' || $leading_with_purpose_mobile_image!=''){ ?>  
    <div class="cta-overlay pos-absolute" style="background: var(--green-dark);">&nbsp;</div>
      <div class="cta-bg">
        <picture class="object-fit">
          <source srcset="<?=$leading_with_purpose_desktop_image['url']?>" media="(min-width:768px)">
          <img src="<?=$leading_with_purpose_mobile_image['url']?>" alt="<?=$leading_with_purpose_desktop_image['alt']?>" title="<?=$leading_with_purpose_desktop_image['alt']?>"> </picture>
      </div>
      <?php } ?>
      <?php if($leading_with_purpose_image_text!='' || $leading_with_purpose_sub_heading!='' || $leading_with_purpose_heading!='' || $leading_with_purpose_button_text_one!='' || $leading_with_purpose_button_link_one!='' || $leading_with_purpose_button_text_two!='' || $leading_with_purpose_button_link_two!=''){ ?>
      <div class="container-lg">
        <div class="container">
          <div class="cta-main flex">
            <?php if($leading_with_purpose_sub_heading!='' || $leading_with_purpose_heading!='' || $leading_with_purpose_button_text_one!='' || $leading_with_purpose_button_link_one!='' || $leading_with_purpose_button_text_two!='' || $leading_with_purpose_button_link_two!=''){ ?>
            <div class="cta-text"> 
               <?php if($leading_with_purpose_sub_heading!=''){ ?> 
              <span class="optional-text"><?=$leading_with_purpose_sub_heading?></span>
              <?php } ?>
              <?php if($leading_with_purpose_heading!=''){ ?>
              <div class="h1"><?=$leading_with_purpose_heading?></div>
              <?php } ?>
              <?php if($leading_with_purpose_button_text_one!='' || $leading_with_purpose_button_link_one!='' || $leading_with_purpose_button_text_two!='' || $leading_with_purpose_button_link_two!=''){ ?>
              <div class="btn-wrap"> 
                <?php if($leading_with_purpose_button_text_one!='' && $leading_with_purpose_button_link_one!=''){ ?> 
                    <a href="<?=$leading_with_purpose_button_link_one?>" class="button btn-white"  style="color: var(--green-dark);"><?=$leading_with_purpose_button_text_one?></a>
                <?php } ?>
                <?php if($leading_with_purpose_button_text_two!='' || $leading_with_purpose_button_link_two!=''){ ?>
                    <a href="<?=$leading_with_purpose_button_link_two?>" class="button outline-btn"><?=$leading_with_purpose_button_text_two?></a>
                <?php } ?>
              </div>
              <?php } ?>
              <!-- end of btn wrap --> 
            </div>
            <?php } ?>
            <?php if($leading_with_purpose_image_text!=''){ ?>
            <div class="graph-icon-wrap">
              <div class="graph-bg" style="background: var(--orange-transparent);"></div>
              <div class="graph-icon-main">
                <div class="graph-icon"><!-- graph icon goes here --></div>
                <p><?=$leading_with_purpose_image_text?></p>
              </div>
            </div>
            <?php } ?>
            <!-- end of graph icon wrap --> 
          </div>
        </div>
      </div>
      <?php } ?>
    </section>
    <?php } ?>
    <!-- end of cta module -->

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