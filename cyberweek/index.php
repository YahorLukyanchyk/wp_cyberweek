<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
    <div class="main__tag-menu tag-menu">
        <nav class="tag-menu__nav">
            <?php wp_nav_menu( [
                        'theme_location'  => 'main_tag_nav',
                        'container'       => null,
                        'menu_class'    => 'tag-menu__list'
                    ] );?>
        </nav>
    </div>
    <div class="main__container">
        <div class="main__layout">
            <div class="main__feed feed-block">
                <div class="slider">
                    <div class="slider__line">
                        <?php
							global $post;

							$myposts = get_posts( [
							'posts_per_page' => 5,
							'category_name' => 'banner',
							'post_type' => 'post',
							] );

							foreach( $myposts as $post ){
							setup_postdata( $post );
							?>
                            <div class="slider__item item">
                                <a href="<?php the_permalink(); ?>" class="item__link">
                                    <?php the_post_thumbnail(); ?>
                                    <div class="item__face">
                                        <h3 class="item__heading"><?php the_title(); ?></h3>
                                        <span class="item__date"><?php echo the_content(); ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php
							}
						wp_reset_postdata();
						?>
                    </div>
                    <div class="slider__navigation">
                        <button class="slider__prev">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/arrow_left.svg' ?>"
                                alt="Arrow icon" />
                        </button>
                        <button class="slider__next">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/arrow_right.svg' ?>"
                                alt="Arrow icon" />
                        </button>
                    </div>
                </div>
                <div class="feed-block__news news-block">
                    <h2 class="news news-block__heading">Последние новости</h2>
                    <div class="news__list">
                        <?php
                 	if ( have_posts() ){
                    while ( have_posts() ){
                      the_post(); ?>
                        <div class="news__item-wrapper">
                            <article class="news__item">
                                <?php the_post_thumbnail(); ?>
                                <div class="news__item-info">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="news__item-heading">
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>
                                    <span class="news__item-date"><?php echo get_the_date(); ?></span>
                                    <div class="news__item-tags tags-block">
                                        <?php the_tags('<div class="tag">', '</div><div class="tag">', '</div>'); ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php }
					} else {
						echo wpautop( 'Постов для вывода не найдено.' );
					}
                    ?>
                    </div>
                    <div class="news__all-wrapper">
                        <a href="#" class="news__all">Больше новостей</a>
                    </div>
                </div>
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