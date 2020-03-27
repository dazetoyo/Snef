<?php get_header(); ?>
	<?php
	
	$termId = get_queried_object()->term_id;
	$termTax = get_queried_object()->taxonomy;
	$termName = get_queried_object()->name;
	$termSlug = get_queried_object()->slug;
	$termParent = get_queried_object()->parent;
	
	?>
	
	<?php if(get_field('increase_building_floor_apartments_list', $termTax.'_'.$termId) || ($termParent != 0)){ ?>
	
		include loop of apartments *******
	
	<?php }else{ ?>
		</div><!-- .container -->
		<div class="d-none d-md-block">
			<?php get_template_part( 'template-parts/imagemap/imagemap', 'building' ); ?>
		</div>
		<div class="container">
			<div class="d-md-none">
				include loop of apartments *******
			</div>
	<?php } ?>
<?php get_footer(); ?>