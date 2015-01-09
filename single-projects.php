    <?php get_header(); ?>
    <div class="wait global_hidden">
        <div id="projectslider" class="window_size">
            <div class="mobile_project_header">
                <!-- <div class="mobile_project_header_inner "> -->
                    <h2 class="truncate"><?php the_title(); ?></h2>
                    <div class="mobile_down">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile_down.svg">
                    </div>
                <!-- </div> -->
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
            <?php endwhile; endif; ?>
        </section>
            <?php
                $categories = get_field( 'project_category' );

                if( $categories ):
            ?>

        <section class="cat_thumbs">
            <h6>Similar Projects</h6>
            <div class="more_cat_thumbs">
            <?php

                global $wp_query;
                $thePostID = $wp_query->post->ID;

                if(count($categories) > 1) {
                    $cats = array(
                        'relation' => 'OR',
                        array(
                            'key'     => 'project_category',
                            'value'   => $categories[0],
                            'compare' => 'LIKE'
                        ),
                        array(
                            'key'     => 'project_category',
                            'value'   => $categories[1],
                            'compare' => 'LIKE'
                        )
                    );
                } else {
                    $cats = array(
                        'relation' => 'OR',
                        array(
                            'key'     => 'project_category',
                            'value'   => $categories[0],
                            'compare' => 'LIKE'
                        )
                    );
                }

                $args = array(
                    'post_type' => 'projects',
                    'post__not_in' => array($thePostID),
                    'meta_query' => $cats
                );

                $the_query = new WP_Query( $args );

            ?>
                <?php if ( $the_query->have_posts() ) : ?>

                    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php
                        $attachment_id = get_field('featured_image');
                        $size = "thumbnail";

                        $image = wp_get_attachment_image_src( $attachment_id, $size );
                    ?>
                    <div>
                        <div class="cat_cube square" style="background-image: url(<?php echo $image[0]; ?>)">
                            <a href="<?php the_permalink(); ?>">
                                <div class="cat_cube_info">
                                    <p><?php the_title(); ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </section>
    <?php endif; ?>
</div>
<?php get_footer(); ?>