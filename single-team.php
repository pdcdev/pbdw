<?php get_header(); ?>
    <section id="team_page">
        <div class="bread">
            <div class="project_breadcrumbs">
                <h3>
                    Leadership Team
                </h3>
            </div>
        </div>
            <article class="member">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="member_header">
                    <h3><?php the_title(); ?> <span><?php the_field( 'designation' ); ?></span></h3>
                    <p class="position"><?php the_field( 'position' ); ?></p>
                </div>

                <div class="member_description">
                    <?php if (get_field('member_copy')) : the_field( 'member_copy' ); endif; ?>
                    <?php if (get_field('member_bio_pdf')) : ?>
                        <a href="<?php the_field("member_bio_pdf") ?>" target="_blank">Download Bio <i class="icon-download"></i></a>
                    <?php endif; ?>
                </div>

                <div class="member_image square" style="background-image: url('<?php the_field( 'member_image' ); ?>');">
                </div>

            <?php endwhile; endif; ?>

            </article>
    </section>
    <?php rewind_posts(); ?>
    <?php wp_reset_query(); ?>
        <section class="cat_thumbs">
            <h6>Leaders</h6>
            <div class="more_cat_thumbs">
                <?php
                    global $wp_query;
                    $thePostID = $wp_query->post->ID;

                    $args = array(
                        'post_type' => 'team',
                        'post__not_in' => array($thePostID)
                    );

                    $the_query = new WP_Query( $args );
                ?>
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div>
                        <div class="cat_cube square" style="background-image: url(<?php the_field( 'member_image' ); ?>)">
                            <a href="<?php the_permalink(); ?>">
                                <div class="cat_cube_info">
                                    <p><?php the_title(); ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>

    <script type="text/javascript">

    </script>
<?php get_footer(); ?>