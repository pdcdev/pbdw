<?php 
/*
    Template Name: Mobile Home
*/
get_header(); ?>
        <div id="header_container">
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
    <section id="mobile_home">
        <div>
         <?php
                $args = array(
                    'post_type' => 'projects',
                    'meta_query' => array(
                        array(
                                'key'     => 'mobile_featured',
                                'value'   => TRUE,
                                'compare' => 'LIKE'
                            )
                        )
                );
                $the_query = new WP_Query( $args );
            ?>

            <?php if ( have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php
                    $attachment_id = get_field('featured_image');
                    $size = "grid";

                    $image = wp_get_attachment_image_src( $attachment_id, $size );
                ?>
                <a href="<?php the_permalink(); ?>">
                <div class="featured_project_item foursix <?php echo implode(' ', get_field('project_category')) ; ?>" title="<?php the_title(); ?>" data-completed="<?php the_field( 'date_completed' ); ?>" style="background-image: url(<?php echo $image[0]; ?>)">
                        <div class="featured_project_info header_gradient">
                            <p><?php the_title(); ?></p>
                        </div>
                </div>
                </a>
            <?php endwhile; endif; ?>
        </div>
    </section>
<?php get_footer(); ?>