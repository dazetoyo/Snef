<?php
$home_multipe_buildings = esc_attr(get_field('increase_imagemap_multiple_buildings', 'option'));
$home_multipe_buildings_floors = esc_attr(get_field('increase_imagemap_multiple_buildings_floors', 'option'));

$increase_imagemap_hover_fill_color = esc_attr(sanitize_hex_color_no_hash(get_field('increase_imagemap_hover_fill_color', 'option')));
$increase_imagemap_hover_fill_opacity = esc_attr(get_field('increase_imagemap_hover_fill_opacity', 'option'));
$increase_imagemap_hover_stroke_color = esc_attr(sanitize_hex_color_no_hash(get_field('increase_imagemap_hover_stroke_color', 'option')));
$increase_imagemap_hover_stroke_opacity = esc_attr(get_field('increase_imagemap_hover_stroke_opacity', 'option'));
$increase_imagemap_hover_stroke_width = esc_attr(get_field('increase_imagemap_hover_stroke_width', 'option'));

$args_tax_mobile = $args_tax = array(
	'hide_empty' => 0,
	'orderby'=>'menu_order',
	'order'=>'ASC'
);

if(!is_tax('increase_buildings')){
	
	//Theme options single building select
	$increase_imagemap_home_building = get_field('increase_imagemap_home_building', 'option');
	$termTax = 'increase_buildings';
	$termId = $increase_imagemap_home_building;
	
	if($home_multipe_buildings && !$home_multipe_buildings_floors){
		$general_image_mapping = get_field('increase_imagemap_main_image', 'option')['url'];
		$args_tax['parent'] = 0;
		$args_tax_mobile['parent'] = 0;
	}elseif($home_multipe_buildings && $home_multipe_buildings_floors){
		$general_image_mapping = get_field('increase_imagemap_main_image', 'option')['url'];
		$args_tax['childless'] = true;
		$args_tax_mobile['parent'] = 0;
	}else{
		$general_image_mapping = get_field('increase_building_floor_image', 'increase_buildings_'.$increase_imagemap_home_building)['url'];
		$args_tax['parent'] = $increase_imagemap_home_building;
		$args_tax_mobile['include'] = $increase_imagemap_home_building;
	}
	
}else{
	
	$termId = get_queried_object()->term_id;
	$termTax = get_queried_object()->taxonomy;
	$termName = get_queried_object()->name;
	
	$general_image_mapping = get_field('increase_building_floor_image', $termTax.'_'.$termId)['url'];
	$args_tax['child_of'] = $termId;
}

$mapping_query = get_terms( 'increase_buildings', $args_tax );

?>

