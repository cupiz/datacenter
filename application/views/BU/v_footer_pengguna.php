</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->

<!-- Scripts
================================================== -->
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
	if ($this->uri->segment('2')=="verifikasiakun") {					
?>
<script type="text/javascript">
	
	// Grab elements, create settings, etc.
	var video = document.getElementById('video');

	// Get access to the camera!
	if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
	    // Not adding `{ audio: true }` since we only want video now
	    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
	        video.src = window.URL.createObjectURL(stream);
	        video.play();
	    });
	}


	// Elements for taking the snapshot
	var canvas = document.getElementById('canvas');
	var context = canvas.getContext('2d');
	var video = document.getElementById('video');

	// Trigger photo take
	document.getElementById("snap").addEventListener("click", function() {
		context.drawImage(video, 0, 0, 425, 300);
	});
	document.getElementById("save").addEventListener("click", function() {
			var canvas = document.getElementById('canvas');
			var dataURL = canvas.toDataURL();
			$.ajax({
			  type: "POST",
			  url: "<?php echo base_url();?>pengguna/simpangambar",
			  data: { 
			     imgBase64: dataURL
			  }
			}).done(function(o) {
				window.location.replace("<?php echo base_url();?>pengguna");
			  console.log('saved'); 
			  // If you want the file to be visible in the browser 
			  // - please modify the callback in javascript. All you
			  // need is to return the url to the file, you just saved 
			  // and than put the image in your browser.
			});
	});
	
</script>
<?php } ?>

</html>