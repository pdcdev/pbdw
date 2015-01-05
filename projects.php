<?php
/*
    Template Name: Project Page
*/
get_header(); ?>
<!-- <div class="fadein global_hidden"> -->
    <?php
        global $post;
        $the_category = $post->post_name;
    ?>
    <?php
        $args = array(
            'post_type' => 'projects',
            'meta_query' => array(
                array(
                        'key'     => 'featured',
                        'value'   => true,
                        'compare' => 'LIKE'
                    )
                )
            );
            $the_query = new WP_Query( $args );
    ?>
    <div class="featured_projects_container">
        <div class="featured_projects_flexslider">
            <ul class="slides">
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <li class="slide">
                    <div class="featured_project" style="background-image: url('<?php echo get_image( get_field("featured_image"), "full"); ?>');">
                        <div class="featured_title_container">
                            <div>
                                <div class="featured_title">
                                    <p>Featured Project</p>
                                    <p class="project_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                    <?php if(get_field('project_category')) : ?>
                                    <p class="cats"><?php echo implode(', ', get_field('project_category')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="gradient"></div>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
            <div class="gallery_nav_container"></div>
        </div>
        <div class="featured_nav">
            <div class="prev vertical_center_parent flex">
                <div class="vertical_center "><i class="icon-left-open-big"></i></div>
                <div class="divhelper"></div>
            </div>
            <div class="next vertical_center_parent flex">
                <div class="vertical_center"><i class="icon-right-open-big"></i></div>
                <div class="divhelper"></div>
            </div>
        </div>
    </div>
<?php rewind_posts(); ?>
<?php wp_reset_query(); ?>
    <section class="filter_controls">
        <div class="cat_dropdown">
            <p>Category</p>
            <div class="drop arrow-down"><span id="cat_showing">All</span>
                <div class="project_categories_container" data-state="active">
                    <ul>
                        <li id="proj_all_btn">All</li>
                        <li id="proj_cultural_btn">Cultural</li>
                        <li id="proj_commercial_btn">Commercial</li>
                        <li id="proj_education_btn">Education</li>
                        <li id="proj_preservation_btn">Preservation</li>
                        <li id="proj_residential_btn">Residential</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_list">
            <p>View By</p><span class="grid_btn active">Grid</span> <span class="list_btn">List</span>
        </div>
    </section>
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
    <section id="projects_grid" data-view="grid">

    </section>
<!-- </div> --> <!-- fadein -->
<?php get_footer(); ?>