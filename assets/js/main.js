(function () {
    if (
        !"mediaDevices" in navigator ||
        !"getUserMedia" in navigator.mediaDevices
    ) {
        alert("Camera API is not available in your browser");
        return;
    }
  
    // get page elements
    const video = document.querySelector("#video");
    const btnScreenshot = document.querySelector("#btnScreenshot");
    const screenshotsContainer = document.querySelector("#screenshots");
    const canvas = document.querySelector("#canvas");
  
    // video constraints
    const constraints = {
        video: {
            width: {
                min: 200,
                ideal: 200,
                max: 200,
            },
            height: {
                min: 200,
                ideal: 200,
                max: 200,
            },
        },
    };
    
    // current video stream
    let videoStream;
  
    // take screenshot
    btnScreenshot.addEventListener("click", function () {
      const img = document.createElement("img");
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      canvas.getContext("2d").drawImage(video, 0, 0);
      img.src = canvas.toDataURL("image/png");
      screenshotsContainer.prepend(img);
    });
  
    // stop video stream
    function stopVideoStream() {
        if (videoStream) {
            videoStream.getTracks().forEach((track) => {
            track.stop();
            });
        }
    }
  
    // initialize
    async function initializeCamera() {
        stopVideoStream();
        constraints.video.facingMode = "environment";
    
        try {
            videoStream = await navigator.mediaDevices.getUserMedia(constraints);
            video.srcObject = videoStream;
        } catch (err) {
            alert("Could not access the camera");
        }
    }
    
        initializeCamera();
  })();
  