
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
    <div class="profile_breadcrumbs">
        <div>
            <p><span><?php $parent_title = get_the_title($post->post_parent); echo $parent_title;?></span> / <span><?php wp_title( '', true ); ?></span></p>
        </div>
    </div>
    <section id="profile">
        <article class="short">
            <p><?php the_field("banner_title") ?></p>
        </article>
        <article class="firm_description">
            <p><?php the_field("profile") ?></p>
        </article>
        <article class="profile_images">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        ?>
        <?php $images = get_field('profile_images');
    
        if( $images ): ?>
                <?php foreach( $images as $image ): 
                    // print_r($image);
                    $attachment_id = $image['id'];
                    $size = "grid";

                    $sized_image = wp_get_attachment_image_src( $attachment_id, $size );

                    ?>
                    <div class="square quarter profile_image" style="background-image: url('<?php echo $sized_image[0]; ?>')"></div>

                <?php endforeach; ?>
        <?php endif; endwhile; endif; ?>
        </article>
    </section>
</div>
<?php get_footer(); ?>