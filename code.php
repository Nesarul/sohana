<?php
/*
"id": "rrr4z55ocneqzikepnug6xezpe",
  "version": "be04660a5b93ef2aff61e3668dedb4cbeb14941e62a3fd5998364a32d613e35e",
  "urls": {
    "get": "https://api.replicate.com/v1/predictions/rrr4z55ocneqzikepnug6xezpe",
    "cancel": "https://api.replicate.com/v1/predictions/rrr4z55ocneqzikepnug6xezpe/cancel"
  },
  "created_at": "2022-09-13T22:54:18.578761Z",
  "started_at": "2022-09-13T22:54:19.438525Z",
  "completed_at": "2022-09-13T22:54:23.236610Z",
  "source": "api",
  "status": "succeeded",
  "input": {
    "prompt": "oak tree with boletus growing on its branches"
  },
  "output": [
    "https://replicate.com/api/models/stability-ai/stable-diffusion/files/9c3b6fe4-2d37-4571-a17a-83951b1cb120/out-0.png"
  ],
  "error": null,
  "logs": "Using seed: 36941...",
  "metrics": {
    "predict_time": 4.484541
  }
*/
echo "<h1>Test here</h1>";
if(isset($_POST['status'])){
print_r($_POST);
echo("Love is a feelings");
}
?>
