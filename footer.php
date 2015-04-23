    <div class="push"></div>
    </div> <!-- wrap -->
        <footer>
            <div>
                <p class="name">Platt Byard Dovell White Architects LLP <br /> All rights reserved, <?php echo date("Y"); ?><p>
                <nav class="footer_nav">
                    <?php
                        $args = array(
                            'menu' => 'main-menu',
                            'depth' => '1',
                            'echo' => false
                        );
                        echo wp_nav_menu( $args );
                    ?>
                </nav>
                <div class="backtotop">
                    <a>
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/backtotop.svg">
                    </a>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>