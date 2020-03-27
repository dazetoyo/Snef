<div id="increase-imagemap-building-modal" data-backdrop="static" aria-hidden="true" class="modal <?php /*fade */?>fade" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="modal-content">
			<?php /*
			<div class="modal-hover">
				<div id="preloader" class="">
					<span class="display-table">
						<span class="display-table-cell">
							<div class="sk-circle">
							  <div class="sk-circle1 sk-child"></div>
							  <div class="sk-circle2 sk-child"></div>
							  <div class="sk-circle3 sk-child"></div>
							  <div class="sk-circle4 sk-child"></div>
							  <div class="sk-circle5 sk-child"></div>
							  <div class="sk-circle6 sk-child"></div>
							  <div class="sk-circle7 sk-child"></div>
							  <div class="sk-circle8 sk-child"></div>
							  <div class="sk-circle9 sk-child"></div>
							  <div class="sk-circle10 sk-child"></div>
							  <div class="sk-circle11 sk-child"></div>
							  <div class="sk-circle12 sk-child"></div>
							</div>
						</span>
					</span>
				</div>
			</div> */?>
			<div class="modal-content-desc" id="modal-content-desc">
				<button type="button" class="close-modal bg-danger text-light" data-dismiss="modal">&times;</button>
				<div id="increase-imagemap-building-modal-content">
				
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	jQuery(document).ajaxComplete(function(){
		jQuery('#increase-imagemap-building-modal .modal-hover').addClass('hidden-modal');
	});
	
	jQuery(document).ready(function($){
		
		jQuery(".modal").on('show.bs.modal', function (e) {
			
			activeModal = jQuery(e.relatedTarget).data('id');
			
			jQuery.post(
				"<?php echo admin_url( 'admin-ajax.php' ) ?>",
				{
					'action': 'increase_imagemap_building_modal_open',
					'post_id' : activeModal
				},
				function(response) {
					if(typeof response === 'object'){
						jQuery('#increase-imagemap-building-modal #increase-imagemap-building-modal-content').html(response.content);
					}
				}
			);
			
		});
		
		jQuery(".modal").on('hide.bs.modal', function (e) {
			jQuery('#increase-imagemap-building-modal #increase-imagemap-building-modal-content').html('');
			jQuery('#modal-content .modal-hover').removeClass('hidden-modal');
		});
	});
	
	
	function testAnim(x) {
		jQuery('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
	};
	jQuery('#increase-imagemap-building-modal').on('show.bs.modal', function (e) {
		testAnim('fadeInUpBig'); // alte variante: zoomIn, fadeIn
	})
	jQuery('#increase-imagemap-building-modal').on('hide.bs.modal', function (e) {
		testAnim('fadeOut');
	})

</script>