<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Capture Web camera image using WebcamJS and PHP</title>
    
    <!-- Required library for webcam -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.24/webcam.js"></script>
    
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<style>
		.contain{
			width:100%;
			padding-top:56.25%;
			position:relative;
		}
		#raw-image{
			position:absolute;
			width:100%;
			height:100%;
			left:0;
			top:0;
			background-color: #000;
		}
	</style>
<div class="container">	
  <div class="row">
	<div class="col-sm-4 offset-sm-4 col-12">
		<h3>Image</h3>	
		<div class="contain">
			<div id="raw-image"></div>
			<input type="hidden" name="captured_image_data" id="captured_image_data">
		</div>
		<div id="results" >
			<img style="width: 350px;" class="after_capture_frame" src="image_placeholder.jpg" />
		</div>
		<div class="row my-3">
			<div class="col">
				<button class="btn btn-primary form-control">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
						<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
						<path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
					</svg>
					 Upload
				</button>
			</div>
			<div class="col">
				<button class="btn btn-primary form-control" onClick = "enable_Camera()">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
						<path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
						<path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
					</svg>
					 Camera
				</button>
			</div>
			<div class="col">
				<button class="btn btn-primary form-control" onClick="take_snapshot()">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
						<path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
						<path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
					</svg>
					 Capture
				</button>
			</div>
		</div>
	</div>




	<!-- <div class="col-lg-6" align="center">
		<label>Capture live photo</label>
		<div id="raw-image" class="pre_capture_frame" ></div>
		<input type="hidden" name="captured_image_data" id="captured_image_data">
		<br>
		<input type="button" class="btn btn-info btn-round btn-file" value="Take Snapshot" onClick="take_snapshot()">	
	</div> -->
	<!-- <div class="col-lg-6" align="center">
		<label>Result</label>
		<div id="results" >
			<img style="width: 350px;" class="after_capture_frame" src="image_placeholder.jpg" />
		</div>
		<br>
		<button type="button" class="btn btn-success" onclick="saveSnap()">Save Picture</button>
	</div>	 -->
  </div><!--  end row -->
</div><!-- end container -->


<script language="JavaScript">
	 // Configure a few settings and attach camera 250x187
	enable_Camera = () =>{
		Webcam.set({
			width: 320,
			height: 180,
			image_format: 'jpeg',
			jpeg_quality: 90
		});	 
		Webcam.attach( '#raw-image' );
	}
	
	// Webcam.set({
	// 	width: 320,
	// 	height: 180,
	// 	image_format: 'jpeg',
	// 	jpeg_quality: 90
	// });	 
	// Webcam.attach( '#raw-image' );
	
	function take_snapshot() {
		// take snapshot and get image data
		Webcam.snap( function(data_uri) {
			// display results in page
			document.getElementById('results').innerHTML = 
			'<img class="after_capture_frame" src="'+data_uri+'"/>';
			$("#captured_image_data").val(data_uri);
		});	 
	}

	function saveSnap(){
	var base64data = $("#captured_image_data").val();
	 $.ajax({
			type: "POST",
			dataType: "json",
			url: "capture_image_upload.php",
			data: {image: base64data},
			success: function(data) { 
				alert(data);
			}
		});
	}
</script>

</body>
</html>