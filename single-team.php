<?php get_header(); ?>
    <section id="team_page">
            <article class="member">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="member_description">
                    <div class="member_header">
                        <h3><?php the_title(); ?> <span><?php the_field( 'designation' ); ?></span></h3>
                        <p class="position"><?php the_field( 'position' ); ?></p>
                    </div>
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
    <script type="text/javascript">

    </script>
<?php get_footer(); ?>