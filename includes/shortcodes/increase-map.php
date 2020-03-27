<div id="increase-map" class="border-top border-bottom"></div>
<script>
    function initMap() {
        var uluru = {lat: <?php the_field('increase_map_center_lat','options'); ?>, lng: <?php the_field('increase_map_center_lng','options'); ?>};
        var map = new google.maps.Map(document.getElementById('increase-map'), {
            zoom: <?php the_field('increase_map_zoom','options'); ?>,
            center: uluru,
            //disableDefaultUI: true,
            mapTypeControl:true,
            styles: [
                {
                    "featureType": "administrative.country",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "stylers": [
                        {
                            "color": "#eee9e3"
                        }
                    ]
                },
                {
                    "featureType": "poi.attraction",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.business",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#d8d4ce"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.place_of_worship",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.sports_complex",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#d8d4ce"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#cdc8c3"
                        },
                        {
                            "weight": 8
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#d8d4ce"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#cdc8c3"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#f8f3ee"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.station",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.bus",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.rail",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#d8d4ce"
                        }
                    ]
                }
            ]
        });

        setMarkers(map);

        map.setTilt(40);

        function setMarkers(map) {

            <?php if (have_rows('increase_map_markers','options')) { ?>
            var markers = [
                <?php while (have_rows('increase_map_markers','options')){ the_row(); ?>
                [
                    '<div><div class="text-center"><strong><?php the_sub_field("map_markers_title"); ?></strong></div><?php if(get_sub_field("map_markers_driving") || get_sub_field("map_markers_cycling") || get_sub_field("map_markers_walking")){ ?><div class="container-fluid border-top pt-2 mt-2" style="min-width: 250px;"><div class="row"><?php if(get_sub_field("map_markers_driving")){ ?><div class="col text-center"><span class="increaseicons-car clearfix text-primary h6 mb-1"></span><?php the_sub_field("map_markers_driving"); ?> <?php _e("min","theme") ?></div><?php }; ?><?php if(get_sub_field("map_markers_cycling")){ ?><div class="col text-center"><span class="increaseicons-bicycle clearfix text-primary h4 mb-1"></span><?php the_sub_field("map_markers_cycling"); ?> <?php _e("min","theme") ?></div><?php }; ?><?php if(get_sub_field("map_markers_walking")){ ?><div class="col text-center"><span class="increaseicons-on-foot clearfix text-primary h5 mb-1"></span><?php the_sub_field("map_markers_walking"); ?> <?php _e("min","theme") ?></div><?php }; ?></div></div><?php }; ?><?php if(get_sub_field("map_markers_description")){ ?><div class="border-top pt-2 mt-2"><?php echo get_sub_field("map_markers_description"); ?></div><?php }; ?></div>',
                    <?php the_sub_field("map_markers_lat"); ?>,
                    <?php the_sub_field("map_markers_lng"); ?>,
                    '<?php echo get_sub_field("map_markers_icon")["url"]; ?>',
                    <?php echo get_sub_field("map_markers_icon")["width"]; ?>,
                    <?php echo get_sub_field("map_markers_icon")["height"]; ?>,
                ],
                <?php }; ?>
            ];
            <?php }; ?>

            /*var markers = [

                ['Parc Mogosoaia', 44.527073, 25.994295],
                ['Primaria', 44.5328619, 25.9976176]
            ];*/

            markers.reverse();

            var infowindow = new google.maps.InfoWindow();
            // Adds markers to the map.

            for (var i = 0; i < markers.length; i++) {
                var marker_item = markers[i];
                var marker = new google.maps.Marker({
                    position: {lat: marker_item[1], lng: marker_item[2]},
                    map: map,
                    //title: marker_item[0],
                    zIndex: i,


                });

                if(marker_item[3]){
                    marker.setIcon ({
                        url: marker_item[3],
                        // This marker is 20 pixels wide by 32 pixels high.
                        size: new google.maps.Size(marker_item[4], marker_item[5]),
                        scaledSize: new google.maps.Size(marker_item[4], marker_item[5]),
                        // The origin for this image is (0, 0).
                        origin: new google.maps.Point(0, 0),
                        // The anchor for this image is the base of the flagpole at (0, 32).
                        anchor: new google.maps.Point(marker_item[4]/2, marker_item[5])
                    });
                };


                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setOptions({maxWidth : 300});
                        infowindow.setContent(markers[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }

        /*var marker = new google.maps.Marker({
            position: {lat: 44.527073, lng: 25.994295},
            map: map
        });*/
    }
</script>

<script /*async defer
src="//maps.googleapis.com/maps/api/js?key=<?php the_field('increase_google_maps_api_key','options'); ?>&callback=initMap">*/
</script>
