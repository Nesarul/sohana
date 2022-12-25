<?php require_once("./inc/header.php"); ?>
<div class="col-12">
    <h1>Bismillahir Rahmanir Rahim</h1>
    <!-- const video = document.querySelector("#video");
    const btnPlay = document.querySelector("#btnPlay");
    const btnPause = document.querySelector("#btnPause");
    const btnScreenshot = document.querySelector("#btnScreenshot");
    const btnChangeCamera = document.querySelector("#btnChangeCamera");
    const screenshotsContainer = document.querySelector("#screenshots");
    const canvas = document.querySelector("#canvas");
    const devicesSelect = document.querySelector("#devicesSelect"); -->

    <h1 class="title">JavaScript Camera</h1>
    <video autoplay id="video"></video>
	<button class="button is-hidden" id="btnPlay">
			<span class="icon is-small">
			<i class="fas fa-play"></i>
			</span>
    </button>
    <button class="button" id="btnPause">
			<span class="icon is-small">
			<i class="fas fa-pause"></i>
			</span>
		</button>
		<button class="button is-success" id="btnScreenshot">
			<span class="icon is-small">
			<i class="fas fa-camera"></i>
			</span>
		</button>
		<button class="button" id="btnChangeCamera">
			<span class="icon">
			<i class="fas fa-sync-alt"></i>
			</span>
			<span>Switch camera</span>
		</button>
		</div>
		<div class="column">
		<h2 class="title">Screenshots</h2>
		<div id="screenshots"></div>
		</div>
</div>
<?php require_once("./inc/footer.php"); ?>