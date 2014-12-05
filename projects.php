<?php
/*
    Template Name: Project Page
*/
get_header(); ?>
<div class="fadein global_hidden">
    <div id="header_container" class="relative">
    <header class="projects-nav tablet_nav_shrunk">
        <h1 class="black"><a href="<?php echo home_url(); ?>">PBDW <span>ARCHITECTS</span></a></h1>
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
    <?php
        global $post;
        $the_category = $post->post_name;
    ?>
    <?php if ( is_page('all') ) : ?>
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
                                    <p class="project_title"><?php the_title(); ?></p>
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
            <div class="gallery_nav_container">controllers</div>
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
<?php endif; ?>

    <!-- <?php rewind_posts(); ?> -->
    <?php wp_reset_query(); ?>
    <div class="subheader">
        <h3>
            <!-- <p>Filter: </p> -->
            <div class="cat_dropdown">
                <p class="showing"><?php echo $the_category; ?><span class="arrow-down"></span></p>
                <?php
                    $args = array(
                        'menu' => 'project_categories',
                        'echo' => false
                    );
                    echo wp_nav_menu( $args );
                ?>
            </div>
            <!-- <p>Projects</p> -->
        </h3>
    </div>
    <div class="projects_grid_breadcrumbs">
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
    </section>
</div>
<?php get_footer(); ?>