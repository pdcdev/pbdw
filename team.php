<?php
/*
    Template Name: Team Page
*/
get_header(); ?>
<div class="fadein global_hidden">
    <header class="team-nav tablet_nav_shrunk">
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

    <div class="team_breadcrumbs">
        <div>
            <p><span><a href="<?php echo get_permalink( 52 ); ?>">Office</a></span> / <span><?php wp_title( '', true ); ?></span></p>
        </div>
    </div>
    <?php
        $meta_query = array(
            'key'       => 'position',
            'value'     => 'Partner',
            'compare'   => '='
        );
        $args = array(
            'post_type' => 'team',
            'meta_query' => array( $meta_query )
        );

        $the_query = new WP_Query( $args );
    ?>

    <?php if ( have_posts() ) : ?>

    <section id="team_grid">
            <article>
                <h4>Partners</h4>
                <div>

    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

                    <div class="team_item">
                        <a href="<?php the_permalink(); ?>"> 
                            <div class="team_item_image foursix" style="background-image: url(<?php echo the_field( 'featured_member_image' ); ?>)"></div>

                            <div class="team_item_info">
                                <p><?php the_title(); ?> <span><?php the_field( 'designation' ); ?></span></p>
                            </div>
                        </a>
                    </div>

                <?php endwhile; ?>
                </div>
            </article>
            <?php endif; ?>
            <?php
                $meta_query = array(
                    'key'       => 'position',
                    'value'     => 'Consulting Partner',
                    'compare'   => '='
                );
                $args = array(
                    'post_type' => 'team',
                    'meta_query' => array( $meta_query )
                );
                $the_query = new WP_Query( $args );
            ?>
            <?php if ( have_posts() ) : ?>
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <article>
                <h4>Consulting Partner</h4>
                <div>
                    <div class="team_item">
                        <a href="<?php the_permalink(); ?>"> 
                            <div class="team_item_image foursix" style="background-image: url(<?php echo the_field( 'featured_member_image' ); ?>)"></div>

                            <div class="team_item_info">
                                <p><?php the_title(); ?> <span><?php the_field( 'designation' ); ?></span></p>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
                </div>
            </article>
        <?php endif; ?>

                <?php

                    $meta_query = array(
                        'key'       => 'position',
                        'value'     => 'Senior Associate',
                        'compare'   => '='
                    );
                    $args = array(
                        'post_type' => 'team',
                        'meta_query' => array( $meta_query )
                    );

                    $the_query = new WP_Query( $args );

                ?>

                <?php if ( have_posts() ) : ?>
            <article>
                <h4>Senior Associates</h4>
                <div>
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="team_item">
                        <a href="<?php the_permalink(); ?>"> 
                            <div class="team_item_image foursix" style="background-image: url(<?php echo the_field( 'featured_member_image' ); ?>)"></div>

                            <div class="team_item_info">
                                <p><?php the_title(); ?> <span><?php the_field( 'designation' ); ?></span></p>
                            </div>
                        </a>
                    </div>

                <?php endwhile; ?>
                </div>
            </article>
        <?php endif; ?>
                <?php

                    $meta_query = array(
                        'key'       => 'position',
                        'value'     => 'Associate',
                        'compare'   => '='
                    );
                    $args = array(
                        'post_type' => 'team',
                        'meta_query' => array( $meta_query )
                    );

                    $the_query = new WP_Query( $args );

                ?>

                <?php if ( have_posts() ) : ?>
            <article>
                <h4>Associates</h4>
                <div>
                    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="team_item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="team_item_image foursix" style="background-image: url(<?php echo the_field( 'featured_member_image' ); ?>)"></div>

                            <div class="team_item_info">
                                <p><?php the_title(); ?> <span><?php the_field( 'designation' ); ?></span></p>
                            </div>
                           
                        </a>
                    </div>
                <?php endwhile; ?>
                </div>
            </article>
        <?php endif; ?>
    </section>
    <aside class="staff_container">
        <div>
            <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <div class="staff_architects">
                <h4>Staff Architects</h4>
                <div>
                    <?php if( get_field('staff_architects') ) : ?>
                        <?php while( has_sub_field('staff_architects') ): ?>
                            <ul>
                                <li><?php the_sub_field('name'); ?><span> <?php the_sub_field('designation'); ?></span></li>
                                <?php if( get_sub_field('email') ) : ?><li><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></li><?php endif; ?>
                            </ul>
                        <?php endwhile; ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="staff_architects_spillover">
                <div>
                </div>
            </div>
            <div class="staff_communications">
                <h4>Communications</h4>
                <?php if( get_field('communications') ) : ?>
                    <?php while( has_sub_field('communications') ): ?>
                        <ul>
                            <li><?php the_sub_field('name'); ?></li>
                            <?php if( get_sub_field('email') ) : ?><li><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></li><?php endif; ?>
                        </ul>
                    <?php endwhile; ?>
                <?php endif ?>
            </div>
            <div class="staff_operations">
                <h4>Operations</h4>
                <?php if( get_field('operations') ) : ?>
                    <?php while( has_sub_field('operations') ): ?>
                        <ul>
                            <li><?php the_sub_field('name'); ?></li>
                            <?php if( get_sub_field('email') ) : ?><li><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    <?php endwhile; ?>
                <?php endif ?>
            <?php endwhile; endif; ?>
            </div>
        </div>
    </aside>
</div>
<?php get_footer(); ?>