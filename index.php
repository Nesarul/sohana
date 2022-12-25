<?php require_once('./inc/header.php'); ?>
<div class="col-12">
	<h1>Camera</h1>
	<div class="row">
		<div class="col-12 col-sm-6 col-md-3">
			<video autoplay id="video"></video>
			
			<button class="btn btn-success" id="btnScreenshot">
				<span class="icon is-small">
					<i class="bi bi-camera"></i>
				</span>
			</button>
			<!-- <button class="btn btn-success" id="btnScreenshot">
				<span class="icon is-small">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
						<path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
						<path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
					</svg>
				</span>
			</button> -->
			
		</div>
		<div class="col-12 col-sm-6 col-md-3">
		<h2 class="title">Screenshots</h2>
		<div id="screenshots"></div>
		</div>
	</div>
</div>

<?php require_once("./inc/footer.php"); ?>