
<?php 
/*
    Template Name: Awards Page
*/
get_header(); ?>
<div class="wait global_hidden">
    <header class="awards-nav tablet_nav_shrunk">
        <h1>
            <a href="<?php echo home_url(); ?>">PBDW <span>ARCHITECTS</span></a>
        </h1>
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
    <div class="awards_breadcrumbs">
        <div>
            <p><span><a href="<?php echo get_permalink( 52 ); ?>">Office</a></span> / <span><?php wp_title( '', true ); ?></span></p>
        </div>
    </div>
    <section id="awards">
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php if( get_field('award_list') ) : ?>
                <?php while( has_sub_field('award_list') ): ?>
                <div class="award_group">
                    <h4><?php the_sub_field('award_name'); ?></h4>
                    <div class="award_projects">
                        <?php get_sub_field('list_of_projects'); ?>
                        <?php while(has_sub_field('list_of_projects')) : ?>
                        <div>
                            <p>
                            <?php if ( get_sub_field('the_project_url') != null) : ?>
                                <a href="<?php the_sub_field('the_project_url'); ?>">
                                <?php the_sub_field('the_project_title'); ?>
                                </a>
                            <?php else : ?>
                                <?php the_sub_field('the_project_title'); ?>
                            <?php endif; ?>
                            </p>
                            <p><?php the_sub_field('the_project_date'); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif ?>
        <?php endwhile; endif; ?>
    </section>
    <div class="awards_breadcrumbs">
        <div>
            <p><span></span><span>Publications</span></p>
        </div>
    </div>
    <section id="publications">
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <div class="publications">
            <?php if( get_field('publications') ) : ?>
                <?php while( has_sub_field('publications') ): ?>
                    <div class="pub_item">
                        <a href="<?php the_sub_field('url'); ?>" target="_blank">
                            <ul>
                                <li><?php the_sub_field('book_name'); ?></li>
                                <li><?php the_sub_field('press'); ?></li>
                                <li><?php the_sub_field('year'); ?></li>
                            </ul>
                            <div>
                                <img src="<?php the_sub_field('publication_image'); ?>" />
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php endif ?>
        <?php endwhile; endif; ?>
        </div>
    </section>
</div>
<?php get_footer(); ?>