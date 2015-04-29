<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.png" />
        <title>
            <?php
                wp_title( '-', true, 'right');
                bloginfo( 'name' );
            ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=yes" />
        <?php wp_head(); ?>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-50963405-1', 'pbdw.com');
          ga('send', 'pageview');
        </script>
    </head>
    <body>
        <div class="wrap">
          <?php 
            $the_post_type = get_post_type();
            if ( $the_post_type == "projects" ) {
              $nav_class = "dark_transparent";
            } else if ( $the_post_type == "team" ) {
              $nav_class = "projects";
            } else if ( is_page("home") || is_page("expertise") ) {
              $nav_class = "home";
            } else if ( is_page("projects") ) {
              $nav_class = "projects";
            }
          ?>
          <!-- solid bar condition for team single. should probably grab post type -->
          <div id="header_container" class="<?php echo $nav_class; ?>">
            <header>
                <div class="logo_container header_expanded">
                    <h1 class="black"><a href="<?php echo home_url(); ?>">PBDW <span>ARCHITECTS</span></a></h1>
                </div>
                <nav class="main_nav inactive vertical_center_parent" data-state="0">
                    <a class="nav_btn"></a>
                    <?php
                            $args = array(
                                'menu' => 'main-menu',
                                'echo' => false,
                                'container_class' => 'menu-primary-navigation-container'
                            );
                            // echo wp_nav_menu( $args );
                            wp_nav_menu(array(
                                'container'       => 'div',
                                'container_class' => 'nav_container',
                                'menu_class' => 'active'
                            )); 
                        ?>
                </nav>
            </header>
          </div>
          <?php if(is_page("projects") || is_page("contact")): ?>
            <div class="header_ghost"></div>
          <?php endif; ?>