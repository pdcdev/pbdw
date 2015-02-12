    <?php get_header(); ?>
    <div class="loader">
        <p class="loaderdots">
            <span class="ldr ldr1"></span>
            <span class="ldr ldr2"></span>
            <span class="ldr ldr3"></span>
            <span class="ldr ldr4"></span>
        </p>
    </div>
    <div class="wait global_hidden">
        <div id="projectslider" class="window_size">
            <div class="mobile_project_header">
                <h2 class="truncate"><?php the_title(); ?></h2>
                <div class="mobile_down">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile_down.svg">
                </div>
            </div>
            <div class="prev flexbtn"><i class="icon-left-open-big"></i><span></span></div>
            <div class="next flexbtn"><i class="icon-right-open-big"></i><span></span></div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            $this_ID = get_the_ID();
        ?>
        <?php $images = get_field('gallery_slideshow');
        if( $images ): ?>
            <div class="projects-flexslider">
                <ul class="slides">
                    <?php foreach( $images as $image ): ?>
                        <?php
                            $this_image = wp_get_attachment_image_src( $image['id'], $image['sizes']['large-feature'] );
                            $width = $this_image[1];
                            $height = $this_image[2];
                            $orientation = $width > $height ? 'horizontal' : 'vertical';
                        ?> 
                        <li class="slide slide_inactive">
                            <div class="<?php echo $orientation ?>" style="background-image: url( <?php echo $image['url']; ?> );">
                                <div class="caption">
                                    <p><?php echo $image['caption']; ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="gallery_nav_container"></div>
        <?php endif;?>
        </div>
        <div class="expand_view_container">
            <div class="expand_button down"></div>
        </div>
        <section id="project_page"><!-- class="underworld" -->
            <div class="project_breadcrumbs">
                <h3>
                <?php echo implode(' &amp; ', get_field( 'project_category' )); ?>
                </h3>
            </div>

            <div class="project_title">
                <h2><?php the_title(); ?></h2>
            </div>

            <article class="project_description">
                <?php if (get_field( 'pullquote' )): ?>
                <p class="pullquote"><?php the_field( 'pullquote' ); ?></p>
                <?php endif; ?>
                <?php the_field( 'project_description' ); ?>
            </article>

            <div class="project_details">

            <?php if( get_field( 'client' ) ) : ?>
                <h5>Client</h5>
                <p><?php the_field( 'client' ); ?></p>
            <?php endif; ?>
            <?php if( get_field( 'location' ) ) : ?>
                <h5>Location</h5>
                <p><?php the_field( 'location' ); ?></p>
            <?php endif; ?>
            <?php if( get_field( 'date_completed' ) ) : ?>
                <h5>Date Completed</h5>
                <p><?php the_field( 'date_completed' ); ?></p>
            <?php endif; ?>
            <?php if( get_field( 'awards' ) ) : ?>
                <h5>Awards</h5>
                <p><?php the_field( 'awards' ); ?></p>
            <?php endif; ?>
            <?php if( get_field( 'sustainable_design' ) ) : ?>
                <h5>Sustainable Design</h5>
                <p><?php the_field( 'sustainable_design' ); ?></p>
            <?php endif; ?>
            <?php if (get_field( 'project_pdf' )) : ?>
                <h5><a href="<?php the_field( 'project_pdf' ); ?>" class="download_pdf" target="_blank">Project PDF <i class="icon-download"></i> </a></h5>
            <?php endif; ?>
            </div>
        </section>

        <?php if( get_field('similar_projects') ) : ?>
        <?php $related_posts = get_field('similar_projects'); ?>
            <?php if( $related_posts ): ?>
                <section class="cat_thumbs">
                    <h6>Similar Projects</h6>
                    <div class="more_cat_thumbs">
                <?php foreach( $related_posts as $related_post ): ?>
                <?php $post = $related_post; setup_postdata($post); ?>
                    <div>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <div class="cat_cube square" style="background-image: url(<?php echo get_image( get_field("featured_image"), "cube"); ?>);">
                        </div>
                        </a>
                    </div>
                <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>

        <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>