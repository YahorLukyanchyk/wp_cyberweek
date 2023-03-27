<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" class="header__search search">
    <div class="search__block">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/search.svg' ?>" alt="Search icon" class="search__open" />
        <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Поиск" />
        <img src="<?php echo get_template_directory_uri() . '/assets/img/close.svg' ?>" alt="Exit icon" class="search__close" />
    </div>
</form>