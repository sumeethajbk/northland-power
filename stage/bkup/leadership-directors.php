<?php
/*
Template Name: Leadership - Directors Page Template
*/
get_header();


$banner_desktop_image   = get_field('banner_desktop_image');
$banner_sub_heading     = get_field('banner_sub_heading');
$banner_heading         = get_field('banner_heading');
$banner_description     = get_field('banner_description');

if ($banner_desktop_image || $banner_sub_heading || $banner_heading || $banner_description) { ?>
  <section class="default-banner-section white-banner pos-relative">

    <?php if ($banner_desktop_image) { ?>
      <div class="brand-icon">
        <figure class="object-fit">
          <img src="<?php echo $banner_desktop_image['url']; ?>" alt="<?php echo $banner_desktop_image['alt']; ?>" title="<?php echo $banner_desktop_image['title']; ?>">
        </figure>
      </div>
    <?php } ?>

    <div class="container">
      <div class="default-banner-main flex">
        <div class="default-banner-text">
          <?php if ($banner_sub_heading) { ?>
            <span class="optional-text"><?php echo $banner_sub_heading; ?></span>
          <?php } ?>

          <?php if ($banner_heading) { ?>
            <h1><?php echo $banner_heading; ?></h1>
          <?php } ?>

          <?php if ($banner_description) { ?>
           <?php echo $banner_description; ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<!-- end of default banner -->


<section class="secwrap">
  <?php
  $args_executive_team = array(
    'post_type'      => 'our-team',
    'posts_per_page' => -1,
    'tax_query'      => array(
      array(
        'taxonomy' => 'team_categories',
        'field'    => 'slug',
        'terms'    => 'executive-management',
      ),
    ),
  );

  $query_executive_team = new WP_Query($args_executive_team);

  if ($query_executive_team->have_posts()) { ?>
    <section class="leaders-management-section">
      <div class="container">
        <div class="leaders-management-wrap">
          <div class="heading sec-heading">
            <div class="heading-lt">
              <div class="section-heading">Executive Management</div>
            </div>
          </div>
          <div class="leaders-management-grids flex">
            <?php while ($query_executive_team->have_posts()) {
              $query_executive_team->the_post();

              $our_team_profile_image  = get_field('our_team_profile_image');
              $our_team_position       = get_field('our_team_position');
              $our_team_description    = get_field('our_team_description');
              $our_team_linkedin_link  = get_field('our_team_linkedin_link');
              $our_team_email          = get_field('our_team_email');

              if ($our_team_profile_image || get_the_title() || $our_team_position || $our_team_description || $our_team_linkedin_link || $our_team_email) { ?>
                <div class="card">
                  <?php if ($our_team_profile_image) { ?>
                    <div class="imgbox">
                      <figure class="object-fit">
                        <img src="<?php echo $our_team_profile_image['url']; ?>" alt="<?php echo $our_team_profile_image['alt']; ?>" title="<?php echo $our_team_profile_image['title']; ?>">
                      </figure>
                      <div class="img-txt">
                        <?php if (get_the_title()) { ?>
                          <div class="h4"><?php echo get_the_title(); ?></div>
                        <?php } ?>
                        <?php if ($our_team_position) { ?>
                          <span class="em-pos"><?php echo $our_team_position; ?></span>
                        <?php } ?>
                      </div>
                    </div>
                  <?php } ?>

                  <div class="content">
                    <div class="content-inner">
                      <span class="leader-close hide-in-desktop"><em class="fa-sharp fa-thin fa-xmark-large"></em></span>

                      <?php if (get_the_title()) { ?>
                        <div class="h4"><?php echo get_the_title(); ?></div>
                      <?php } ?>

                      <?php if ($our_team_position) { ?>
                        <span class="em-pos"><?php echo $our_team_position; ?></span>
                      <?php } ?>

                      <?php if ($our_team_description || $our_team_linkedin_link || $our_team_email) { ?>
                        <div class="contentBox">
                          <?php if ($our_team_description) { ?>
                            <?php echo $our_team_description; ?>
                          <?php } ?>
                          <ul class="sci">
                            <?php if ($our_team_linkedin_link) { ?>
                              <li><a href="<?php echo $our_team_linkedin_link; ?>" target="_blank"><em class="fa fa-linkedin" aria-hidden="true"></em><span>LinkedIn</span></a></li>
                            <?php } ?>
                            <?php if ($our_team_email) { ?>
                              <li><a href="mailto:<?php echo $our_team_email; ?>"><em class="fa fa-envelope" aria-hidden="true"></em><span>Email</span></a></li>
                            <?php } ?>
                          </ul>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php }
            wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <!-- end of leaders-management section -->

  <?php
$args_board_directors = array(
  'post_type'      => 'our-team',
  'posts_per_page' => -1,
  'tax_query'      => array(
    array(
      'taxonomy' => 'team_categories',
      'field'    => 'slug',
      'terms'    => 'board-of-directors', 
    ),
  ),
);

$query_board_directors = new WP_Query($args_board_directors);

if ($query_board_directors->have_posts()) { ?>
  <section class="bod-section">
    <div class="container">
      <div class="leaders-management-wrap">
        <div class="heading sec-heading">
          <div class="heading-lt">
            <div class="section-heading">Board of Directors</div>
          </div>
        </div>
        <div class="leaders-management-grids flex">
          <?php while ($query_board_directors->have_posts()) {
            $query_board_directors->the_post();

            $bod_profile_image  = get_field('our_team_profile_image');
            $bod_position       = get_field('our_team_position');
            $bod_description    = get_field('our_team_description');
            $bod_linkedin_link  = get_field('our_team_linkedin_link');
            $bod_email          = get_field('our_team_email');

            if ($bod_profile_image || get_the_title() || $bod_position || $bod_description || $bod_linkedin_link || $bod_email) { ?>
              <div class="card">
                <?php if ($bod_profile_image) { ?>
                  <div class="imgbox">
                    <figure class="object-fit">
                      <img src="<?php echo $bod_profile_image['url']; ?>" alt="<?php echo $bod_profile_image['alt']; ?>" title="<?php echo $bod_profile_image['title']; ?>">
                    </figure>
                    <div class="img-txt">
                      <?php if (get_the_title()) { ?>
                        <div class="h4"><?php echo get_the_title(); ?></div>
                      <?php } ?>
                      <?php if ($bod_position) { ?>
                        <span class="em-pos"><?php echo $bod_position; ?></span>
                      <?php } ?>
                    </div>
                  </div>
                <?php } ?>

                <div class="content">
                  <div class="content-inner">
                    <span class="leader-close hide-in-desktop"><em class="fa-sharp fa-thin fa-xmark-large"></em></span>
                    
                    <?php if (get_the_title()) { ?>
                      <div class="h4"><?php echo get_the_title(); ?></div>
                    <?php } ?>
                    
                    <?php if ($bod_position) { ?>
                      <span class="em-pos"><?php echo $bod_position; ?></span>
                    <?php } ?>
                    
                    <?php if ($bod_description || $bod_linkedin_link || $bod_email) { ?>
                      <div class="contentBox">
                        <?php if ($bod_description) { ?>
                         <?php echo $bod_description; ?>
                        <?php } ?>
                        <ul class="sci">
                          <?php if ($bod_linkedin_link) { ?>
                            <li><a href="<?php echo $bod_linkedin_link; ?>" target="_blank"><em class="fa fa-linkedin" aria-hidden="true"></em><span>LinkedIn</span></a></li>
                          <?php } ?>
                          <?php if ($bod_email) { ?>
                            <li><a href="mailto:<?php echo $bod_email; ?>"><em class="fa fa-envelope" aria-hidden="true"></em><span>Email</span></a></li>
                          <?php } ?>
                        </ul>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

  <!-- end of bod section -->

  <?php
$args_senior_leadership = array(
  'post_type'      => 'our-team',
  'posts_per_page' => -1,
  'tax_query'      => array(
    array(
      'taxonomy' => 'team_categories',
      'field'    => 'slug',
      'terms'    => 'senior-leadership-team', 
    ),
  ),
);

$query_senior_leadership = new WP_Query($args_senior_leadership);

if ($query_senior_leadership->have_posts()) { ?>
  <section class="team-section">
    <div class="container">
      <div class="teams-wrap">
        <div class="heading sec-heading">
          <div class="heading-lt">
            <div class="section-heading">Senior Leadership Team</div>
          </div>
          <div class="heading-rt">
            <div class="post-count">
              <?php 
              $senior_link = get_field('senior_leadership_optional_link', 'option'); 
              if ($senior_link) { ?>
                <a href="<?php echo $senior_link; ?>" class="link-trail">Optional Link</a>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="team-grids flex">
          <?php while ($query_senior_leadership->have_posts()) {
            $query_senior_leadership->the_post();

            $sl_image = get_field('our_team_profile_image');
            $sl_position = get_field('our_team_position');
            $sl_email = get_field('our_team_email');
            ?>
            
            <?php if ($sl_image || get_the_title() || $sl_position || $sl_email) { ?>
              <div class="team-member">
                <?php if ($sl_image) { ?>
                  <div class="team-img-wrapper">
                    <figure class="object-fit">
                      <img src="<?php echo $sl_image['url']; ?>" alt="<?php echo $sl_image['alt']; ?>" title="<?php echo $sl_image['title']; ?>">
                    </figure>
                  </div>
                <?php } ?>

                <div class="team-info">
                  <?php if (get_the_title()) { ?>
                    <div class="h5"><?php echo get_the_title(); ?></div>
                  <?php } ?>
                  
                  <?php if ($sl_position || $sl_email) { ?>
                    <div class="team-details">
                      <?php if ($sl_position) { ?>
                        <span class="team-role"><?php echo $sl_position; ?></span>
                      <?php } ?>
                      <?php if ($sl_email) { ?>
                        <span class="team-email"><a href="mailto:<?php echo $sl_email; ?>"><?php echo $sl_email; ?></a></span>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
          <?php } wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

  <!-- end of team section -->
  <?php
$parent_term = get_term_by('slug', 'other-members', 'team_categories'); 
if ($parent_term) {
  $sub_terms = get_terms(array(
    'taxonomy'   => 'team_categories',
    'parent'     => $parent_term->term_id,
    'hide_empty' => false,
    'orderby'    => 'term_order',
    'order'      => 'ASC',
  ));

  if (!empty($sub_terms)) { ?>
    <section class="groups-main">
      <div class="container">
        <div class="groups-wrap">
          <div class="heading sec-heading">
            <div class="heading-lt">
              <div class="section-heading"><?php echo $parent_term->name; ?></div>
            </div>
            <div class="heading-rt">
              <div class="post-count">
                <?php 
                $other_members_link = get_field('other_members_optional_link', 'option'); 
                if ($other_members_link) { ?>
                  <a href="<?php echo $other_members_link; ?>" class="link-trail">Optional Link</a>
                <?php } ?>
              </div>
            </div>
          </div>

          <div class="groups flex">
            <?php foreach ($sub_terms as $sub_term) {
              $color = get_field('select_text_color', 'team_categories_' . $sub_term->term_id);

              if (empty($color)) {
                $color = 'var(--green-dark)';
              }

              $args_group = array(
                'post_type'      => 'our-team',
                'posts_per_page' => -1,
                'tax_query'      => array(
                  array(
                    'taxonomy' => 'team_categories',
                    'field'    => 'term_id',
                    'terms'    => $sub_term->term_id,
                  ),
                ),
              );
              $query_group = new WP_Query($args_group);

              if ($query_group->have_posts()) { ?>
                <div class="group-single">
                  <div class="h5" style="color: <?php echo $color; ?>;"><?php echo $sub_term->name; ?></div>
                  <ul>
                    <?php while ($query_group->have_posts()) {
                      $query_group->the_post(); ?>
                      <li><?php echo get_the_title(); ?></li>
                    <?php } ?>
                  </ul>
                </div>
              <?php }
              wp_reset_postdata();
            } ?>
          </div>
        </div>
      </div>
    </section>
  <?php }
} ?>


</section>
<?php $leading_with_purpose_desktop_image = get_field('leading_with_purpose_desktop_image');
$leading_with_purpose_mobile_image = get_field('leading_with_purpose_mobile_image');
$leading_with_purpose_background_color = get_field('leading_with_purpose_background_color');
$leading_with_purpose_image_text = get_field('leading_with_purpose_image_text');
$leading_with_purpose_graph_svg = get_field('leading_with_purpose_graph_svg');
$leading_with_purpose_sub_heading = get_field('leading_with_purpose_sub_heading');
$leading_with_purpose_heading = get_field('leading_with_purpose_heading');
$leading_with_purpose_button_text_one = get_field('leading_with_purpose_button_text_one');
$leading_with_purpose_button_link_one = get_field('leading_with_purpose_button_link_one');
$leading_with_purpose_button_text_two = get_field('leading_with_purpose_button_text_two');
$leading_with_purpose_button_link_two = get_field('leading_with_purpose_button_link_two');
if($leading_with_purpose_desktop_image!='' || $leading_with_purpose_mobile_image!='' || $leading_with_purpose_image_text!='' || $leading_with_purpose_sub_heading!='' || $leading_with_purpose_heading!='' || $leading_with_purpose_button_text_one!='' || $leading_with_purpose_button_link_one!='' || $leading_with_purpose_button_text_two!='' || $leading_with_purpose_button_link_two!=''){
?>
<section class="cta-module pos-relative cta-reverse" style="background:  <?php echo $leading_with_purpose_background_color; ?>">
    <?php if($leading_with_purpose_desktop_image!='' || $leading_with_purpose_mobile_image!=''){ ?>
    <div class="cta-overlay pos-absolute" style="background:  <?php echo $leading_with_purpose_background_color; ?>">&nbsp;</div>
    <div class="cta-bg">
      <picture class="object-fit">
        <source srcset="<?=$leading_with_purpose_desktop_image['url']?>" media="(min-width:768px)">
        <img src="<?=$leading_with_purpose_mobile_image['url']?>" alt="<?=$leading_with_purpose_desktop_image['alt']?>" title="<?=$leading_with_purpose_desktop_image['alt']?>">
      </picture>
    </div>
    <?php } ?>
    
    <?php if($leading_with_purpose_image_text!='' || $leading_with_purpose_sub_heading!='' || $leading_with_purpose_heading!='' || $leading_with_purpose_button_text_one!='' || $leading_with_purpose_button_link_one!='' || $leading_with_purpose_button_text_two!='' || $leading_with_purpose_button_link_two!=''){ ?>
    <div class="container-lg">
      <div class="container">
        <div class="cta-main flex">
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
                <a href="<?=$leading_with_purpose_button_link_one?>" class="button btn-white" style="color: var(--purple);"><?=$leading_with_purpose_button_text_one?></a>
              <?php } ?>
              <?php if($leading_with_purpose_button_text_two!='' && $leading_with_purpose_button_link_two!=''){ ?>
                <a href="<?=$leading_with_purpose_button_link_two?>" class="button outline-btn"><?=$leading_with_purpose_button_text_two?></a>
              <?php } ?>
            </div>
            <?php } ?>
          </div>
          
          <?php if($leading_with_purpose_image_text!='' || $leading_with_purpose_graph_svg=''){ ?>
          <div class="graph-icon-wrap">
            <div class="graph-bg" style="background: var(--blue);"></div>
            <div class="graph-icon-main">
              <div class="graph-icon">
              <?=$leading_with_purpose_graph_svg?>
          </div>
              <p><?=$leading_with_purpose_image_text?></p>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?>
</section>
<?php }


newsletter_signup_section();

get_footer();
