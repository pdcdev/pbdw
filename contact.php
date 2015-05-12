<?php 
/*
    Template Name: Contact Page
*/
get_header(); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <article class="contact_map">
        <div id="map-canvas" class="watch-orientation"></div>
    </article>
    <section id="contact">
            <article class="contact_info">
                <div class="contact_web">
                    <h4>Connect With Us</h4>
                    <a href="mailto:<?php the_field( 'email' ); ?>"><?php the_field( 'email' ); ?></a>
                    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                        <?php if( get_field('facebook') || get_field('linkedin') || get_field('twitter') || get_field('google_plus') || get_field('pinterest') || get_field('instagram') || get_field('vimeo')): ?>
                        <p class="social">
                            <?php if( get_field('facebook') ): ?> <a href="<?php the_field( 'facebook' ); ?>" target="_blank"> <i class="icon-facebook-circled"></i></a> <?php endif; ?>
                            <?php if( get_field('linkedin') ): ?> <a href="<?php the_field( 'linkedin' ); ?>" target="_blank"> <i class="icon-linkedin-circled"></i></a> <?php endif; ?>
                            <?php if( get_field('twitter') ): ?> <a href="<?php the_field( 'twitter' ); ?>" target="_blank"> <i class=" icon-twitter-circled"></i></a> <?php endif; ?>
                            <?php if( get_field('google_plus') ): ?> <a href="<?php the_field( 'google_plus' ); ?>" target="_blank"> <i class="icon-gplus-circled"></i></a> <?php endif; ?>
                            <?php if( get_field('pinterest') ): ?> <a href="<?php the_field( 'pinterest' ); ?>" target="_blank"> <i class="icon-pinterest-circled"></i></a> <?php endif; ?>
                        </p>
                        <?php endif; ?>
                    <?php endwhile; endif; ?>
                </div>
                <div class="contact_address">
                    <h4>Find Us</h4>
                    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                        <p>Platt Byard Dovell White Architects LLP</p>
                        <p><a href="<?php the_field( 'map_link' ); ?>" target="_blank"><?php the_field( 'address' ); ?></a></p>
                        <p><?php the_field( 'phone' ); ?></p>
                    <?php endwhile; endif; ?>
                </div>
            </article>
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <?php if( get_field('artwork_credit') ) : ?>
        <article class="credits">
        <h4>Artist Credits</h4><h4>Website Development</h4>
        <div class="artists">
        <?php
            $artist_string = array();
            while( has_sub_field('artwork_credit') ) {
                if( get_sub_field('artist_url') ) {
                    $artist_string[] = "<a href=" . get_sub_field('artist_url') . " target='_blank'>" . get_sub_field('name-entity') . "</a>";
                } else {
                    $artist_string[] = get_sub_field('name-entity');
                }
            }

            $arist_count = count($artist_string);
            $i = 0;
            foreach( $artist_string as $artist ) {
                if(++$i != $arist_count) {
                    echo $artist . ", ";
                } else {
                    echo $artist . ".";
                }
            }
        ?>
        </div>

        <ul class="website">
        <?php while( has_sub_field('website_credit') ): ?>
            <li>
                <?php if(get_sub_field('website_credit_name')): ?>
                    <a href="<?php the_sub_field('website_credit_url'); ?>" target="_blank">
                        <?php the_sub_field('website_credit_name'); ?></a>
                <?php else: ?>
                    <?php the_sub_field('website_credit_name'); ?>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
        </ul>
     <?php endif ?>
        <?php endwhile; endif; ?>
        </section>
        <?php rewind_posts(); ?>
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php if( get_field('opportunities') ) : ?>
        <section id="jobs">
        <h2>Opportunities</h2>
            <?php while( has_sub_field('opportunities') ): ?>
            <article class="jobs_item">
                <h4 class="pos_name"><?php the_sub_field('position_name'); ?></h4>
                <p><?php the_sub_field('position_description'); ?></p>
                <h4 class="qualifications">Qualifications</h4>
                <p><?php the_sub_field('position_qualifications'); ?></p>
            </article>
            <?php endwhile; ?>
        </section>
    <?php endif ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>