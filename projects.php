<?php
/*
    Template Name: Project Page
*/
get_header(); ?>
    <?php
        global $post;
        $the_category = $post->post_name;
    ?>

    <div class="featured_projects_container">

        <div class="featured_projects_flexslider">
            <ul class="slides">
                <?php while ( have_rows('pp_projects_featured') ) : the_row(); ?>
                <?php $project = get_sub_field("pp_featured_project"); ?>
                <li class="slide">
                    <a href="<?php the_permalink(); ?>">
                        <div class="featured_project" style="background-image: url('<?php echo get_image( get_sub_field("pp_project_image"), "full"); ?>');">
                            <div class="featured_title_container">
                                <div>
                                    <div class="featured_project_title">
                                        <p>Featured Project</p>
                                        <p class="project_title"><?php echo $project->post_title; ?></p>
                                        <?php if( get_field('project_category', $project->ID) ) : ?>
                                        <p class="cats"><?php echo implode(', ', the_field('project_category', $project->ID) ); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="gradient"></div>
                        </div>
                    </a>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>

        <div class="featured_nav">
            <div class="prev vertical_center_parent flex">
                <div class="vertical_center"><i class="icon-left-open-big"></i></div>
                <div class="divhelper"></div>
            </div>
            <div class="next vertical_center_parent flex">
                <div class="vertical_center"><i class="icon-right-open-big"></i></div>
                <div class="divhelper"></div>
            </div>
            <div class="featured_nav_container"></div>
        </div>
    </div>


<?php rewind_posts(); ?>
<?php wp_reset_query(); ?>
    <section class="filter_controls">
        <p class="cat_title">Categories</p>
        <div class="cats">
            <ul>
                <li id="proj_all_btn" class="selected">All</li>
                <li id="proj_cultural_btn">Cultural</li>
                <li id="proj_commercial_btn">Commercial</li>
                <li id="proj_education_btn">Education</li>
                <li id="proj_preservation_btn">Preservation</li>
                <li id="proj_residential_btn">Residential</li>
            </ul>
        </div>
        <div class="grid_list">
            <span class="grid_btn active"><i class="icon-grid-sq"></i></span> <span class="list_btn"><i class="icon-list-sq"></i></span>
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
<?php get_footer(); ?>