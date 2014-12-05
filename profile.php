
<?php 
/*
    Template Name: Profile Page
*/
get_header(); ?>
<div class="wait global_hidden">
    <header class="profile-nav tablet_nav_shrunk">
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
    <article class="section_anchor" style="background-image: url('<?php get_image(get_field('banner_bg_image'),"full"); ?>')">
        <div class="vertical_center_parent">
            <p class="vertical_center"><?php the_field("banner_title") ?></p>
            <div class="divhelper"></div>
        </div>
    </article>
    <section id="profile">
        <article class="firm_description">
            <div>
                <?php the_field("profile") ?>
            </div>
        </article>
    </section>
</div>
<?php get_footer(); ?>