<div class="increase-imagemap increase-imagemap-building d-none d-md-block">
	<?php if(is_tax('increase_buildings')){ ?>
		<div class="increase-imagemap-building-name">
			
			<?php echo $termName; ?>
		</div>
	<?php } ?>
	<div class="increase-imagemap-wrap">
		<div id="increase-imagemap-content" style="display: block; position: relative;">
			<img src="<?php echo $general_image_mapping; ?>" usemap="#increase-imagemap" id="increase-imagemap-image">
		</div>
		
		<map name="increase-imagemap">
			<?php foreach ($mapping_query as $term){
				$id = $term->term_id;
				$tax = $term->taxonomy;
				$name = $term->name;
				$slug = $term->slug;
				?>
				
				<?php if(!get_field('increase_building_sold_out', $tax.'_'.$id)){ ?>
					<area
						<?php if($home_multipe_buildings && !$home_multipe_buildings_floors && !is_tax('increase_buildings')){ ?>
							data-type="link"
							data-tooltip="<?php echo get_term($id)->name; ?>"
						<?php }else{ ?>
							data-toggle="modal"
							data-modal="increase-imagemap-building-modal"
							data-target="#increase-imagemap-building-modal"
							data-id="<?php echo $id; ?>"
							data-tooltip="<?php echo get_term($id)->name; ?>"
						<?php } ?>
						href="<?php echo get_term_link($id); ?>"
						data-fill-color="<?php echo $increase_imagemap_hover_fill_color; ?>"
						data-fill-opacity="<?php echo $increase_imagemap_hover_fill_opacity; ?>"
						data-stroke-color="<?php echo $increase_imagemap_hover_stroke_color; ?>"
						data-stroke-opacity="<?php echo $increase_imagemap_hover_stroke_opacity; ?>"
						data-stroke-width="<?php echo $increase_imagemap_hover_stroke_width; ?>"
						data-mapkey="area-<?php echo $id; ?>"
						shape="poly"
						coords="<?php the_field('increase_building_floor_coordinates', $tax.'_'.$id); ?>"
						title="">
				<?php } ?>
			<?php } ?>
			
			<?php if( have_rows('increase_building_other_buildings', $termTax.'_'.$termId) ){
				if(!$home_multipe_buildings || !is_front_page() ) {
					while (have_rows('increase_building_other_buildings', $termTax . '_' . $termId)): the_row();
						
						$increase_building_other_buildings_term = get_sub_field('increase_building_other_buildings_tax');
						$increase_building_other_buildings_coordinates = get_sub_field('increase_building_other_buildings_coordinates');
						
						?>
						<?php if (!get_field('increase_building_sold_out', $termTax . '_' . $increase_building_other_buildings_term)) { ?>
							<area data-type="link"
							      href="<?php echo get_term_link($increase_building_other_buildings_term); ?>"
							      data-tooltip="<?php echo get_term($increase_building_other_buildings_term)->name; ?>"
							      data-fill-color="<?php echo $increase_imagemap_hover_fill_color; ?>"
							      data-fill-opacity="<?php echo $increase_imagemap_hover_fill_opacity; ?>"
							      data-stroke-color="<?php echo $increase_imagemap_hover_stroke_color; ?>"
							      data-stroke-opacity="<?php echo $increase_imagemap_hover_stroke_opacity; ?>"
							      data-stroke-width="<?php echo $increase_imagemap_hover_stroke_width; ?>"
							      data-mapkey="area-term-<?php echo $increase_building_other_buildings_term; ?>"
							      shape="poly" coords="<?php echo $increase_building_other_buildings_coordinates; ?>"
							      title="">
						<?php } ?>
					<?php endwhile;
				}
			} ?>
		</map>
	</div>
	
	<?php if($home_multipe_buildings && !$home_multipe_buildings_floors && !is_tax('increase_buildings')){ }else{
		get_template_part( 'template-parts/imagemap/imagemap-building', 'modal' );
	} ?>
	
	<?php /*if(wp_is_mobile()){ ?>
		<div class="touch">
			<div class="touch-tablet"></div>
			<div class="touch-circle"></div>
			<div class="touch-hand-icon">
				<span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span>
			</div>
			<div class="touch-hand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/touch-hand.png" />
			</div>
		</div>
	<?php } */?>
</div>
<div class="d-md-none">
	<?php $mapping_query_mobile = get_terms( 'increase_buildings', $args_tax_mobile );
	$mapping_query_mobile_count = count($mapping_query_mobile);?>
	<div class="home-building-mobile-wrap ">
		<div class="row no-gutters">
			<?php foreach ($mapping_query_mobile as $term){
				$id = $term->term_id;
				$tax = $term->taxonomy;
				$name = $term->name;
				$slug = $term->slug;
				?>
				
				<div class="home-building-mobile <?php if($mapping_query_mobile_count > 1){echo 'col-6';}else{echo 'col';}?>">
					<a href="
					<?php
					if($mapping_query_mobile_count == 1) {
						echo get_post_type_archive_link('apartments');
					}else{
						echo get_term_link($id);
					}
					?>
						" style="background-image: url(<?php echo get_field('increase_building_floor_image', 'increase_buildings_'.$id)['sizes']['medium']; ?>)">
						<span>
							<span>
								<?php
								if($mapping_query_mobile_count == 1) {
									_e('Appartments','increase'); echo ' '.get_bloginfo('name');
								}else{
									echo $name;
								}
								?>
							</span>
						</span>
					</a>
				</div>
			
			<?php } ?>
		</div>
	</div>
</div>