<?php get_header(); ?>
<script type="text/javascript">
    if (screen.width <= 320) {
        document.location = "/mobile-home";
    }
</script>
    <div class="wait global_hidden">
        <div id="header_container">
            <header class="projects-nav tablet_nav_shrunk">
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
        <section id="notfound">
            <article>
                <p>Oops, the page you're looking for can not be found.</p>
            </article>
        </section>
    </div>
        <?php wp_footer(); ?>