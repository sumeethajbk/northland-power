<?php
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
header("Permissions-Policy: 'camera=(), microphone=(), geolocation=()' always;");
add_filter('xmlrpc_enabled', '__return_false');
/** Disable REST API **/
// Filters for WP-API version 1.x
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
function zerowp_disable_rest_api($access)
{
    if (is_user_logged_in()) {
        return $access;
    }
    $errorMessage = 'REST API is disabled!';
    if (!is_wp_error($access)) {
        return new WP_Error(
            'rest_api_disabled',
            $errorMessage,
            [
                'status' => rest_authorization_required_code(),
            ]
        );
    }
    $access->add(
        'rest_api_disabled',
        $errorMessage,
        [
            'status' => rest_authorization_required_code(),
        ]
    );
    return $access;
}
add_filter('rest_authentication_errors', 'zerowp_disable_rest_api', 99);

if (!function_exists('northland_power_setup')) {

    function northland_power_setup()
    {

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');


        add_theme_support('title-tag');


        add_theme_support(
            'post-formats',
            array(
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            )
        );


        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1568, 9999);

        register_nav_menus(
            array(
                'primary' => esc_html__('Primary menu', 'northland-power'),
                'footer-one'  => __('Footer menu', 'northland-power'),
            )
        );

        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            )
        );
    }
}



add_action('after_setup_theme', 'northland_power_setup');

add_filter('big_image_size_threshold', '__return_false'); // avoid sclaed


