    <?php
    // Our include
    define('WP_USE_THEMES', false);
    //   require_once('../../../wp-load.php');

    require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

    // Our variables
    $postType   = (isset($_GET['postType'])) ? $_GET['postType'] : 'post';
    $category   = (isset($_GET['category'])) ? $_GET['category'] : '';
    $expertise = (isset($_GET['expertise'])) ? $_GET['expertise'] : '';
    $practice     = (isset($_GET['practice'])) ? $_GET['practice'] : '';
    $author_id  = (isset($_GET['author'])) ? $_GET['author'] : '';
    $taxonomy   = (isset($_GET['taxonomy'])) ? $_GET['taxonomy'] : '';
    $tag        = (isset($_GET['tag'])) ? $_GET['tag'] : '';
    $exclude    = (isset($_GET['postNotIn'])) ? $_GET['postNotIn'] : '';
    $include    = (isset($_GET['postIn'])) ? $_GET['postIn'] : '';
    $pageOffset = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : '';
    $numPosts   = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 7;
    $year       = (isset($_GET['year'])) ? $_GET['year'] : 0;
    $month      = (isset($_GET['month'])) ? $_GET['month'] : 0;
    $searchblog = (isset($_GET['searchblog'])) ? $_GET['searchblog'] : 0;
    $order      = (isset($_GET['order'])) ? $_GET['order'] : 'DESC';
    $views      = (isset($_GET['option'])) ? $_GET['option'] : 0;
    $postsCount = (isset($_GET['postsCount'])) ? $_GET['postsCount'] : '';
    //$resources_default_thumbnail = get_field('resources_default_thumbnail', 'category_2');
    $cat_thumbnail = get_field('thumbnail_image', 'category_2');
    $args = array(
        's'  => $searchblog,
        'post_type' => $postType,
        'tax_query' => [
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $category
            ]
        ],
        'category__not_in' => array(1),
        'paged' => $pageOffset,
        'orderby' => 'post_date',
        'order' => $order,
        'posts_per_page' => $numPosts,
        'post_status' => 'publish',

    );
    if (!empty($exclude)) {
        $exclude = explode(",", $exclude);
        $args['post__not_in'] = $exclude;
    }
    
$myposts = new WP_Query($args);
$total   = $myposts->found_posts;
?>

<div class="news-lists">
    <?php if ($myposts->have_posts()) : ?>
        <?php
        while ($myposts->have_posts()) :
            $myposts->the_post();
            $post_id = get_the_ID();

            $post_cats = get_the_category($post_id);
            $cat_name  = $post_cats ? $post_cats[0]->name : '';
            $cat_link  = $post_cats ? get_category_link($post_cats[0]->term_id) : '#';
            $cat_color = '';

            if ($post_cats) {
                $cat_id    = $post_cats[0]->term_id;
                $cat_color = get_field('category_text_color', 'category_' . $cat_id);
            }

            if (empty($cat_color)) {
                $cat_color = 'var(--yellow)';
            }

            $featured_img       = get_the_post_thumbnail_url($post_id, 'full');
            $post_date          = get_the_date('d/m/Y', $post_id);
            $display_video_icon = get_field('display_video_icon', $post_id);
        ?>
            <div class="news-list-grid" data-js-animation="fade-in-up">
                <div class="news-list-thumb">
                    <a href="<?php echo get_permalink($post_id); ?>">
                        <figure class="object-fit">
                            <img src="<?php echo $featured_img ?: $cat_thumbnail; ?>" alt="<?php echo get_the_title($post_id); ?>" title="<?php echo get_the_title($post_id); ?>">
                        </figure>
                    </a>

                    <?php if (!empty($display_video_icon) && in_array('yes', $display_video_icon)) : ?>
                        <div class="play-btn-main flex flex-center">
                            <a class="play-btn flex popup-youtube flex-center"
                               href="<?php echo get_permalink($post_id); ?>"
                               tabindex="0"
                               style="background: <?php echo $cat_color; ?>;">
                                <span class="play-btn-wrap">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/play.svg" alt="Play" title="Play">
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="news-list-cnt">
                    <div class="cat-wrapper">
                        <?php if ($cat_name) : ?>
                            <div class="cat-wrap">
                                <ul>
                                    <li><span class="catbg" style="background: <?php echo $cat_color; ?>;"></span>
                                        <a href="<?php echo $cat_link; ?>" style="color: <?php echo $cat_color; ?>;"><?php echo $cat_name; ?></a>
                                    </li>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="calender flex flex-vcenter">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/calendar.svg" alt="Calendar" title="Calendar">
                            <?php echo $post_date; ?>
                        </div>
                    </div>

                    <div class="h5">
                        <a href="<?php echo get_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a>
                    </div>

                    <div class="btn-link">
                        <a href="<?php echo get_permalink($post_id); ?>" class="link-trail">Read More</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <div class="no-posts-found">
            <p>No posts found.</p>
        </div>
    <?php endif; ?>
</div>

  
   