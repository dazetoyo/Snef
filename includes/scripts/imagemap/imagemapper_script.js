/* ImageMapper Wordpress frontend script
*/
var Image;
var Canvas, Ctx;

jQuery(function($) {
	
	set_image_map('#increase-imagemap-image', false);
	
	$( document ).ajaxComplete(function( event,request, settings ) {
	  set_image_map('#increase-imagemap-image-floor', true);
	  
	  $('area.selected') .mapster('set',true);
	  
	});
	
	function set_image_map(mapID, click){
		
		$(document).find(mapID).each(function(){
		
		
			var areas = [];
			$('map[name="' + $(this).attr('usemap').substr(1) + '"]').find('area').each(function() {
				areas.push({
					'key': $(this).attr('data-mapkey'),
					'toolTip': $(this).attr('data-tooltip'),
					'isSelectable': false,
					'render_highlight': {
						'fillColor': $(this).attr('data-fill-color'),
						'fillOpacity': $(this).attr('data-fill-opacity'),
						'strokeColor': $(this).attr('data-stroke-color'),
						'strokeOpacity': $(this).attr('data-stroke-opacity'),
						'stroke': $(this).attr('data-stroke-width') > 0,
						'strokeWidth': $(this).attr('data-stroke-width'),
						'fade': true,
						'fadeDuration': 300
					}
				});
			});
			
			var map = this;
			$(this).mapster({
				wrapId: '#increase-imagemap-content',
				clickNavigate: click,
				showToolTip: true, // default a fost true
				toolTipClose: ['area-click','area-mouseout'],
				toolTipContainer: $('<div class="increase-imagemap-tooltip"></div>'),
				mapKey: 'data-mapkey',
				onClick: AreaClicked,
				onMouseover: function(m) {
					if(!m.options.toolTip.length)
						$(map).mapster('tooltip', false);
						
					clearTimeout($(map).data('mapster-highlight-timeout'));
					$(map).mapster('highlight', false);
					$(map).mapster('highlight', m.key);
				},
				singleSelect: false,
				render_select: {
						'fillColor': $(map).attr('data-unavailable-color'),
						'fillOpacity': $(map).attr('data-unavailable-opacity'),
						/*'strokeColor': $(this).attr('data-stroke-color'),
						'strokeOpacity': $(this).attr('data-stroke-opacity'),
						'stroke': $(this).attr('data-stroke-width') > 0,
						'strokeWidth': $(this).attr('data-stroke-width'),*/
				},
				areas: areas
			});
			
			if(window.outerWidth <= 1100){

				//Mark image map as "pulsed" if the first_time pulse option is set.
				if(imgmap.pulseOption == 'first_time')
					$(this).attr('data-first-mouseenter', true);
				
				//Prevent duplicate highlights
				$(this).mapster('highlight', false);
				//Highlight all areas
				for(var area in areas) {
					$(this).mapster('highlight', areas[area].key);
				}
				
				var map = this;
				
				// Stop highlighting after a short delay
				// Also fade highlighted areas out rather than hide them instantly
				clearTimeout($(this).data('mapster-highlight-timeout'));
				$(this).data('mapster-highlight-timeout', setTimeout(function() {
					$(map).closest('.imgmap-frontend-image').find('canvas').each(function() {
						$(this).stop().animate({ opacity: 1 }, 300, function() { $(map).mapster('highlight', false); });
					});
				}, 500));
				
			}
	
			// If pulse option is set, initialize it.
			if(imgmap.pulseOption && imgmap.pulseOption != 'never') {
				$(this).mouseenter(function(e) {
					
					//Prevent pulse from happening when mouse moves on the image map from tooltip or area. (Prevent mouseenter from "inner" elements)
					if($(e.fromElement).hasClass('increase-imagemap-tooltip') || $(e.fromElement).is('area'))
						return;
					
					//If this is set true, the pulse has been done already and Wordpress doesn't want to do it again.
					if(!$(this).attr('data-first-mouseenter')) {
						
						//Mark image map as "pulsed" if the first_time pulse option is set.
						if(imgmap.pulseOption == 'first_time')
							$(this).attr('data-first-mouseenter', true);
						
						//Prevent duplicate highlights
						$(this).mapster('highlight', false);
						//Highlight all areas
						for(var area in areas) {
							$(this).mapster('highlight', areas[area].key);
						}
						
						var map = this;
						
						// Stop highlighting after a short delay
						// Also fade highlighted areas out rather than hide them instantly
						clearTimeout($(this).data('mapster-highlight-timeout'));
						$(this).data('mapster-highlight-timeout', setTimeout(function() {
							$(map).closest('.imgmap-frontend-image').find('canvas').each(function() {
								$(this).stop().animate({ opacity: 1 }, 300, function() { $(map).mapster('highlight', false); });
							});
						}, 500));
					}
				});
			}
			//Close tooltips when clicking outside the tooltip.
			$('body').click(function(e) {
				if(!$(e.target).is('.increase-imagemap-tooltip') && !$(e.target).closest('.increase-imagemap-tooltip').length && $(e.target).attr('data-type') != 'tooltip')
					$(map).mapster('tooltip', false);
					
				if(!$(e.target).is('.imgmap-dialog-alt') && !$(e.target).closest('.imgmap-dialog-alt').length)
					$('.imgmap-dialog-alt').hide(200);
			});
			
			
		});

	}
	
	if(!imgmap.alt_dialog) {
		if($().dialog) {
			$('.imgmap-dialog-wrapper').dialog({
				autoOpen: false,
				zIndex: 10000,
				maxWidth: 700,
				width: 'auto',
				show: 300,
				dialogClass: 'imgmap-dialog',
				position: {
					of: $(parent)
					}
				});
			$('body').click(function(e) {
				if(!$(e.target).is('.ui-dialog, a') && !$(e.target).closest('.ui-dialog').length)
					$('.imgmap-dialog-wrapper').each(function(e) { $(this).dialog('close'); });
			});
		}
		else {
			if($('area[data-type="popup"]').length) {
				
				if(imgmap.admin_logged) {
					var close = $('<a>');
					close.text('Close').css( { cursor: 'pointer', float: 'right', fontSize: '0.9em' });
					close.click(function() { $('.imgmap-dialog-wrapper').text(''); });
					
					$('.imgmap-dialog-wrapper').
					html("There was a problem loading jQuery UI Dialog widget. A plugin or a theme you're using might be including its own copy of jQuery library which causes conflict with the copy included in Wordpress. Because of this ImageMapper isn't able to use jQuery UI Dialog widget causing the popup window function incorrectly or not at all.<br />This message is shown only to an admin. This message is shown because some of the image map areas on this page are using the popup functionality and thus not working properly.").
					css({ color: 'red', padding: '5px', fontSize: '0.8em' }).append(close);
				}
			}
		}
	}
	
	
	
	$('.alternative-links-imagemap').
	click(AlternativeLinkClicked).
	mouseenter(function () {
		var mapster = $($(this).attr('data-parent').replace('imgmap', '#imagemap')).get(0);
		jQuery(mapster).mapster('highlight', false);
		jQuery(mapster).mapster('highlight', $(this).attr('data-key'));
	}).
	mouseleave(function () {
		var mapster = $($(this).attr('data-parent').replace('imgmap', '#imagemap')).get(0);
		jQuery(mapster).mapster('highlight', false);
	});
	
	$('.altlinks-toggle').click(function() {
		$('#altlinks-container-' + $(this).attr('data-parent')).toggle(200);
	});
	
});