function northland_power_scripts()
{
    $p_cache = rand(1020, 20201112);
    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/style.css', array(), $p_cache, 'all');
    //wp_enqueue_style('style-bundle', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), $p_cache, 'all');
    if (is_page_template('templates/our-history.php')) {
        wp_enqueue_style('style-our-history-page', get_stylesheet_directory_uri() . '/dist/css/our-history-page.css', array(), $p_cache, 'all');
    }
    if (is_page_template('templates/about.php')) {
        wp_enqueue_style('style-about-page', get_stylesheet_directory_uri() . '/dist/css/about-page.css', array(), $p_cache, 'all');
    }
    if (is_page_template('templates/sustainability.php')) {
        wp_enqueue_style('style-about-page', get_stylesheet_directory_uri() . '/dist/css/sustainability-page.css', array(), $p_cache, 'all');
    }
    if (is_page_template('templates/our-approach.php')) {
        wp_enqueue_style('style-about-page', get_stylesheet_directory_uri() . '/css/our-approach-page.css', array(), $p_cache, 'all');
    }
    if (is_page_template('templates/our-mission.php')) {
        wp_enqueue_style('style-our-mission-page', get_stylesheet_directory_uri() . '/css/our-mission-page.css', array(), $p_cache, 'all');
    }
    if (is_page_template('templates/contact.php')) {
        wp_enqueue_style('style-contact-page', get_stylesheet_directory_uri() . '/css/contact-page.css', array(), $p_cache, 'all');
    }
    if (is_page_template('templates/technologies-detail.php')) {
        wp_enqueue_style('style-technologies-details', get_stylesheet_directory_uri() . '/css/technologies-details.css', array(), $p_cache, 'all');
        wp_enqueue_style('style-animation', get_stylesheet_directory_uri() . '/css/animation.css', array(), $p_cache, 'all');
    }
    if (is_page_template('templates/policies-and-charters.php')) {
        wp_enqueue_style('style-policies', get_stylesheet_directory_uri() . '/css/policies.css', array(), $p_cache, 'all');
    }
    if (is_page_template('templates/site-profile.php')) {
        wp_enqueue_style('style-siteprofile', get_stylesheet_directory_uri() . '/css/siteprofile.css', array(), $p_cache, 'all');
    }
    if (basename(get_page_template()) === 'page.php') {
    wp_enqueue_style('style-default-page', get_stylesheet_directory_uri() . '/css/default-page.css', array(), $p_cache, 'all');
    wp_enqueue_style('style-magnific-popup', get_stylesheet_directory_uri() . '/dist/css/magnific-popup.css', array(), $p_cache, 'all');
    wp_enqueue_script('magnific-popup-min', get_template_directory_uri() . '/dist/js/magnific-popup.min.js', array('jquery'), '' . $p_cache . '', true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/dist/js/magnificpopup.js', array('jquery'), '' . $p_cache . '', true);
    }
    if (is_page_template('templates/leadership-directors.php')) {
        wp_enqueue_style('leadership-style', get_stylesheet_directory_uri() . '/css/leadership.css', array(), $p_cache, 'all');
    }
    if (is_category()) {
        wp_enqueue_style('newsroom-css', get_stylesheet_directory_uri() . '/css/newsroom.css', array(), $p_cache, 'all');
        wp_enqueue_script('load-more', get_template_directory_uri() . '/js/load-more.js', array('jquery'), '' . $p_cache . '', true);
    }
    if (is_singular('post')) {
        wp_enqueue_style('newsroom-post',  get_template_directory_uri() . '/css/newsroom-post.css', array(), $p_cache, 'all');
    }
    if (is_page_template('templates/home.php')) {
        wp_enqueue_style('style-home-page', get_stylesheet_directory_uri() . '/css//home.css', array(), $p_cache, 'all');
    }

    wp_enqueue_style('style-slick', get_stylesheet_directory_uri() . '/dist/css/slick.css', array(), $p_cache, 'all');
  



    wp_enqueue_script('jquery', get_template_directory_uri() . '/dist/js/jquery-3.7.1.min.js', array('jquery'), '' . $p_cache . '', true);
   

    wp_enqueue_script('slick.min', get_template_directory_uri() . '/dist/js/slick.min.js', array('jquery'), '' . $p_cache . '', true);
    //wp_enqueue_script('custom-slick', get_template_directory_uri() . '/dist/js/custom-slick.js', array('jquery'), '' . $p_cache . '', true);
    wp_enqueue_script('custom-slick', get_template_directory_uri() . '/dist/js/custom-slick.js', array('jquery'), filemtime(get_template_directory() . '/dist/js/custom-slick.js'), true);

    wp_enqueue_script('custom-script', get_template_directory_uri() . '/dist/js/custom-script.js', array('jquery'), '' . $p_cache . '', true);
    wp_enqueue_script('scrolly', get_template_directory_uri() . '/dist/js/scrolly.js', array('jquery'), '' . $p_cache . '', true);
    wp_enqueue_script('strategy', get_template_directory_uri() . '/js/strategy.js?=564200000', array('jquery'), '' . $p_cache . '', true);
    wp_enqueue_script('Counter', get_template_directory_uri() . '/dist/js/Counter.js', array('jquery'), '' . $p_cache . '', true);


   wp_enqueue_style('animation-style', get_stylesheet_directory_uri() . '/css/animation.css', array(), $p_cache, 'all');

   
    wp_enqueue_script('contact-tabs', get_template_directory_uri() . '/js/tabs.js', array('jquery'), '' . $p_cache . '', true);


    wp_enqueue_script('js-cdn-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array('jquery'), '' . $p_cache . '', true);
    wp_enqueue_script('js-cdn-scrollTrigger',  'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('jquery'), '' . $p_cache . '', true);
    wp_enqueue_script('js-cdn-isInViewport', 'https://cdn.jsdelivr.net/npm/is-in-viewport@3.0.4/lib/isInViewport.min.js', array('jquery'), '' . $p_cache . '', true);
    wp_enqueue_script('js-DrawSVGPlugin', get_template_directory_uri() . '/dist/js/DrawSVGPlugin.min.js', array('jquery'), '' . $p_cache . '', true);
	    wp_enqueue_script('js-custom-animation', get_template_directory_uri() . '/dist/js/custom-animation.js?v=11', array('jquery'), '' . $p_cache . '', true);
    wp_enqueue_script('js-animation', get_template_directory_uri() . '/dist/js/animation.js', array('jquery'), '' . $p_cache . '', true);

    wp_enqueue_script('js-gsap', get_template_directory_uri() . '/dist/js/gsap.js', array('jquery'), '' . $p_cache . '', true);
    

    if (is_page_template('templates/careers.php')) {
        wp_enqueue_style('career-style', get_stylesheet_directory_uri() . '/css/careers-page.css', array(), $p_cache, 'all');
    }






    ///html/
    // wp_enqueue_script('project-ajax', get_template_directory_uri() . '/dist/project-ajax.js', array('jquery'), null, true);
    // wp_localize_script('project-ajax', 'wp_ajax_object', array( 'ajax_url' => admin_url('admin-ajax.php'), 'nonce'    => wp_create_nonce('project_filter_nonce'), ));
}

add_action('wp_enqueue_scripts', 'northland_power_scripts');


add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php'); // Removes the 'Comments' menu
});

function my_mce_buttons_2($buttons)
{
    /**
     * Add in a core button that's disabled by default
     */
    $buttons[] = 'superscript';
    $buttons[] = 'subscript';
    return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(array(
        'title' => 'Header Options',
        'parent' => 'themes.php',
    ));
}

if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(array(
        'title' => 'Footer Options',
        'parent' => 'themes.php',
    ));
}


