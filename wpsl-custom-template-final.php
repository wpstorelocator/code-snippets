<?php
/**
 * Example of a single WPSL store template for the Twenty Fifteen theme.
 *
 * @package Twenty_Fifteen
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php single_post_title(); ?></h1>
                </header>
                <div class="entry-content">
                <?php
                    global $post;

                    $queried_object = get_queried_object();

                    // Add the map shortcode
                    echo do_shortcode( '[wpsl_map]' );

                    // Add the content
                    $post = get_post( $queried_object->ID );
                    setup_postdata( $post );
                    the_content();
                    wp_reset_postdata();

                    // Add the address shortcode, including a directions link.
                    echo do_shortcode( '[wpsl_address directions="true"]' );

                    // Show the appointment url
                    $appointment_url = get_post_meta( $queried_object->ID, 'wpsl_appointment_url', true );

                    if ( $appointment_url ) {
                        echo '<p><a href="' . esc_url( $appointment_url ) . '">' . esc_html__( 'Make Appointment', 'wp-store-locator' ) . '</a></p>';
                    }

                    // Include the comments template
                    comments_template( 'comments.php' );
                ?>
                </div>
            </article>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
