<?php 
/*
    Template Name: Office Page
*/
get_header(); ?>
<div class="wait global_hidden">
    <div class="context vertical_center_parent">
        <div class="vertical_center">
            <div class="dot profile_btn current"></div>
            <div class="dot team_btn"></div>
            <div class="dot awards_btn"></div>
            <div class="dot pub_btn"></div>
        </div>
        <div class="divhelper"></div>
    </div>
    <article id="profile_anchor" class="section_anchor" style="background-image: url('<?php echo get_image(get_field('banner_bg_image'),"full"); ?>')">
        <div class="vertical_center_parent">
            <p class="vertical_center"><?php the_field("banner_title") ?></p>
            <div class="divhelper"></div>
        </div>
    </article>
    <section id="profile">
        <article class="firm_description">
            <div>
                <?php the_field("profile"); ?>
            </div>
        </article>
    </section>
    <article id="team_anchor" class="section_anchor" style="background-image: url('<?php echo get_image(get_field('team_bg_image'),"full"); ?>')">
        <div class="vertical_center_parent">
            <p class="vertical_center"></p>
            <div class="divhelper"></div>
        </div>
    </article>
   <?php
        $args = array( 'post_type' => 'team' );

        $the_query = new WP_Query( $args );
    ?>

    <?php if ( have_posts() ) : ?>
    <div class="subsection_title">
        <h2>Leadership Team</h2>
    </div>
    <section id="team_grid">
        <article>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="team_item">
                    <a href="<?php the_permalink(); ?>"> 
                        <div class="team_item_image square" style="background-image: url(<?php echo the_field( 'member_image' ); ?>)"></div>

                        <div class="team_item_info">
                            <p><?php the_title(); ?> <span><?php the_field( 'designation' ); ?></span></p>
                            <p class="title"><?php the_field( 'position' ); ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </article>
    </section> <!-- end team_grid -->

    <?php endif; ?>
    <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <div class="subsection_title staff_title">
        <h2 class="staff_rule">Staff</h2>
    </div>
    <aside class="staff_container">
        <div>
            <div class="staff_architects">

                <h4>Staff Architects</h4>
                <?php if( get_field('staff_architects') ) : ?>
                <div class="list_container">
                <?php while( has_sub_field('staff_architects') ): ?>
                    <div class="list_item"><?php the_sub_field('name'); ?><span> <?php the_sub_field('designation'); ?></span></div>
                <?php endwhile; ?>
                </div>
                <?php endif; ?>

            </div>
            <div class="staff_architects_spillover">
                <div class="list_container">
                </div>
            </div>
            <div class="staff_communications">

                <h4>Communications</h4>
                <div class="list_container">
                <?php if( get_field('communications') ) : ?>
                    <?php while( has_sub_field('communications') ): ?>
                        <div class="list_item"><?php the_sub_field('name'); ?></div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
            <div class="staff_operations">
                <h4>Operations</h4>
                <div class="list_container">
                <?php if( get_field('operations') ) : ?>
                    <?php while( has_sub_field('operations') ): ?>
                        <div class="list_item"><?php the_sub_field('name'); ?></div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>

            </div>
        </div>
    </aside>
    <?php endwhile; endif; ?>
    <div class="gray_container">  <!-- begin gray container -->
        <div id="awards_anchor" class="subsection_title">
            <h2>Awards</h2>
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
    </div> <!-- end gray container -->
    
    <div id="pub_anchor" class="subsection_title">
        <h2>Publications</h2>
    </div>
    <section id="publications">
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <div class="publications">
            <?php if( get_field('publications') ) : ?>
                <?php while( has_sub_field('publications') ): ?>
                    <div class="pub_item">
                        <div class="pub_cover">
                            <img src="<?php the_sub_field('publication_image'); ?>" />
                        </div>
                        <a href="<?php the_sub_field('url'); ?>" target="_blank">
                            <ul class="pub_info">
                                <li><?php the_sub_field('book_name'); ?></li>
                                <li><?php the_sub_field('press'); ?></li>
                                <li><?php the_sub_field('year'); ?></li>
                            </ul>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php endif ?>
        <?php endwhile; endif; ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>