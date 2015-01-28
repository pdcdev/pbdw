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
            <article id="home">
            <?php if ( have_posts() ) : ?>
                <?php $images = get_field('projects_featured');
                    if( $images ): ?>
                        <div id="homeslider" class="home-flexslider preload">
                            <ul class="slides">
                                <?php while ( have_rows('projects_featured') ) : the_row(); ?>
                                    <li class="slide">
                                        <?php $project = get_sub_field("project"); ?>
                                        <div class="" style="background-image: url( <?php echo get_image( get_sub_field('home_page_image'), "cover_nocrop"); ?> );">
                                            <div class="project_title">
                                                <a href="<?php echo get_permalink( $project->ID ); ?>">
                                                    <h3>
                                                        <?php echo $project->post_title; ?>
                                                    </h3>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif;?>
                <?php endif;  ?>
        <div class="featured_nav">
            <div class="prev vertical_center_parent flex">
                <div class="vertical_center"><i class="icon-left-open-big"></i></div>
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
<!--     <div class="cat_description">
        <div>
            <p>
                <span>Commercial</span>
                We understand the need to leverage your real estate investment or acquisition to its fullest architectural and economical potential. By tailoring our work to embody the specific needs of each client and their stakeholders, we create solutions that not only embolden their commercial presence or market dominance, but also efficiently and economically fit within their projected means for a successful return on investment.
            </p>
        </div>
    </div> -->
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