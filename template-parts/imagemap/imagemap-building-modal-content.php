<div class="increase-imagemap-floor-modal">
	<h2 class="title bg-dark text-light m-0 py-2 px-5">
		<?php
		$termParentName = get_term( $termParent, $termTax)->name;
		if(isset($termParentName) && $termParentName !=""){
			echo $termParentName.' ';
		}
		?> -
		<?php echo $termName; ?>
	</h2>
	
	<div class="imgmap-frontend-image">
		<?php if( have_rows('increase_imagemap_floor_legend', 'options') ){ ?>
			<div class="legenda-map bg-light p-3 border-bottom">
				<h5><?php _e('Legend:','increase'); ?></h5>
				<?php $i=1; while ( have_rows('increase_imagemap_floor_legend', 'options') ) : the_row(); ?>
					<span class="legenda-item">
						<span style="background-color: <?php the_sub_field('increase_imagemap_floor_legend_color', 'options'); ?>;"></span> <?php the_sub_field('increase_imagemap_floor_legend_title', 'options'); ?>
					</span>
					<?php $i++; endwhile; ?>
			</div>
		<?php }	?>
		
		<?php $increase_imagemap_hover_fill_color = esc_attr(sanitize_hex_color_no_hash(get_field('increase_imagemap_hover_fill_color', 'option')));
		$increase_imagemap_hover_fill_opacity = esc_attr(get_field('increase_imagemap_hover_fill_opacity', 'option'));
		$increase_imagemap_hover_stroke_color = esc_attr(sanitize_hex_color_no_hash(get_field('increase_imagemap_hover_stroke_color', 'option')));
		$increase_imagemap_hover_stroke_opacity = esc_attr(get_field('increase_imagemap_hover_stroke_opacity', 'option'));
		$increase_imagemap_hover_stroke_width = esc_attr(get_field('increase_imagemap_hover_stroke_width', 'option'));
		$increase_imagemap_unavailable_color = esc_attr(sanitize_hex_color_no_hash(get_field('increase_imagemap_unavailable_color', 'option')));
		$increase_imagemap_unavailable_opacity = esc_attr(get_field('increase_imagemap_unavailable_opacity', 'option'));
		?>
		
		<div style="display: block; position: relative;" id="increase-imagemap-container">
			<img id="increase-imagemap-image-floor"
			     class="increase-imagemap-image-floor"
			     src="<?php echo get_field('increase_building_floor_image', $termTax.'_'.$termId)['url']; ?>"
			     usemap="#increase-imagemap-floor"
			     data-unavailable-color="<?php echo $increase_imagemap_unavailable_color; ?>"
			     data-unavailable-opacity="<?php echo $increase_imagemap_unavailable_opacity; ?>"
			     style="border: 0px; position: absolute; left: 0px; top: 0px; padding: 0px; opacity: 0;">
		</div>
		
		
		<map name="increase-imagemap-floor">
			<?php
			$args_apartments = array(
				'hide_empty' => 0,
				'orderby'=>'menu_order',
				'order'=>'ASC',
				'post_type' => 'apartments',
				'posts_per_page'=> -1,
				'post_status'=> array('publish', 'private'),
				'paged' => false,
				'tax_query' => array(
					array(
						'taxonomy' => $termTax,
						'field'    => 'ID',
						'terms'    => $termId,
					),
				),
			);
			
			$query_apartments = new WP_Query( $args_apartments );
			
			if ( $query_apartments->have_posts() ){
				
				while ( $query_apartments->have_posts() ) : $query_apartments->the_post();
				
					$i = 1;
					if( have_rows('increase_apartment_variations') ){
						while( have_rows('increase_apartment_variations') ): the_row();
							//duplex
							$duplex_floor = '';
							$current_floor = '';
							if(get_sub_field('increase_apartment_variations_duplex')) {
								if(get_sub_field('increase_apartment_variations_duplex_position') === 'lower'){
									$duplex_second_floor_position = -1;
									$duplex_second_floor_position_text = "inferior";
								}else{
									$duplex_second_floor_position = 1;
									$duplex_second_floor_position_text = "superior";
								}
								
								$current_floor = get_field('increase_building_floor_level', 'floor_'.$termId);
								$duplex_main_floor = get_field('increase_building_floor_level', 'floor_'.get_sub_field('increase_apartment_variations_floor'));
								
								$duplex_floor = $duplex_main_floor + $duplex_second_floor_position;
								
							}
							
							if(($termId == get_sub_field('increase_apartment_variations_floor') || (($duplex_floor !== '') && ($current_floor !== '') && $duplex_floor == $current_floor))){
								if(get_sub_field('increase_apartment_variations_sold')){
									$area_classs = 'selected';
								}else{
									$area_classs = 'not-selected';
								}
								
								if(get_sub_field('increase_apartment_variations_entrance')){
									$area_tooltip_entrance = __('Scara: ','increase').get_sub_field('increase_apartment_variations_entrance');
								}
								
								if(get_sub_field('increase_apartment_variations_nr')){
									$area_tooltip_nr = __('Ap: ','increase').get_sub_field('increase_apartment_variations_nr');
								}
								
								if($area_tooltip_entrance && $area_tooltip_nr){
									$area_tooltip_separator = ', ';
								}
								
								$area_tooltip = '';
								
								$area_tooltip .= $area_tooltip_entrance.$area_tooltip_separator.$area_tooltip_nr;
								
								if(($duplex_floor !== '') && ($current_floor !== '') && ($duplex_floor == $current_floor)){
									$area_tooltip .= ', duplex<br/>(intrare de la '.get_term(get_sub_field('increase_apartment_variations_floor'))->name.')';
								}elseif(isset($duplex_floor) && isset($current_floor) && ($duplex_floor != $current_floor)){
									$area_tooltip .= ', duplex<br/>(continuare etaj '.$duplex_second_floor_position_text.')';
								}
								if(have_rows('increase_apartment_variations_duplex_coordinates') && ($duplex_floor !== '') && ($current_floor !== '') && ($duplex_floor == $current_floor)) {
									while( have_rows('increase_apartment_variations_duplex_coordinates') ){ the_row(); ?>
										<area class="<?php echo $area_classs; ?> selected" data-type="link"
										      href="<?php the_permalink(); ?>"
										      data-tooltip="<?php echo $area_tooltip; ?>"
										      data-fill-color="<?php echo $increase_imagemap_hover_fill_color; ?>"
										      data-fill-opacity="<?php echo $increase_imagemap_hover_fill_opacity; ?>"
										      data-stroke-color="<?php echo $increase_imagemap_hover_stroke_color; ?>"
										      data-stroke-opacity="<?php echo $increase_imagemap_hover_stroke_opacity; ?>"
										      data-stroke-width="<?php echo $increase_imagemap_hover_stroke_width; ?>"
										      data-mapkey="area-<?php echo $i; ?>-<?php the_ID(); ?>"
										      shape="poly"
										      coords="<?php the_sub_field('increase_apartment_variations_duplex_coordinates_piece'); ?>"
										      title="">
									<?php }
								}else{;
									if(have_rows('increase_apartment_variations_duplex_coordinates')){
										reset_rows();
									}
									if (have_rows('increase_apartment_variations_coordinates')) {
										while (have_rows('increase_apartment_variations_coordinates')){ the_row(); ?>
											<area class="<?php echo $area_classs; ?>"
											      data-type="link"
											      href="<?php the_permalink(); ?>"
											      data-tooltip="<?php echo $area_tooltip; ?>"
											      data-fill-color="<?php echo $increase_imagemap_hover_fill_color; ?>"
											      data-fill-opacity="<?php echo $increase_imagemap_hover_fill_opacity; ?>"
											      data-stroke-color="<?php echo $increase_imagemap_hover_stroke_color; ?>"
											      data-stroke-opacity="<?php echo $increase_imagemap_hover_stroke_opacity; ?>"
											      data-stroke-width="<?php echo $increase_imagemap_hover_stroke_width; ?>"
											      data-mapkey="area-<?php echo $i; ?>-<?php the_ID(); ?>"
											      shape="poly"
											      coords="<?php the_sub_field('increase_apartment_variations_coordinates_piece'); ?>"
											      title="">
										<?php }
									}else{
										if (have_rows('increase_apartment_coordinates')) {
											while (have_rows('increase_apartment_coordinates')){ the_row(); ?>
												<area class="<?php echo $area_classs; ?>"
												      data-type="link"
												      href="<?php the_permalink(); ?>"
												      data-tooltip="<?php echo $area_tooltip; ?>"
												      data-fill-color="<?php echo $increase_imagemap_hover_fill_color; ?>"
												      data-fill-opacity="<?php echo $increase_imagemap_hover_fill_opacity; ?>"
												      data-stroke-color="<?php echo $increase_imagemap_hover_stroke_color; ?>"
												      data-stroke-opacity="<?php echo $increase_imagemap_hover_stroke_opacity; ?>"
												      data-stroke-width="<?php echo $increase_imagemap_hover_stroke_width; ?>"
												      data-mapkey="area-<?php the_ID(); ?>"
												      shape="poly"
												      coords="<?php the_sub_field('increase_apartment_coordinates_piece'); ?>" title="">
											<?php }
										}
									}
								}
							}
							$i++;
						endwhile;
					}
				endwhile;
			}  ?>
		</map>
	</div>
</div>