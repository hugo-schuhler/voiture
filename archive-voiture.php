<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package voiture
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php
			/* Start the Loop */
            while ( have_posts() ) :
                
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
                get_template_part( 'template-parts/content', get_post_type() );?>
                
                <p>Dimension: <?php echo get_post_meta( $post->ID, 'dimension', true ); ?>m (formart: L*l*h) </p>
                <p>Année: <?php echo get_post_meta( $post->ID, 'annee', true ); ?></p>
				<p>Cylindrée: <?php echo get_post_meta( $post->ID, 'cylindree', true ); ?></p>
                <?php the_terms( $post->ID, 'marque', 'Marque : ' ); ?><br>
                <?php the_terms( $post->ID, 'couleur', 'Couleur : ' ); ?><br>
                <?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
