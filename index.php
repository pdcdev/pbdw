<?php get_header(); ?>
<script type="text/javascript">
    if (screen.width <= 320) {
        document.location = "/mobile-home";
    }
</script>
    <div class="wait global_hidden">
        <div id="header_container" class="header_gradient">
            <header class="home-nav tablet_nav_shrunk">
                <h1><a href="<?php echo home_url(); ?>">PBDW <span>ARCHITECTS</span></a></h1>
                <div class="mobile_menu_btn">
                    <div class="menu_icon"></div>
                </div>
                <nav data-visibility="0" class="nav_hidden">
                    <?php
                        $args = array(
                            'menu' => 'main-menu',
                            'echo' => false
                        );
                        echo wp_nav_menu( $args );
                    ?>
                </nav>
            </header>
        </div>
        <article id="home">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php $images = get_field('home_slider');
                    if( $images ): ?>
                        <div id="homeslider" class="home-flexslider preload">
                            <ul class="slides">
                                <?php foreach( $images as $image ): ?>
                                    <li class="slide">
                                        <div class="window_size" style="background-image: url( <?php echo $image['url']; ?> );"></div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif;?>
                <?php endwhile; endif;  ?>
        </article>
        <div class="home_logo window_size">
        </div>
    </div>
        <?php wp_footer(); ?>