function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['vcf'] = 'text/vcard';
    $mimes['vcard'] = 'text/vcard';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// function featured_image_dimensions($content, $post_id, $thumbnail_id)
// {
//     if (in_array(get_post_type($post_id), array('project'))) {
//         $help_text = '<p>' . __('Width: 540px | Height: 801px') . '</p>';
//         return $help_text . $content;
//     }
//     return $content;
// }
// add_filter('admin_post_thumbnail_html', 'featured_image_dimensions', 10, 3);



add_filter('acf/fields/relationship/query/name=select_sub_technologies', 'acf_technologies_sub_pages', 10, 3);
function acf_technologies_sub_pages($args, $field, $post)
{
    $args['post_parent'] = 670;
    $args['post_status'] = 'publish';
    return $args;
}
function stayConnected($atts = array())
{
    ob_start();
?>
    <section class="signup-module">
        <div class="background-bg">
            <picture class="object-fit">
                <source srcset="https://northlandpower.kinsta.cloud/html/images/newsletter-bg@2x.jpg" media="(min-width:768px)">
                <img src="https://northlandpower.kinsta.cloud/html/images/newsletter-bg-mob@2x.jpg" alt="Newsletter Background" title="Newsletter Background">
            </picture>
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
                                        <script>
                                            document.getElementById("ak_js_1").setAttribute("value", (new Date()).getTime());
                                        </script>
                                    </p>
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
<?php
    return ob_get_clean();
}

//////////////////////////////////////shortcode start/////////////////////
//1 [image]
function shortcode_image($atts = array())
{
    ob_start(); ?>
    <?php
    $default_page_image  = get_field('default_page_image');
    if ($default_page_image != '') {
    ?>
        <div class="default-thumb fluid-width" data-js-animation="fade-in-up">
            <div class="fluid-width-wrapper">
                <figure class="object-fit" role="none">
                    <img src="<?= $default_page_image['url'] ?>" alt="<?= $default_page_image['alt'] ?>" title="<?= $default_page_image['alt'] ?>">
                </figure>
            </div>
        </div>
    <?php } ?>
    <?php
    return ob_get_clean();
}
add_shortcode('image', 'shortcode_image');

