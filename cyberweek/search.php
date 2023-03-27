<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
            <div class="main__feed feed-block search-block">
                <h1 class="search-page__title"><?php
					printf( esc_html__( 'Результаты поиска: %s', 'cyberweek' ), '<span>' . get_search_query() . '</span>' );
					?>
                </h1>
                <div class="search-result__block">
                    <div class="news__list">
                        <?php
						if ( have_posts() ){
						while ( have_posts() ){
						the_post(); ?>
							<div class="search__item-wrapper">
								<article class="search__item">
									<a href="<?php the_permalink(); ?>">
										<h3 class="news__item-heading">
											<?php the_title(); ?>
										</h3>
										<?php the_post_thumbnail(); ?>
									</a>
									<div class="news__item-info">
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
        </div>
    </div>
</main>

<?php
get_footer();