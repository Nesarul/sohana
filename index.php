<?php require_once('./inc/header.php'); ?>
<div class="col-12">
	<h1>Camera</h1>
	<div class="row">
		<div class="col-12 col-sm-6 col-md-3">
			<video autoplay id="video"></video>
			
			<button class="btn btn-success" id="btnScreenshot">
				<span class="icon is-small">
				<i class="fas fa-camera"></i>
				</span>
			</button>
			
		</div>
		<div class="col-12 col-sm-6 col-md-3">
		<h2 class="title">Screenshots</h2>
		<div id="screenshots"></div>
		</div>
	</div>
</div>

<?php require_once("./inc/footer.php"); ?>