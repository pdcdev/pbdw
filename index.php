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
        <div class="home_logo_container">
            <div class="home_logo">
                <!-- <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pbdw_logo.png"> -->
            </div>
        </div>
    </div>
        <?php wp_footer(); ?>