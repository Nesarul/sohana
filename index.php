<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Capture Web camera image using WebcamJS and PHP - Theonlytutorials.com</title>
    <style type="text/css">
        body { font-family: Helvetica, sans-serif; }
        h2, h3 { margin-top:0; }
        form { margin-top: 15px; }
        form > input { margin-right: 15px; }
        #results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"></script>
</head>
<body>
    <div id="results">Your captured image will appear here...</div>
    
    <h1>Capture Web camera image using WebcamJS and PHP - Theonlytutorials.com</h1>
    <h3>Demonstrates simple 600x460 capture &amp; display</h3>
    
    <div id="my_camera"></div>
    
    <script language="JavaScript">
        Webcam.set({
            width: 600,
            height: 460,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );
    </script>
    
    <!-- A button for taking snaps -->
    <form>
        <input type=button value="Take Snapshot" onClick="take_snapshot()">
    </form>
    
    <!-- Code to handle taking the snapshot and displaying it locally -->
    <script language="JavaScript">
        function take_snapshot() {
            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                // display results in page
                
                    
                Webcam.upload( data_uri, 'saveimage.php', function(code, text) {
                    document.getElementById('results').innerHTML = 
                    '<h2>Here is your image:</h2>' + 
                    '<img src="'+text+'"/>';
                } );    
            } );
        }
    </script>
    
</body>
</html>