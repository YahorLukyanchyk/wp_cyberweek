<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CyberWeek
 */

get_header();
?>

<main class="main">
    <div class="main__mobile-nav nav-mobile">
        <?php get_search_form(); ?>
        <?php wp_nav_menu( [
            'theme_location'  => 'mobile_nav',
            'container'       => null,
            'menu_class'    => 'header__nav-list'
        ] );?>
    </div>
    <div class="main__container">
        <div class="main__layout">
            <div class="main__feed feed-block">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="feed-block__page page-block">
                    <h1 class="page-block__heading"><?php the_title(); ?></h1>
                    <div class="page-block__content-list">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
			<aside class="aside">
                    <div class="aside__matches matches-block">
                    </div>
                    <!-- <div class="aside__interesting interesting-block">
                        <h2 class="interesting-block__heading">Интересное для Вас</h2>
                        <div class="interesting__list">
                            <?php
                        global $post;

                        $myposts = get_posts( [
                        'posts_per_page' => 5,
                        'category_name' => 'interesting',
                        'post_type' => 'post',
                        ] );

                        foreach( $myposts as $post ){
                        setup_postdata( $post );
                        ?>
                            <div class="interesting__item-wrapper">
                                <div class="interesting__item">
                                    <?php the_post_thumbnail(); ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="interesting__item-heading">
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                        ?>
                        </div>
                    </div> -->
                    <?php dynamic_sidebar(); ?>
                </aside>
        </div>
</main>

<?php
get_footer();