function AlternativeLinkClicked() {
	var key = jQuery(this).attr('data-key');
	var type = jQuery(this).attr('data-type');
	var parent = jQuery(this).attr('data-parent');
	AlternativeLinkAction(key, type, parent);
}

function AlternativeLinkAction(areaKey, areaType, imagemap) {
	switch(areaType) {
		case 'popup':
			OpenImgmapDialog(areaKey, jQuery('map[name="' + imagemap + '"]').get(0));
		break;
		
		case 'tooltip':
			imagemap = jQuery('img[usemap="#' + imagemap + '"]').get(0);
			jQuery(imagemap).mapster('tooltip', areaKey);
		break;
	}
}

function AreaClicked(data) {
	var type = jQuery('area[data-mapKey='+data.key+']').attr('data-type');
	
	if(type == 'popup' || type == '' ) {
		
		OpenImgmapDialog(data.key, jQuery(this).parent()[0]);
		
	}else if(type == 'link'){
		
		var href = jQuery('area[data-mapKey='+data.key+']').attr('href');
		window.location.href = href;
		
	}
}

function OpenImgmapDialog(key, parent) {
	var image = jQuery('#' + parent.name.replace('imgmap', 'imagemap'));
	var dialog = parent.name.replace('imgmap', '#imgmap-dialog');
	
	jQuery.post(imgmap.ajaxurl, {
		action: 'imgmap_load_dialog_post',
		id: key.replace('area-', '')
		}, function(response) {
			if(response.length <= 0) return;
			if(!imgmap.alt_dialog) {
					jQuery(dialog).dialog('option', 'title', jQuery('area[data-mapkey='+key+']').attr('title'));
					jQuery(dialog).html(response).dialog('open');
			} else {
				
				// Some ugly quick bug-fixing code
				// Sometimes it's needed since everything does not always make sense. Or at least seem to do.
				
				// Resets the element
				// Without this centering the element doesn't work well
				jQuery(dialog).replaceWith('<div class="imgmap-dialog-wrapper" id="' + dialog.replace('#','') + '" style="visibility:hidden"></div>').hide(0);
				
				jQuery(dialog).addClass('imgmap-dialog-alt').html(response);
				setTimeout(function() {
					jQuery(dialog).position({
						my: 'center',
						at: 'center',
						of: image
					}).
					hide().
					css({visibility:'visible'}).
					show(200);
				}, 0);
				
				
			}
	});
}

var resizeTime = 100;     // total duration of the resize effect, 0 is instant
var resizeDelay = 100; // time to wait before checking the window size again
                          // the shorter the time, the more reactive it will be.
                          // short or 0 times could cause problems with old browsers.

function resize(maxWidth,maxHeight) {
     var image =  jQuery('img[usemap]'),
        imgWidth = image.width(),
        imgHeight = image.height(),
        newWidth=0,
        newHeight=0;

    if (imgWidth/maxWidth>imgHeight/maxHeight || imgWidth/maxWidth<imgHeight/maxHeight) {
        newWidth = maxWidth;
    } else {
        newHeight = maxHeight;
    }
    
    //newWidth = maxWidth;
    image.mapster('resize',newWidth,newHeight,resizeTime);
}

// Track window resizing events, but only actually call the map resize when the
// window isn't being resized any more

function onWindowResize() {
    
    var curWidth = jQuery(window).width(),
        curHeight = jQuery(window).height(),
        checking=false;
    if (checking) {
        return;
            }
    checking = true;
    window.setTimeout(function() {
        var newWidth = jQuery(window).width(),
           newHeight = jQuery(window).height();
        if (newWidth === curWidth &&
            newHeight === curHeight) {
            resize(newWidth,newHeight);
        }
        checking=false;
    },resizeDelay );
}

jQuery(window).bind('resize',onWindowResize);