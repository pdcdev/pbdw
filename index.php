<?php get_header(); ?>
    <div class="wait global_hidden">
        <article id="home">
            <?php if ( have_posts() ) : ?>
                <?php $images = get_field('home_slider');
                    if( $images ): ?>
                        <div id="homeslider" class="home-flexslider preload">
                            <ul class="slides">
                               <li class="slide">
                                    <div class="" style="background-image: url( '<?php bloginfo('stylesheet_directory'); ?>/images/pbdw-move.jpg' );">
                                        <div class="project_title">
                                            <a href="/pbdw.com/contact/"><h3>We've Moved!</h3></a>
                                        </div>
                                    </div>
                                </li>
                                <?php while ( have_rows('home_featured') ) : the_row(); ?>
                                    <li class="slide">
                                        <?php $project = get_sub_field("project"); ?>
                                        <div class="" style="background-image: url( <?php echo get_image( get_sub_field('home_page_image'), "cover_nocrop"); ?> );">
                                            <?php if($project): ?>
                                            <div class="project_title">
                                                <a href="<?php echo get_permalink( $project->ID ); ?>">
                                                    <h3>
                                                        <?php echo $project->post_title; ?>
                                                    </h3>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif;?>
                <?php endif;  ?>
        </article>
        <div class="home_logo_container">
            <div class="home_logo"></div>
        </div>
    </div>
        <?php wp_footer(); ?>