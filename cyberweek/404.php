<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
            <div class="feed-block__notfound notfound-block">
                <div class="notfound-block__content">
                    <div class="notfound-block__text-left">
                        <span>Запрашиваемая страница не найдена</span><a href="<?php echo home_url(); ?>">Перейти на
                            главную</a>
                    </div>
                    <div class="notfound-block__text-right">
                        <span>404</span><span>NOT FOUND</span>
                    </div>
                </div>
            </div>
            <div class="feed-block__news news-block">
                <h2 class="news news-block__heading">Последние новости</h2>
                <div class="news__list">
                    <?php
                    global $post;

                    $myposts = get_posts( [
						'posts_per_page' => 5,
                    ] );
                    foreach( $myposts as $post ){
                        setup_postdata( $post );
                        ?>
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
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="news__all-wrapper">
                    <a href="<?php echo home_url(); ?>/category/news/">Больше новостей</a>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

<?php
get_footer();