//2 [cta-module]
function shortcode_cta_module($atts = array())
{
    ob_start();
    $cta_module_icon = get_field('cta_module_icon');
    $cta_module_desktop_image = get_field('cta_module_desktop_image');
    $cta_module_mobile_image = (get_field('cta_module_mobile_image')) ? get_field('cta_module_mobile_image') : get_field('cta_module_desktop_image');
    $cta_module_sub_heading = get_field('cta_module_sub_heading');
    $cta_module_heading = get_field('cta_module_heading');
    $cta_module_button_text_one = get_field('cta_module_button_text_one');
    $cta_module_button_link_one = get_field('cta_module_button_link_one');
    $cta_module_button_text_two = get_field('cta_module_button_text_two');
    $cta_module_button_link_two = get_field('cta_module_button_link_two');



    if ($cta_module_icon != '' || $cta_module_desktop_image != '' || $cta_module_mobile_image != '' || $cta_module_sub_heading != '' || $cta_module_heading != '' || $cta_module_button_text_one != '' || $cta_module_button_link_one != '' || $cta_module_button_text_two != '' || $cta_module_button_link_two != '') {
    ?>
        <section class="micro-cta-module pos-relative fluid-width" data-js-animation="fade-in-up">
            <div class="fluid-width-wrapper">
                <div class="container">
                    <div class="micro-cta-main flex">
                        <?php if ($cta_module_desktop_image != '' || $cta_module_mobile_image != '') { ?>
                            <div class="micro-cta-bg">
                                <picture class="object-fit">
                                    <source srcset="<?= $cta_module_desktop_image['url'] ?>" media="(min-width:768px)">
                                    <img src="<?= $cta_module_mobile_image['url'] ?>" alt="<?= $cta_module_desktop_image['alt'] ?>" title="<?= $cta_module_desktop_image['alt'] ?>">
                                </picture>
                            </div>
                        <?php } ?>
                        <?php if ($cta_module_sub_heading != '' || $cta_module_heading != '' || $cta_module_button_text_one != '' || $cta_module_button_link_one != '' || $cta_module_button_text_two != '' || $cta_module_button_link_two != '') { ?>
                            <div class="micro-cta-text">
                                <?php if ($cta_module_sub_heading != '') { ?>
                                    <span class="optional-text"><?= $cta_module_sub_heading ?></span>
                                <?php } ?>
                                <?php if ($cta_module_heading != '') { ?>
                                    <div class="h3"><?= $cta_module_heading ?></div>
                                <?php } ?>
                                <?php if ($cta_module_button_text_one != '' || $cta_module_button_link_one != '' || $cta_module_button_text_two != '' || $cta_module_button_link_two != '') { ?>
                                    <div class="btn-wrap">
                                        <?php if ($cta_module_button_text_one != '' && $cta_module_button_link_one != '') { ?>
                                            <a href="<?= $cta_module_button_link_one ?>" class="button btn-white"><?= $cta_module_button_text_one ?></a>
                                        <?php } ?>
                                        <?php if ($cta_module_button_text_two != '' && $cta_module_button_link_two != '') { ?>
                                            <a href="<?= $cta_module_button_link_two ?>" class="button outline-btn"><?= $cta_module_button_text_two ?></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <!-- end of btn wrap -->
                            </div>
                        <?php }
                        if ($cta_module_icon) { ?>
                            <div class="micro-icon">
                                <figure role="none">
                                    <img src="<?php echo $cta_module_icon['url']; ?>" alt="<?php echo $cta_module_icon['alt']; ?>">
                                </figure>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<?php
    return ob_get_clean();
}
add_shortcode('cta-module', 'shortcode_cta_module');
//3 [cta]
function shortcode_cta($atts = array())
{
    ob_start(); ?>
    <?php
    $ready_to_explore_desktop_image = get_field('ready_to_explore_desktop_image');
    $ready_to_explore_mobile_image = (get_field('ready_to_explore_mobile_image')) ? get_field('ready_to_explore_mobile_image') : get_field('ready_to_explore_desktop_image');
    $ready_to_explore_icon = get_field('ready_to_explore_icon');
    $ready_to_explore_heading = get_field('ready_to_explore_heading');
    $ready_to_explore_button_text = get_field('ready_to_explore_button_text');
    $ready_to_explore_button_link = get_field('ready_to_explore_button_link');
    if ($ready_to_explore_desktop_image != '' || $ready_to_explore_mobile_image != '' || $ready_to_explore_icon != '' || $ready_to_explore_heading != '' || $ready_to_explore_button_text != '' || $ready_to_explore_button_link != '') {
    ?>
        <div class="register-module fluid-width">
            <div class="fluid-width-wrapper">
                <div class="container">
                    <div class="register-module-inner flex" style="background: var(--green-dark);">
                        <?php if ($ready_to_explore_desktop_image != '' || $ready_to_explore_mobile_image != '') { ?>
                            <div class="register-overlay pos-absolute" style="background: var(--green-dark);">&nbsp;</div>
                            <div class="register-bg">
                                <picture class="object-fit">
                                    <source srcset="<?= $ready_to_explore_desktop_image['url'] ?>" media="(min-width:768px)">
                                    <img src="<?= $ready_to_explore_mobile_image['url'] ?>" alt="<?= $ready_to_explore_desktop_image['alt'] ?>" title="<?= $ready_to_explore_desktop_image['alt'] ?>">
                                </picture>
                            </div>
                        <?php } ?>
                        <?php if ($ready_to_explore_icon != '' || $ready_to_explore_heading != '') { ?>
                            <div class="register-lt">
                                <?php if ($ready_to_explore_icon != '') { ?>
                                    <div class="register-icon">
                                        <figure role="none"> <img src="<?= $ready_to_explore_icon['url'] ?>" alt="<?= $ready_to_explore_icon['alt'] ?>" title="<?= $ready_to_explore_icon['alt'] ?>"> </figure>
                                    </div>
                                <?php } ?>
                                <?php if ($ready_to_explore_heading != '') { ?>
                                    <div class="h4"><?= $ready_to_explore_heading ?></div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ($ready_to_explore_button_text != '' && $ready_to_explore_button_link != '') { ?>
                            <div class="register-rt">
                                <div class="btn">
                                    <a href="<?= $ready_to_explore_button_link ?>" class="button btn-white" style="color: var(--green-dark);"><?= $ready_to_explore_button_text ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    return ob_get_clean();
}
add_shortcode('cta', 'shortcode_cta');
//4 [image-or-video]
function shortcode_image_or_video($atts = array())
{
    ob_start();
    //
    if (have_rows('image_or_video_repeater')) {
    ?>
        <div class="default-thumb-two fluid-width js-website-section">
            <div class="fluid-width-wrapper">
                <?php
                while (have_rows('image_or_video_repeater')) : the_row();
                    $image_or_video = get_sub_field('image_or_video');
                    $image = get_sub_field('image');
                    $poster_image = get_sub_field('poster_image');
                    $video_platform = get_sub_field('video_platform');
                    $vimeo_id = get_sub_field('vimeo_id');
                    $youtube_id = get_sub_field('youtube_id');
                    if ($image != '' || $poster_image != '' || $vimeo_id != '' || $youtube_id != '') {
                        if ($image_or_video == 'video') {
                            $final_url = '';
                            if ($video_platform == 'youtube' && $youtube_id != '') {
                                $final_url = $youtube_id;
                            }
                            if ($video_platform == 'vimeo' && $vimeo_id != '') {
                                $final_url = $vimeo_id;
                            }
                ?>
                            <div class="default-thumb-flex js-content-opacity">
                                <?php if ($poster_image != '') { ?>
                                    <figure class="object-fit" role="none">
                                        <img src="<?= $poster_image['url'] ?>" alt="<?= $poster_image['alt'] ?>" title="<?= $poster_image['alt'] ?>">
                                    </figure>
                                <?php } ?>
                                <?php if ($final_url != '') { ?>
                                    <div class="play-btn-main flex flex-center">
                                        <a class="play-btn flex popup-youtube flex-center" href="<?= $final_url ?>" tabindex="0">
                                            <span class="play-btn-wrap"><img src="<?= get_template_directory_uri() ?>/dist/images/play.svg" alt="Play" title="Play"></span>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ($image_or_video == 'image' && $image != '') { ?>
                            <div class="default-thumb-flex js-content-opacity">
                                <figure class="object-fit" role="none">
                                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" title="<?= $image['alt'] ?>">
                                </figure>
                            </div>
                        <?php  } ?>
                <?php }
                endwhile; ?>

            </div>
        </div>
    <?php } ?>
<?php
    return ob_get_clean();
}
add_shortcode('image-or-video', 'shortcode_image_or_video');
//5 [sticky-note]
function shortcode_sticky_note($atts = array())
{
    ob_start(); ?>
    <?php
    $sticky_note = get_field('sticky_note');
    if ($sticky_note) {
    ?>
        <section class="block-module pos-relative">
            <div class="block-bg pos-absolute" style="background: var(--green-dark);"></div>
            <div class="container">
                <div class="block-inner flex">
                    <div class="block-lt">
                        <div class="block-icon">
                            <svg width="59" height="42" viewBox="0 0 59 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 24L18 41L58.5 0.5" stroke="var(--green-dark)" />
                            </svg>
                        </div>
                    </div>
                    <!-- end of block lt -->
                    <div class="block-rt">
                        <div class="h4" style="color: var(--green-dark);"><?= $sticky_note ?></div>
                    </div>
                    <!-- end of block rt -->
                </div>
            </div>
        </section>
    <?php } ?>
<?php
    return ob_get_clean();
}
add_shortcode('sticky-note', 'shortcode_sticky_note');
//6 [cta-link]
function shortcode_cta_link($atts = array())
{
    ob_start(); ?>
    <?php
    $cta_link_text = get_field('cta_link_text');
    $cta_link = get_field('cta_link');
    if ($cta_link_text != '' && $cta_link != '') {
    ?>
        <section class="single-cta">
            <div class="container">
                <div class="single-cta-inner">
                    <div class="h5">
                        <a href="<?= $cta_link ?>" class="readmore"><?= $cta_link_text ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<?php
    return ob_get_clean();
}
add_shortcode('cta-link', 'shortcode_cta_link');
//7 [faq]
function shortcode_faq($atts = array())
{
    ob_start();
?>
    <?php
    if (have_rows('faq_repeater')) {
    ?>
        <section class="accordion-module">
            <div class="container">
                <div class="accordion-main">
                    <?php
                    while (have_rows('faq_repeater')) : the_row();
                        $faq_question = get_sub_field('faq_question');
                        $faq_answer = get_sub_field('faq_answer');
                        if ($faq_question != '' || $faq_answer != '') {
                    ?>
                            <div class="accordion">
                                <div class="accordion-item">
                                    <?php
                                    if ($faq_question != '') {  ?>
                                        <a href="#" class="accordion-heading">
                                            <span class="title"><?= $faq_question ?></span>
                                        </a>
                                    <?php } ?>
                                    <div class="content">
                                        <?php if ($faq_answer) {
                                            echo $faq_answer;
                                        } ?>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    endwhile; ?>
                    <!-- end of accordion -->
                </div>
            </div>
        </section>
    <?php } ?>
<?php
    return ob_get_clean();
}
add_shortcode('faq', 'shortcode_faq');
//8 [testimonial]
function shortcode_testimonial($atts = array())
{
    ob_start(); ?>
    <?php
    $testimonial_profile_image = get_field('testimonial_profile_image');
    $testimonial_review = get_field('testimonial_review');
    $testimonial_name = get_field('testimonial_name');
    $testimonial_position = get_field('testimonial_position');
    if ($testimonial_profile_image != '' || $testimonial_review != '' || $testimonial_name != '' || $testimonial_position != '') {
    ?>
        <section class="single-testimonial fluid-width">
            <div class="fluid-width-wrapper">
                <div class="container">
                    <div class="single-testimonial-wrap" style="var(--purple);">
                        <?php if ($testimonial_review != '') { ?>
                            <div class="single-testimonial-lt">
                                <?= $testimonial_review ?>
                            </div>
                        <?php } ?>
                        <!-- end of single-testimonial lt -->
                        <?php if ($testimonial_profile_image != '' || $testimonial_name != '' || $testimonial_position != '') { ?>
                            <div class="single-testimonial-rt">
                                <?php if ($testimonial_profile_image != '') { ?>
                                    <div class="single-testimonial-thumb">
                                        <figure class="object-fit">
                                            <img src="<?= $testimonial_profile_image['url'] ?>" alt="<?= $testimonial_profile_image['alt'] ?>" title="<?= $testimonial_profile_image['alt'] ?>">
                                        </figure>
                                    </div>
                                <?php } ?>
                                <?php if ($testimonial_name != '' || $testimonial_position != '') { ?>
                                    <div class="clients-info">
                                        <?php if ($testimonial_name != '') { ?>
                                            <span class="author-name"><?= $testimonial_name ?></span>
                                        <?php } ?>
                                        <?php if ($testimonial_position != '') { ?>
                                            <span class="author-pos"><?= $testimonial_position ?></span>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- end of single-testimonial rt -->
            </div>
        </section>
    <?php } ?>
    <?php
    return ob_get_clean();
}
add_shortcode('testimonial', 'shortcode_testimonial');
//////////////////////////////////////shortcode start/////////////////////

// Newsletter Section
function newsletter_signup_section()
{

    if (is_category()) {
        $nl_bg_desktop  = get_field('newsletter_background_desktop_image', 'category_2');
        $nl_bg_mobile   = get_field('newsletter_background_mobile_image', 'category_2');
        $nl_icon        = get_field('newsletter_icon', 'category_2');
        $nl_sub_heading = get_field('newsletter_sub_heading', 'category_2');
        $nl_heading     = get_field('newsletter_heading', 'category_2');
        $nl_form_id     = get_field('newsletter_form_id', 'category_2');
        $nl_disclaimer  = get_field('newsletter_disclaimer_text', 'category_2');
    } else {
        $nl_bg_desktop  = get_field('newsletter_background_desktop_image', 'option');
        $nl_bg_mobile   = get_field('newsletter_background_mobile_image', 'option');
        $nl_icon        = get_field('newsletter_icon', 'option');
        $nl_sub_heading = get_field('newsletter_sub_heading', 'option');
        $nl_heading     = get_field('newsletter_heading', 'option');
        $nl_form_id     = get_field('newsletter_form_id', 'option');
        $nl_disclaimer  = get_field('newsletter_disclaimer_text', 'option');
    }
    if ($nl_bg_desktop || $nl_bg_mobile || $nl_icon || $nl_sub_heading || $nl_heading || $nl_form_id || $nl_disclaimer) { ?>
        <section class="signup-module">
            <?php if ($nl_bg_desktop || $nl_bg_mobile) { ?>
                <div class="background-bg">
                    <picture class="object-fit">
                        <?php if ($nl_bg_desktop) { ?>
                            <source srcset="<?php echo $nl_bg_desktop['url']; ?>" media="(min-width:768px)">
                        <?php } ?>
                        <?php if ($nl_bg_mobile) { ?>
                            <img src="<?php echo $nl_bg_mobile['url']; ?>" alt="Newsletter Background" title="Newsletter Background">
                        <?php } ?>
                    </picture>
                </div>
            <?php } ?>

            <div class="container">
                <div class="signup-main">
                    <?php if ($nl_sub_heading) { ?>
                        <div class="section-heading"><?php echo $nl_sub_heading; ?></div>
                    <?php } ?>

                    <div class="signup-wrap flex">
                        <div class="signup-lt">
                            <?php if ($nl_icon) { ?>
                                <div class="news-icon">
                                    <figure role="none">
                                        <img src="<?php echo $nl_icon['url']; ?>" alt="Newsletter Icon" title="Newsletter Icon">
                                    </figure>
                                </div>
                            <?php } ?>

                            <?php if ($nl_heading) { ?>
                                <div class="h4"><?php echo $nl_heading; ?></div>
                            <?php } ?>
                        </div>

                        <div class="signup-rt">
                            <?php if ($nl_form_id) { ?>
                                <div class="signup-form">
                                    <?php echo do_shortcode('[formidable id=' . $nl_form_id . ']'); ?>

                                    <?php if ($nl_disclaimer) { ?>
                                        <div class="disclaimer"><?php echo $nl_disclaimer; ?></div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php }
}
