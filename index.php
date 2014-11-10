<?php get_header(); ?>
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
            <?php if ( have_posts() ) : ?>
                <?php $images = get_field('home_slider');
                    if( $images ): ?>
                        <div id="homeslider" class="home-flexslider preload">
                            <ul class="slides">
                                <?php while ( have_rows('home_featured') ) : the_row(); ?>
                                    <li class="slide">
                                        <?php $project = get_sub_field("project"); ?>
                                        <div class="window_size" style="background-image: url( <?php get_image( get_sub_field('home_page_image'), "cover_nocrop"); ?> );">
                                            <div class="project_title">
                                                <h3>
                                                    <a href="<?php echo get_permalink( $project->ID ); ?>">
                                                        <?php echo $project->post_title; ?>
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif;?>
                <?php endif;  ?>
        </article>
        <div class="home_logo window_size">
        </div>
    </div>
        <?php wp_footer(); ?>