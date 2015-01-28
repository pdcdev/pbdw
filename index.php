<?php get_header(); ?>
    <div class="wait global_hidden">
        <article id="home">
            <?php if ( have_posts() ) : ?>
                <?php $images = get_field('home_slider');
                    if( $images ): ?>
                        <div id="homeslider" class="home-flexslider preload">
                            <ul class="slides">
                                <?php while ( have_rows('home_featured') ) : the_row(); ?>
                                    <li class="slide">
                                        <?php $project = get_sub_field("project"); ?>
                                        <div class="" style="background-image: url( <?php echo get_image( get_sub_field('home_page_image'), "cover_nocrop"); ?> );">
                                            <div class="project_title">
                                                <a href="<?php echo get_permalink( $project->ID ); ?>">
                                                    <h3>
                                                        <?php echo $project->post_title; ?>
                                                    </h3>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif;?>
                <?php endif;  ?>
        </article>
        <div class="home_logo_container">
            <div class="home_logo">
                <!-- <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pbdw_logo.png"> -->
            </div>
        </div>
        <aside class="home_footer">
            <div>
                <p class="name">Platt Byard Dovell White Architects LLP <br /> All rights reserved, <?php echo date("Y"); ?><p>
                <nav class="footer_nav">
                    <?php
                        $args = array(
                            'menu' => 'main-menu',
                            'depth' => '1',
                            'echo' => false
                        );
                        echo wp_nav_menu( $args );
                    ?>
                </nav>
                <address>
                    <p>20 West 22nd Street, 17th Floor</p>
                    <p>New York, NY 10010</p>
                    <p>212 691 2440</p>
                </address>
            </div>

        </aside>
    </div>
        <?php wp_footer(); ?>