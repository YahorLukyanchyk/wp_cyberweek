<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
    <div class="main__categories categories">
        <div class="categories__container">
            <div class="categories__wrapper">
                <?php $links = array_map( function ( $category ) {
					return sprintf(
						'<a href="%s" class="link link_text">%s</a>',
						esc_url( get_category_link( $category ) ),
						esc_html( $category->name )
						);
						}, get_the_category() );

						echo implode( ' <span>&#9679;</span> ', $links );?>
            </div>
        </div>
    </div>
    <div class="main__container">
        <div class="main__layout">
            <div class="main__feed feed-block">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="feed__single single-block">
                    <div class="single-block__block-heading">
                        <span class="single__item-date"><?php echo get_the_date(); ?></span>
                        <h2 class="single-block__item-heading">
                            <?php the_title(); ?>
                        </h2>
                        <div class="news__item-tags tags-block">
                            <?php the_tags('<div class="tag">', '</div><div class="tag">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="single-block__content content-block">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php comments_template( '/comments.php' ); ?>
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
    </div>
</main>

<?php
get_footer();