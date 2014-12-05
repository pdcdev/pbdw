<?php
    function just_a_test() {
        $var = get_option('blogname');
        echo "this is a test " . json_encode($var);
        exit();
    }

    function query_projects() {
        if ( isset($_POST['cat']) ) {
            $the_category = $_POST['cat'];
        }
        
        $projects_array = [];

        if ( !$the_category ) {
            $args = array(
                'post_type' => 'projects'
            );
        } else {
            $args = array(
                'post_type' => 'projects',
                'meta_query' => array(
                    array(
                        'key'     => 'project_category',
                        'value'   => $the_category,
                        'compare' => 'LIKE'
                    )
                )
            );
        }
        
        $the_query = new WP_Query( $args );

        while ( $the_query->have_posts() ) : $the_query->the_post();

            $project_title     = get_the_title();
            $featured_image    = get_image( get_field( 'featured_image' ), "cube" );
            $date_completed    = get_field( 'date_completed' );
            $project_category  = get_field( 'project_category' );
            $project_permalink = get_permalink();

            // $this_post_array['project'] = array(
            //     'project_title'     => $project_title,
            //     // 'category_image'    => $category_image,
            //     'featured_image'    => $featured_image,
            //     'date_completed'    => $date_completed,
            //     'project_category'  => $project_category,
            //     'project_permalink' => $project_permalink
            // );

            $projects_array[] = array(
                'project_title'     => $project_title,
                // 'category_image'    => $category_image,
                'featured_image'    => $featured_image,
                'date_completed'    => $date_completed,
                'project_category'  => $project_category,
                'project_permalink' => $project_permalink
            );

        endwhile;

        echo json_encode($projects_array);
        
        exit();
    }

?>