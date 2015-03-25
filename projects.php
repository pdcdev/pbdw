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
                    <div class="featured_project watch-orientation" style="background-image: url('<?php echo get_image( get_sub_field("pp_project_image"), "full"); ?>');">
                        <a href="<?php echo get_permalink( $project->ID ); ?>">
                            <div class="featured_title_container">
                                <div class="watch-orientation">
                                    <div class="featured_project_title">
                                        <p>Featured Project</p>
                                        <p class="project_title">
                                            <span><?php echo $project->post_title; ?></span>
                                        </p>
                                        <?php if( get_field('project_category', $project->ID) ) : ?>
                                        <p class="cats"><?php echo implode(', ', array(the_field('project_category', $project->ID)) ); ?></p>
                                        <?php endif; ?>
                                        <div class="go_to_arrow"><i class="icon-circle_arrow_right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="gradient"></div>
                    </div>
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
        <div id="all_box" class="foursix cat_box">
            <div class="project_info">
                <p class="cat_box_title">All Projects</p>
                <p class="cat_box_description">
                    PBDW's work on many of New York's most significant historic buildings has earned it a respected place in the preservation field. Projects range in scale from large to small, and include preservation, restoration, adaptive reuse, and carefully considered additions to landmarks and within landmark districts. Our skilled staff performs research, field work, master planning, conservation planning, design, and the careful integration of the latest building technologies to help ensure that these built treasures endure for future generations.
                </p>
            </div>
        </div>
    </section>
    <div id="category_stage">
        <div id="cultural_box" class="foursix cat_box">
            <div class="project_info">
                <p class="cat_box_title">Cultural</p>
                <p class="cat_box_description">
                    "PBDW's work on many of New York's most significant historic buildings has earned it a respected place in the preservation field. Projects range in scale from large to small, and include preservation, restoration, adaptive reuse, and carefully considered additions to landmarks and within landmark districts. Our skilled staff performs research, field work, master planning, conservation planning, design, and the careful integration of the latest building technologies to help ensure that these built treasures endure for future generations."
                </p>
            </div>
        </div>
        <div id="commercial_box" class="foursix cat_box">
            <div class="project_info">
                <p class="cat_box_title">Commercial</p>
                <p class="cat_box_description">
                    "Whether it be a small capital improvement for a private entity or a large commercial development for a high profile client, PBDW understands the need to leverage your real estate investment or acquisition to its fullest architectural and economical potential. By tailoring our work to embody the specific needs of each client and their stakeholders, we create solutions that not only embolden their commercial presence or market dominance, but also efficiently and economically fit within their projected means for a successful return on investment."
                </p>
            </div>
        </div>
        <div id="education_box" class="foursix cat_box">
            <div class="project_info">
                <p class="cat_box_title">Education</p>
                <p class="cat_box_description">
                    "PBDW's work on many of New York's most significant historic buildings has earned it a respected place in the preservation field. Projects range in scale from large to small, and include preservation, restoration, adaptive reuse, and carefully considered additions to landmarks and within landmark districts. Our skilled staff performs research, field work, master planning, conservation planning, design, and the careful integration of the latest building technologies to help ensure that these built treasures endure for future generations."
                </p>
            </div>
        </div>
        <div id="preservation_box" class="foursix cat_box">
            <div class="project_info">
                <p class="cat_box_title">Preservation</p>
                <p class="cat_box_description">
                    "PBDW's work on many of New York's most significant historic buildings has earned it a respected place in the preservation field. Projects range in scale from large to small, and include preservation, restoration, adaptive reuse, and carefully considered additions to landmarks and within landmark districts. Our skilled staff performs research, field work, master planning, conservation planning, design, and the careful integration of the latest building technologies to help ensure that these built treasures endure for future generations."
                </p>
            </div>
        </div>
        <div id="residential_box" class="foursix cat_box">
            <div class="project_info">
                <p class="cat_box_title">Residential</p>
                <p class="cat_box_description">
                    "PBDW's work on many of New York's most significant historic buildings has earned it a respected place in the preservation field. Projects range in scale from large to small, and include preservation, restoration, adaptive reuse, and carefully considered additions to landmarks and within landmark districts. Our skilled staff performs research, field work, master planning, conservation planning, design, and the careful integration of the latest building technologies to help ensure that these built treasures endure for future generations."
                </p>
            </div>
        </div>
    </div>
<?php get_footer(); ?>