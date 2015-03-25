<?php
    function just_a_test() {
        $var = get_option('blogname');
        echo "this is a test " . json_encode($var);
        exit();
    }

    function query_projects() {

        if ( isset($_GET['cat']) ) {

            $the_category = $_GET['cat'];

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
        } else {
            $args = array(
                'post_type' => 'projects'
            );
        }

        $projects_array = array();

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

        $the_query = new WP_Query( $args );

        while ( $the_query->have_posts() ) : $the_query->the_post();

            $default_image    = get_image( get_field( 'featured_image' ), "cube" );
            $category_image    = get_image( get_field( $the_category . '_image' ), "cube" );

            if($category_image) {
                $featured_image = $category_image;
            } else {
                $featured_image = $default_image;
            }

            $project_title     = get_the_title();
            $date_completed    = get_field( 'date_completed' );
            $project_category  = implode(', ', get_field('project_category'));
            $project_permalink = get_permalink();

            $projects_array[] = array(
                'project_title'     => $project_title,
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