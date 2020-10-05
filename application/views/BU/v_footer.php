<?php
	foreach ($konfigurasiweb as $baris) {  ?>
<!-- Footer
================================================== -->
<div id="footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="<?php echo base_url();?>assets/images/<?php echo $baris->logo_web; ?>" alt="">
				<br><br>
				<p><?php echo $baris->deskripsi_web; ?></p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Link Bantuan</h4>
				<ul class="footer-links">
					<li><a href="#">Masuk</a></li>
					<li><a href="#">Daftar</a></li>
					<li><a href="#">Tentang</a></li>
					<li><a href="#">Kirim Usulan</a></li>
					<li><a href="#">Cara Kerja</a></li>
					<li><a href="#">Kontak</a></li>
					
				</ul>

				<ul class="footer-links">
					<li><a href="#">Purbalingga</a></li>
					<li><a href="#">Inspektorat</a></li>
					<li><a href="#">Dinkominfo</a></li>
					
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Kontak Kami</h4>
				<div class="text-widget">
					<span><?php echo $baris->alamat_instansi; ?></span> <br>
					Telepon: <span><?php echo $baris->notelp_instansi; ?></span><br>
					E-Mail:<span> <a href="#"><?php echo $baris->email_instansi; ?></a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="<?php echo $baris->fb_instansi; ?>"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="<?php echo $baris->twitter_instansi; ?>"><i class="icon-twitter"></i></a></li>
					<li><a class="youtube" href="<?php echo $baris->youtube_instansi; ?>"><i class="icon-youtube"></i></a></li>
				</ul>

			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2018 <?php echo $baris->nama_web; ?>. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->

<?php }?>
<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->



