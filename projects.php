<?php
/*
    Template Name: Project Page
*/
get_header(); ?>
<div class="fadein global_hidden">
    <header class="projects-nav tablet_nav_shrunk">
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
    <?php
        global $post;
        $the_category = $post->post_name;
    ?>
    <div class="projects_grid_breadcrumbs">
            <p class="section_title"><span><a href="<?php echo get_permalink( 7 ); ?>">Projects</a></span><span>
        <?php
            if($the_category == 'projects') {
                echo 'All';
            } else {
                echo $the_category;
            }
        ?>
            </span></p>
        <div class="grid-list-btn-container">
            <a id="grid-list-btn" class="active" data-state="0" title="View Projects as list or grid">
                <p id="grid_btn" class="icon-grid active" data-state="0"><span> Projects by Grid</span></p>
                <p id="list_btn" class="icon-list active" data-state="0"><span> Projects by List</span></p>
            </a>
        </div>
    </div>
    <div class="list_header list_header_hidden">
        <div>
            <p class="alpha-btn active" data-state="1">
                <span>By Project<i class="icon-down-open"></i><i class="icon-up-open"></i></span>
            </p>
            <p class="category-btn" data-state="1">
                <span>By Category<i class="icon-down-open"></i><i class="icon-up-open"></i></span>
            </p>
            <p class="year-btn" data-state="1">
                <span>By Year<i class="icon-down-open"></i><i class="icon-up-open"></i></span>
            </p>
        </div>
    </div>
    <section id="projects_grid">
         <?php
                if( $the_category == 'all' || $the_category == 'projects' ) {
                    $args = array(
                        'post_type' => 'projects'
                    );
                } else {
                    $args = array(
                        'post_type' => 'projects',
                        'meta_query' => array(
                            array(
                                    'key'     => 'project_category',
                                    'value'   => $the_category,
                                    'compare' => 'LIKE'
                                )
                            )
                    );
                }
                $the_query = new WP_Query( $args );
            ?>
            
            <?php if ( have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php

                    $this_cat_image = wp_get_attachment_image_src( get_field( $the_category . '_image' ), "Work Thumbnail" );
                    if ( $this_cat_image ) {
                        $image = $this_cat_image;
                    } else {
                        $image = wp_get_attachment_image_src( get_field( 'featured_image' ), "Work Thumbnail" );
                    }
                    

                ?>
                <div class="project_item grid foursix global_hidden" title="<?php the_title(); ?>" data-order="<?php if(!$count) { echo "0"; } else { echo $count; }?>" data-completed="<?php the_field( 'date_completed' ); ?>" data-category="<?php echo implode(' ', get_field('project_category')) ; ?>" style="background-image: url(<?php echo $image[0]; ?>)">
                    <?php // print_r($image); ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="project_info">
                            <p class="title truncate"><?php the_title(); ?></p>
                        <?php if(get_field('project_category')) : ?>
                            <p class="cat truncate"><?php echo implode(', ', get_field('project_category')); ?></p>
                        <?php endif; ?>

                        <?php if(get_field('date_completed')) : ?>
                            <p class="date_completed truncate">
                                <?php
                                    the_field( 'date_completed' );
                                ?>
                            </p>
                        <?php endif; ?>  
                        </div>
                    </a>
                </div>
            <?php $count++; endwhile; endif; ?>
    </section>
</div>
<?php get_footer(); ?>