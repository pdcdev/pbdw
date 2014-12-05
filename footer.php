    <div class="push"></div>
    </div> <!-- wrap -->
        <footer>
            <div>
                <p class="name">Platt Byard Dovell White Architects LLP <br /> All rights reserved, 2014<p>
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
                <address>
                        <p>20 West 22nd Street, 17th Floor</p>
                        <p>New York, NY 10010</p>
                        <p>212 691 2440</p>
                    </address>
               <!--  <div class="backtotop">

                    <a>
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/backtotop.svg">
                    </a>
                </div> -->
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>