<!-- Scripts
================================================== -->
<!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/af2821b0/cloudflare-static/email-decode.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/chosen.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/counterup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/custom.js"></script>



	<?php 
		if ($this->uri->segment('2')=="semuaproyek" || $this->uri->segment('2')=="cari" || $this->uri->segment('2')=="proyek" || $this->uri->segment('2')=="halamanproyek" || $this->uri->segment('2')=="kategori" || $this->uri->segment('2')=="halamankategori" | $this->uri->segment('2')=="kontak") {
	?>


	<!-- Maps -->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD5aa59ZKG_M4n9XqZ5dgMHc3RDqo_loAg&amp;sensor=false&amp;language=id"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/infobox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/markerclusterer.js"></script>
	<script type="text/javascript">
	var infoBox_ratingType = 'star-rating';
	(function($) {
	    "use strict";

	    function mainMap() {
	        var ib = new InfoBox();

	        function locationData(locationURL, locationImg, locationTitle, locationAddress, locationRating, LocationPengembang) {
	            return ('' + '<a href="' + locationURL + '" class="listing-img-container">' + '<div class="infoBox-close"><i class="fa fa-times"></i></div>' + '<img src="' + locationImg + '" alt="">' + '<div class="listing-item-content">' + '<h3>' + locationTitle + '</h3>' + '<span>' + locationAddress + ', Purbalingga</span>' + '</div>' + '</a>' + '<div class="listing-content">' + '<div class="listing-title" style="font-size: 15px;">' + '<i class="im im-icon-Refinery" style="color:#f91942;"></i> ' + LocationPengembang + '</div>' + '</div>')
	        }

	        <?php 
				if ($this->uri->segment('2')!="proyek") {
					if ($this->uri->segment('2')!="kontak") {
			?>

	        var locations = [

	        <?php
			foreach ($tampilproyekall as $baris) {  ?>
	            [locationData('<?php echo base_url();?>beranda/proyek/<?php echo $baris->no_proyek; ?>', '<?php echo base_url();?>assets/images/<?php echo $baris->foto_plan_proyek; ?>', "<?php echo $baris->nama_proyek; ?>", '<?php echo $baris->lokasi_proyek; ?>', '3.5', '<?php echo $baris->nama_pengembang; ?>'), <?php echo $baris->lat; ?>, <?php echo $baris->lng; ?>, 1, '<i class="im <?php echo $baris->ikon_kategori; ?>"></i>'],
	        <?php }?>

	        ];

	        <?php }}?>

	        google.maps.event.addListener(ib, 'domready', function() {
	            if (infoBox_ratingType = 'numerical-rating') {
	                numericalRating('.infoBox .' + infoBox_ratingType + '');
	            }
	            if (infoBox_ratingType = 'star-rating') {
	                starRating('.infoBox .' + infoBox_ratingType + '');
	            }
	        });
	        var mapZoomAttr = $('#map').attr('data-map-zoom');
	        var mapScrollAttr = $('#map').attr('data-map-scroll');
	        if (typeof mapZoomAttr !== typeof undefined && mapZoomAttr !== false) {
	            var zoomLevel = parseInt(mapZoomAttr);
	        } else {
	            var zoomLevel = 5;
	        }
	        if (typeof mapScrollAttr !== typeof undefined && mapScrollAttr !== false) {
	            var scrollEnabled = parseInt(mapScrollAttr);
	        } else {
	            var scrollEnabled = false;
	        }
	        var map = new google.maps.Map(document.getElementById('map'), {
	            zoom: zoomLevel,
	            scrollwheel: scrollEnabled,
	            center: new google.maps.LatLng(-7.3214662,109.3940547),
	            mapTypeId: google.maps.MapTypeId.ROADMAP,
	            zoomControl: false,
	            mapTypeControl: false,
	            scaleControl: false,
	            panControl: false,
	            navigationControl: false,
	            streetViewControl: false,
	            gestureHandling: 'cooperative',
	            styles: [{
	                "featureType": "poi",
	                "elementType": "labels.text.fill",
	                "stylers": [{
	                    "color": "#747474"
	                }, {
	                    "lightness": "23"
	                }]
	            }, {
	                "featureType": "poi.attraction",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#f38eb0"
	                }]
	            }, {
	                "featureType": "poi.government",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#ced7db"
	                }]
	            }, {
	                "featureType": "poi.medical",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#ffa5a8"
	                }]
	            }, {
	                "featureType": "poi.park",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#c7e5c8"
	                }]
	            }, {
	                "featureType": "poi.place_of_worship",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#d6cbc7"
	                }]
	            }, {
	                "featureType": "poi.school",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#c4c9e8"
	                }]
	            }, {
	                "featureType": "poi.sports_complex",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#b1eaf1"
	                }]
	            }, {
	                "featureType": "road",
	                "elementType": "geometry",
	                "stylers": [{
	                    "lightness": "100"
	                }]
	            }, {
	                "featureType": "road",
	                "elementType": "labels",
	                "stylers": [{
	                    "visibility": "off"
	                }, {
	                    "lightness": "100"
	                }]
	            }, {
	                "featureType": "road.highway",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#ffd4a5"
	                }]
	            }, {
	                "featureType": "road.arterial",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#ffe9d2"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "all",
	                "stylers": [{
	                    "visibility": "simplified"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "weight": "3.00"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "geometry.stroke",
	                "stylers": [{
	                    "weight": "0.30"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "labels.text",
	                "stylers": [{
	                    "visibility": "on"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "labels.text.fill",
	                "stylers": [{
	                    "color": "#747474"
	                }, {
	                    "lightness": "36"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "labels.text.stroke",
	                "stylers": [{
	                    "color": "#e9e5dc"
	                }, {
	                    "lightness": "30"
	                }]
	            }, {
	                "featureType": "transit.line",
	                "elementType": "geometry",
	                "stylers": [{
	                    "visibility": "on"
	                }, {
	                    "lightness": "100"
	                }]
	            }, {
	                "featureType": "water",
	                "elementType": "all",
	                "stylers": [{
	                    "color": "#d2e7f7"
	                }]
	            }]
	        });
	        $('.listing-item-container').on('mouseover', function() {
	            var listingAttr = $(this).data('marker-id');
	            if (listingAttr !== undefined) {
	                var listing_id = $(this).data('marker-id') - 1;
	                var marker_div = allMarkers[listing_id].div;
	                $(marker_div).addClass('clicked');
	                $(this).on('mouseout', function() {
	                    if ($(marker_div).is(":not(.infoBox-opened)")) {
	                        $(marker_div).removeClass('clicked');
	                    }
	                });
	            }
	        });
	        var boxText = document.createElement("div");
	        boxText.className = 'map-box'
	        var currentInfobox;
	        var boxOptions = {
	            content: boxText,
	            disableAutoPan: false,
	            alignBottom: true,
	            maxWidth: 0,
	            pixelOffset: new google.maps.Size(-134, -55),
	            zIndex: null,
	            boxStyle: {
	                width: "270px"
	            },
	            closeBoxMargin: "0",
	            closeBoxURL: "",
	            infoBoxClearance: new google.maps.Size(25, 25),
	            isHidden: false,
	            pane: "floatPane",
	            enableEventPropagation: false,
	        };
	        var markerCluster, overlay, i;
	        var allMarkers = [];
	        var clusterStyles = [{
	            textColor: 'white',
	            url: '',
	            height: 50,
	            width: 50
	        }];
	        var markerIco;
	        for (i = 0; i < locations.length; i++) {
	            markerIco = locations[i][4];
	            var overlaypositions = new google.maps.LatLng(locations[i][1], locations[i][2]),
	                overlay = new CustomMarker(overlaypositions, map, {
	                    marker_id: i
	                }, markerIco);
	            allMarkers.push(overlay);
	            google.maps.event.addDomListener(overlay, 'click', (function(overlay, i) {
	                return function() {
	                    ib.setOptions(boxOptions);
	                    boxText.innerHTML = locations[i][0];
	                    ib.open(map, overlay);
	                    currentInfobox = locations[i][3];
	                    google.maps.event.addListener(ib, 'domready', function() {
	                        $('.infoBox-close').click(function(e) {
	                            e.preventDefault();
	                            ib.close();
	                            $('.map-marker-container').removeClass('clicked infoBox-opened');
	                        });
	                    });
	                }
	            })(overlay, i));
	        }
	        var options = {
	            imagePath: 'images/',
	            styles: clusterStyles,
	            minClusterSize: 2
	        };
	        markerCluster = new MarkerClusterer(map, allMarkers, options);
	        google.maps.event.addDomListener(window, "resize", function() {
	            var center = map.getCenter();
	            google.maps.event.trigger(map, "resize");
	            map.setCenter(center);
	        });
	        var zoomControlDiv = document.createElement('div');
	        var zoomControl = new ZoomControl(zoomControlDiv, map);

	        function ZoomControl(controlDiv, map) {
	            zoomControlDiv.index = 1;
	            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
	            controlDiv.style.padding = '5px';
	            controlDiv.className = "zoomControlWrapper";
	            var controlWrapper = document.createElement('div');
	            controlDiv.appendChild(controlWrapper);
	            var zoomInButton = document.createElement('div');
	            zoomInButton.className = "custom-zoom-in";
	            controlWrapper.appendChild(zoomInButton);
	            var zoomOutButton = document.createElement('div');
	            zoomOutButton.className = "custom-zoom-out";
	            controlWrapper.appendChild(zoomOutButton);
	            google.maps.event.addDomListener(zoomInButton, 'click', function() {
	                map.setZoom(map.getZoom() + 1);
	            });
	            google.maps.event.addDomListener(zoomOutButton, 'click', function() {
	                map.setZoom(map.getZoom() - 1);
	            });
	        }
	        var scrollEnabling = $('#scrollEnabling');
	        $(scrollEnabling).click(function(e) {
	            e.preventDefault();
	            $(this).toggleClass("enabled");
	            if ($(this).is(".enabled")) {
	                map.setOptions({
	                    'scrollwheel': true
	                });
	            } else {
	                map.setOptions({
	                    'scrollwheel': false
	                });
	            }
	        })
	        $("#geoLocation, .input-with-icon.location a").click(function(e) {
	            e.preventDefault();
	            geolocate();
	        });

	        function geolocate() {
	            if (navigator.geolocation) {
	                navigator.geolocation.getCurrentPosition(function(position) {
	                    var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	                    map.setCenter(pos);
	                    map.setZoom(12);
	                });
	            }
	        }
	    }
	    var map = document.getElementById('map');
	    if (typeof(map) != 'undefined' && map != null) {
	        google.maps.event.addDomListener(window, 'load', mainMap);
	    }

	    function singleListingMap() {
	        var myLatlng = new google.maps.LatLng({
	            lng: $('#singleListingMap').data('longitude'),
	            lat: $('#singleListingMap').data('latitude'),
	        });
	        var single_map = new google.maps.Map(document.getElementById('singleListingMap'), {
	            zoom: 15,
	            center: myLatlng,
	            scrollwheel: false,
	            zoomControl: false,
	            mapTypeControl: false,
	            scaleControl: false,
	            panControl: false,
	            navigationControl: false,
	            streetViewControl: false,
	            styles: [{
	                "featureType": "poi",
	                "elementType": "labels.text.fill",
	                "stylers": [{
	                    "color": "#747474"
	                }, {
	                    "lightness": "23"
	                }]
	            }, {
	                "featureType": "poi.attraction",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#f38eb0"
	                }]
	            }, {
	                "featureType": "poi.government",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#ced7db"
	                }]
	            }, {
	                "featureType": "poi.medical",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#ffa5a8"
	                }]
	            }, {
	                "featureType": "poi.park",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#c7e5c8"
	                }]
	            }, {
	                "featureType": "poi.place_of_worship",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#d6cbc7"
	                }]
	            }, {
	                "featureType": "poi.school",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#c4c9e8"
	                }]
	            }, {
	                "featureType": "poi.sports_complex",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#b1eaf1"
	                }]
	            }, {
	                "featureType": "road",
	                "elementType": "geometry",
	                "stylers": [{
	                    "lightness": "100"
	                }]
	            }, {
	                "featureType": "road",
	                "elementType": "labels",
	                "stylers": [{
	                    "visibility": "off"
	                }, {
	                    "lightness": "100"
	                }]
	            }, {
	                "featureType": "road.highway",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#ffd4a5"
	                }]
	            }, {
	                "featureType": "road.arterial",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "color": "#ffe9d2"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "all",
	                "stylers": [{
	                    "visibility": "simplified"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "geometry.fill",
	                "stylers": [{
	                    "weight": "3.00"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "geometry.stroke",
	                "stylers": [{
	                    "weight": "0.30"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "labels.text",
	                "stylers": [{
	                    "visibility": "on"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "labels.text.fill",
	                "stylers": [{
	                    "color": "#747474"
	                }, {
	                    "lightness": "36"
	                }]
	            }, {
	                "featureType": "road.local",
	                "elementType": "labels.text.stroke",
	                "stylers": [{
	                    "color": "#e9e5dc"
	                }, {
	                    "lightness": "30"
	                }]
	            }, {
	                "featureType": "transit.line",
	                "elementType": "geometry",
	                "stylers": [{
	                    "visibility": "on"
	                }, {
	                    "lightness": "100"
	                }]
	            }, {
	                "featureType": "water",
	                "elementType": "all",
	                "stylers": [{
	                    "color": "#d2e7f7"
	                }]
	            }]
	        });
	        $('#streetView').click(function(e) {
	            e.preventDefault();
	            single_map.getStreetView().setOptions({
	                visible: true,
	                position: myLatlng
	            });
	        });
	        var zoomControlDiv = document.createElement('div');
	        var zoomControl = new ZoomControl(zoomControlDiv, single_map);

	        function ZoomControl(controlDiv, single_map) {
	            zoomControlDiv.index = 1;
	            single_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
	            controlDiv.style.padding = '5px';
	            var controlWrapper = document.createElement('div');
	            controlDiv.appendChild(controlWrapper);
	            var zoomInButton = document.createElement('div');
	            zoomInButton.className = "custom-zoom-in";
	            controlWrapper.appendChild(zoomInButton);
	            var zoomOutButton = document.createElement('div');
	            zoomOutButton.className = "custom-zoom-out";
	            controlWrapper.appendChild(zoomOutButton);
	            google.maps.event.addDomListener(zoomInButton, 'click', function() {
	                single_map.setZoom(single_map.getZoom() + 1);
	            });
	            google.maps.event.addDomListener(zoomOutButton, 'click', function() {
	                single_map.setZoom(single_map.getZoom() - 1);
	            });
	        }
	        var singleMapIco = "<i class='" + $('#singleListingMap').data('map-icon') + "'></i>";
	        new CustomMarker(myLatlng, single_map, {
	            marker_id: '1'
	        }, singleMapIco);
	    }
	    var single_map = document.getElementById('singleListingMap');
	    if (typeof(single_map) != 'undefined' && single_map != null) {
	        google.maps.event.addDomListener(window, 'load', singleListingMap);
	    }

	    function CustomMarker(latlng, map, args, markerIco) {
	        this.latlng = latlng;
	        this.args = args;
	        this.markerIco = markerIco;
	        this.setMap(map);
	    }
	    CustomMarker.prototype = new google.maps.OverlayView();
	    CustomMarker.prototype.draw = function() {
	        var self = this;
	        var div = this.div;
	        if (!div) {
	            div = this.div = document.createElement('div');
	            div.className = 'map-marker-container';
	            div.innerHTML = '<div class="marker-container">' + '<div class="marker-card">' + '<div class="front face">' + self.markerIco + '</div>' + '<div class="back face">' + self.markerIco + '</div>' + '<div class="marker-arrow"></div>' + '</div>' + '</div>'
	            google.maps.event.addDomListener(div, "click", function(event) {
	                $('.map-marker-container').removeClass('clicked infoBox-opened');
	                google.maps.event.trigger(self, "click");
	                $(this).addClass('clicked infoBox-opened');
	            });
	            if (typeof(self.args.marker_id) !== 'undefined') {
	                div.dataset.marker_id = self.args.marker_id;
	            }
	            var panes = this.getPanes();
	            panes.overlayImage.appendChild(div);
	        }
	        var point = this.getProjection().fromLatLngToDivPixel(this.latlng);
	        if (point) {
	            div.style.left = (point.x) + 'px';
	            div.style.top = (point.y) + 'px';
	        }
	    };
	    CustomMarker.prototype.remove = function() {
	        if (this.div) {
	            this.div.parentNode.removeChild(this.div);
	            this.div = null;
	            $(this).removeClass('clicked');
	        }
	    };
	    CustomMarker.prototype.getPosition = function() {
	        return this.latlng;
	    };
	})(this.jQuery);

	</script>
	<script type="text/javascript">
			$(document).ready(function(){
				locate();
				function locate(){
	
					if ("geolocation" in navigator){
						navigator.geolocation.getCurrentPosition(function(position){ 
							var currentLatitude = position.coords.latitude;
							var currentLongitude = position.coords.longitude;
						
							document.getElementById("lat").value = currentLatitude;
							document.getElementById("lng").value = currentLongitude;
							
						});
					}
				}

				$("#datafilter").change(function(){
			    	var z = $("#datafilter").val();
				   	$("#dataproyek").load("<?php echo base_url();?>beranda/tampilproyektemp2/"+z+" #dataproyek", function(){
			           	setTimeout(refreshTable, 1000);
			        });
				});
				
		

			});
			$("#terapkanradius").click(function(){
				var z = $("#radiusnya").val();
				var clat = $("#lat").val();
				var clng = $("#lng").val();

				$("#dataproyek").load("<?php echo base_url();?>beranda/tampilproyektemp/"+z+"/"+clat+"/"+clng+" #dataproyek", function(){
		           setTimeout(refreshTable, 1000);
		        });
				    
			});
			function refreshTable(){}
</script>
	<?php } ?>



<script type="text/javascript">
	jQuery('.numeric').keyup(function () { 
    		this.value = this.value.replace(/[^0-9\.]/g,'');
		});	
			$("#notelp_pengguna").keyup(function(){
				var count = $("#notelp_pengguna").val().length;
				if(count > 10){
					alert("[No Telp] terlalu panjang, max 15 angka.");
					$("#notelp_pengguna").val("");
					$("#notelp_pengguna").focus();
				}
			});
</script>


</html>