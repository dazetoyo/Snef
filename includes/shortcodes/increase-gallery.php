<?php $images = explode(",", $images); ?>

<?php if($increase_display_type == 'slick_slider'){ ?>
	<div class="increase-gallery increase-gallery-slick-slider">
		<?php $i = 1; foreach( $images as $image_id ){
			$image = wp_get_attachment_url($image_id); ?>
			<div class="increase-gallery-item thumb-bg" style="background-image:url(<?php echo $image; ?>)">
				<div style="padding-top: <?php if($increase_gallery_height){echo $increase_gallery_height;}else{echo '56.25';} ?>%"></div>
			</div>
			<?php $i++; } ?>
	</div>
	<script>
		jQuery(document).ready(function($){

			var slick_slider = jQuery('.increase-gallery-slick-slider')
				.slick({
					dots: false,
					infinite: false,
					speed: 200,
					//fade: true,
					//cssEase: 'linear',
					accessibility: false,
					arrows: true,
					appendDots: false,
					autoplay: false,
					lazyLoad: 'ondemand',
					pauseOnHover: false,
					pauseOnFocus: false,
					autoplaySpeed: 7000,
					touchMove: true,
					swipe: true,
					swipeToSlide: true,

				});

			slick_slider.on('afterChange', function(event, slick, currentSlide, nextSlide, lazyInstance){
				jQuery('.lazy').Lazy();
			});
		});
	</script>
<?php }else{ ?>
	<div class="increase-gallery row no-gutters">
		<?php $i = 1; foreach( $images as $image_id ){
			$image = wp_get_attachment_url($image_id); ?>
			<div class="<?php if((($i-1) % 8 == 0) || (($i-2) % 8 == 0)){echo 'col-md-6';}else{echo 'col-md-4';}?> col-6 p-1">
				<a class="fancybox" href="<?php echo $image; ?>" data-fancybox="page-template-gallery" style="background-image:url(<?php echo $image; ?>)">

				</a>
			</div>
			<?php $i++; } ?>
	</div>
<?php } ?>
