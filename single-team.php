<?php get_header(); ?>
    <div id="header_container" class="relative">
        <header class="team-single-nav tablet_nav_shrunk">
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
    </div>
    <div class="team_breadcrumbs">
        <div>
            <p><span>TEAM</span> / <span><?php wp_title( '', true ); ?></span></p>
        </div>
    </div>
    <section id="team_page">
            <article class="member_item">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="member_info">
                    <div class="member_header">
                        <div>
                            <h3><?php the_title(); ?> <span><?php the_field( 'designation' ); ?></span></h3>
                            <p class="position"><?php the_field( 'position' ); ?></p>
                            <!-- <p class="email"><a href="mailto:<?php the_field( 'member_email' ); ?>"><?php the_field( 'member_email' ); ?></a></p> -->
                        </div>
                    </div>
                    <div class="member_description">
                        <?php if (get_field('member_copy')) : the_field( 'member_copy' ); endif; ?>
                        <?php if (get_field('member_bio_pdf')) : ?>
                            <a href="<?php the_field("member_bio_pdf") ?>" target="_blank">Download Bio <i class="icon-download"></i></a>
                        <?php endif; ?>
                    </div>
                    <div class="member_projects"></div>
                </div>
                
                <div class="member_image sixfive" style="background-image: url('<?php the_field( 'member_image' ); ?>');">
                </div>

            <?php endwhile; endif; ?>

            </article>
    </section>
    <script type="text/javascript">

    </script>
<?php get_footer(); ?>