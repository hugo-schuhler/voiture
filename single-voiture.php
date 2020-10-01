<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package voiture
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );?>
            <p>Dimension: <?php echo get_post_meta( $post->ID, 'dimension', true ); ?>m (formart: L*l*h) </p>
            <p>Année: <?php echo get_post_meta( $post->ID, 'annee', true ); ?></p>
            <?php the_terms( $post->ID, 'marque', 'Marque : ' ); ?><br>
            <?php the_terms( $post->ID, 'couleur', 'Couleur : ' ); ?><br>
            <?php the_terms( $post->ID, 'cylindree', 'Cylindrée : ' ); ?><br>
            <?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'voiture' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'voiture' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
