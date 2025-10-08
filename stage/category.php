<?php
get_header();
$cat2_id       = get_cat_ID('cat_2');
$featured_posts = get_field('select_featured_post', 'category_2');
$cat_thumbnail = get_field('thumbnail_image', 'category_2');
$category = get_category(get_query_var('cat'));
$cat_idx = get_query_var('cat');

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$pagenumber =  ($paged == 1) ?  '' : $paged;
$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($featured_posts) {
    $posts_list = array_map(function($post) {
        return is_object($post) ? $post->ID : $post;
    }, $featured_posts);
} else {
    $posts_list = get_posts([
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'post_status'    => 'publish',
        'fields'         => 'ids'
    ]);
}

if ($posts_list) { ?>
    <section class="newsletter-news-module">
        <div class="container">
            <div class="newsletter-news-main">
                <div class="newsletter-news-wrap flex">
                    <?php
                    $counter = 0;
                    foreach ($posts_list as $post_id) {

                        $categories = get_the_category($post_id);
                        $cat_name   = $categories ? $categories[0]->name : '';
                        $cat_link   = $categories ? get_category_link($categories[0]->term_id) : '';

                        $cat_color = '';
                        if ($categories) {
                            $cat_id    = $categories[0]->term_id;
                            $cat_color = get_field('category_text_color', 'category_' . $cat_id);
                        }

                        if (empty($cat_color)) {
                            $cat_color = 'var(--yellow)';
                        }

                        if ($counter == 0) {
                            $desktop_img = get_field('banner_desktop_image', $post_id);
                            $mobile_img  = get_field('banner_mobile_image', $post_id);
                            $mobile_img  = $mobile_img ? $mobile_img : $desktop_img;
                    ?>
                            <div class="newsletter-news-top-lt">
                                <div class="newsletter-news-post pos-relative">
                                    <?php if ($desktop_img || $mobile_img) { ?>
                                        <div class="newsletter-news-thumb" data-js-animation="fade-in-up">
                                            <a href="<?php echo get_permalink($post_id); ?>">
                                                <picture class="object-fit" role="none">
                                                    <?php if ($desktop_img) { ?>
                                                        <source srcset="<?php echo $desktop_img['url']; ?>" media="(min-width:768px)">
                                                    <?php } ?>
                                                    <?php if ($mobile_img) { ?>
                                                        <img src="<?php echo $mobile_img['url']; ?>" alt="<?php echo get_the_title($post_id); ?>">
                                                    <?php } ?>
                                                </picture>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="newsletter-news-txt">
                                        <?php if ($cat_name) { ?>
                                            <div class="cat-wrap">
                                                <ul>
                                                    <li>
                                                        <span class="catbg" style="background:<?php echo $cat_color; ?>;"></span>
                                                        <a href="<?php echo $cat_link; ?>" style="color:<?php echo $cat_color; ?>;"><?php echo $cat_name; ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                        <h2><a href="<?php echo get_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></h2>
                                        <div class="btn-link">
                                            <a href="<?php echo get_permalink($post_id); ?>" class="link-trail" style="color: var(--white);">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } else {
                            $featured_img = get_the_post_thumbnail_url($post_id, 'full');
                            $img_to_use   = $featured_img ? $featured_img : $cat_thumbnail;
                            if ($counter == 1) { ?>
                                <div class="newsletter-news-top-rt">
                                    <div class="newsletter-news-top-rt-inner">
                                    <?php } ?>
                                    <div class="newsletter-news-post pos-relative">
                                        <?php if ($img_to_use) { ?>
                                            <div class="newsletter-news-thumb" data-js-animation="fade-in-up">
                                                <a href="<?php echo get_permalink($post_id); ?>">
                                                    <picture class="object-fit" role="none">
                                                        <img src="<?php echo $img_to_use; ?>" alt="<?php echo get_the_title($post_id); ?>">
                                                    </picture>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <div class="newsletter-news-txt">
                                            <div class="h5">
                                                <a href="<?php echo get_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a>
                                            </div>
                                            <div class="newsletter-news-ftr flex">
                                                <div class="btn-link">
                                                    <a href="<?php echo get_permalink($post_id); ?>" class="link-trail">Read More</a>
                                                </div>
                                                <?php if ($cat_name) { ?>
                                                    <div class="cat-wrap">
                                                        <ul>
                                                            <li>
                                                                <span class="catbg" style="background:<?php echo $cat_color; ?>;"></span>
                                                                <a href="<?php echo $cat_link; ?>" style="color:<?php echo $cat_color; ?>;"><?php echo $cat_name; ?></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($counter == count($posts_list) - 1) { ?>
                                    </div>
                                </div>
                    <?php }
                                }
                                $counter++;
                            }
                            wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
<?php }


newsletter_signup_section(); ?>

<section class="newsletter-main">
    <section class="news-filter">
        <div class="container">
            <?php

            $parent_cat_id = 2;
            $all_categories = get_categories([
                'parent'     => $parent_cat_id,
                'hide_empty' => false,
            ]);

            ?>

            <div class="news-filter-inner flex">
                <div class="heading_mobile_menu">All News<em class="fa-sharp fa-thin fa-angle-down"></em></div>
                <ul>
                    <li class="<?php echo ($cat_idx == 2) ? 'active' : ''; ?>">
                        <a href="/newsroom/">
                            All News
                            <em class="fa-sharp fa-thin fa-arrow-right" id="cat-filter"></em>
                        </a>
                    </li>

                    <?php if (!empty($all_categories)) { ?>
                        <?php foreach ($all_categories as $cat) { ?>
                            <li class="<?php echo ($cat->term_id == $cat_idx) ? 'active' : ''; ?>">
                                <a href="<?php echo get_category_link($cat->term_id); ?>">
                                    <?php echo $cat->name; ?>
                                    <em class="fa-sharp fa-thin fa-arrow-right" id="cat-filter"></em>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                <div class="news-search">
                    <form action="" class="search-form" method="GET">
                        <div class="form-field">
                            <input type="submit" name="" value="">
                            <input type="search" placeholder="What are you looking for?" name="search" value="<?php echo $search; ?>">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <?php
    $args = [
        'post_type' => 'post',
        's' => $search,
        'tax_query' => [
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $cat_idx
            ]
        ],
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'post__not_in'   => $posts_list,
    ];
    $news_posts =  get_posts($args);
    // print_r($args);
    $postsCount = count($news_posts);
    $exclude_post = implode(',', $posts_list);

    if ($news_posts) : ?>
        <section class="news-lists-wrap">
            <div class="container">
                <?php if ($search !== '') {  ?>
                    <div class="search-wrap" id="search-result">
                        <div class="container">
                            <div class="h2">Search Result For: <?php echo $search; ?> </div>
                        </div>
                    </div>
                <?php } ?>

                <div id="ajax-load-more" class="more blog_more load-more">
                    <!-- <span role="button" class="btn-center btn-primary">
                <span class="button">Read More</span>
            </span> -->
                    <ul id="blog_list" class="news-lists" data-path="<?php bloginfo('stylesheet_directory'); ?>" data-display-posts="9" data-post-type="post" data-searchblog="<?php echo $search; ?>" data-category="<?php echo $cat_idx; ?>" data-postsCount="<?php echo $postsCount; ?>" data-pageNumber="<?php echo $pagenumber; ?>" data-order="DESC" data-post-not-in="<?php echo esc_attr($exclude_post); ?>" data-button-text="Load more">
                </div>
            </div>
        </section>
    <?php endif; ?>

</section>

<?php if ($search) { ?>
    <script>
        jQuery(function() {
            console.log('scroll');
            jQuery('html, body').animate({
                scrollTop: (jQuery('#search-result').offset().top - 100)
            }, 1000);

        });
    </script>

<?php }

if (isset($cat_idx)) { ?>
    <script>
        jQuery(function() {
            console.log('scroll');
            jQuery('html, body').animate({
                scrollTop: (jQuery('#cat-filter').offset().top - 100)
            }, 1000);

        });
    </script>
<?php }

get_footer(); ?>