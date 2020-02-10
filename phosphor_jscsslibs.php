<!DOCTYPE html>
<html lang="en">

<head>
	<?php require 'header.php'; ?>
	<?php require 'headercss.htm'; ?>
	<link rel="stylesheet" href="css/main_style.min.css?<?= filemtime('css/main_style.min.css') ?>" />
</head>

<body>
	<?php define("_FILE", basename(__FILE__, '.php'));
	require 'navbar.php'; ?>

	<main role="main" class="container pt-2 pb-5">
		<div class="text-center mb-5">
			<h1>Phosphor PHP</h1>
			<div class="meta">PHP classess</div>
		</div>

		<div class="row">
			<div class="col-md-3 col-12 d-none d-md-flex">
				<ul class="list-group list-group-flush list-group-docs overflow-hidden"></ul>
			</div>
			<div class="col-md-9 col-12 section-docs">
				<section id="qs">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Animate CSS</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.qs(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="sec2dhms">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Bootstrap colorpicker</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.sec2dhms(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="bytes2humanReadable">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Bootswatch</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.bytes2humanReadable(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="bits2humanReadable">
					<h2 class="font-weight-bold border-bottom overflow-hidden">DataTables</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.bits2humanReadable(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="round">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Filesizejs</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.round(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2dt">
					<h2 class="font-weight-bold border-bottom overflow-hidden">FontAwesome</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2dt(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2dtm">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Fullcalendar</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2dtm(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2td">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Highcharts</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2td(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">jQuery masked input</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">jQuery UI datepicker</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">jQuery UI interactions</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">jQuery validation</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Moment</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Moment duration format</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Moment timezone</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Reconnecting websocket</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Select2</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Simple pagination</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="uts2tmd">
					<h2 class="font-weight-bold border-bottom overflow-hidden">Trumbowyg</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.uts2tmd(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

			</div>
		</div>
	</main>

	<?php require 'footer.php'; ?>
	<?php require 'footerjs.htm'; ?>
	<script src="js/phosphordocs.min.js?<?= filemtime('js/phosphordocs.min.js') ?>"></script>
	<script type="text/javascript">
		generateSideMenu();
	</script>
</body>

</html>