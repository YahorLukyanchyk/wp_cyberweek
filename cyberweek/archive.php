<?php
/**
 * The template for displaying archive pages
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
                        <a href="#" class="news__all"></a>
                    </div>
                </div>
            </div>
            <aside class="aside">
                <div class="aside__matches matches-block">
                </div>
                <?php dynamic_sidebar(); ?>
            </aside>
        </div>
    </div>
</main>

<?php
get_footer();
