<!DOCTYPE html>
<html lang="en">

<head>
	<?php require 'header.php'; ?>
	<?php require 'headercss.htm'; ?>
	<link href="css/main_style.min.css?<?= filemtime('css/main_style.min.css') ?>" type="text/css" rel="stylesheet" />
</head>

<body>
	<?php define("_FILE", basename(__FILE__, '.php'));
	require 'navbar.php'; ?>

	<main role="main" class="container pt-2 pb-5">
		<div class="text-center mb-5">
			<h1>PhosphorPHP-JS</h1>
			<div class="meta">jQuery plugin features</div>
		</div>

		<div class="row">
			<div class="col-md-3 col-12 d-none d-md-flex">
				<ul class="list-group list-group-flush list-group-docs overflow-hidden"></ul>
			</div>
			<div class="col-md-9 col-12 section-docs">
				<section id="qs">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.qs(<i>key</i>);</h2>
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
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.sec2dhms(<i>sec</i>);</h2>
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
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.bytes2humanReadable(<i>sec</i>);</h2>
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
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.bits2humanReadable(<i>sec</i>);</h2>
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
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.round(<i>sec</i>);</h2>
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
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.uts2dt(<i>sec</i>);</h2>
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
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.uts2dtm(<i>sec</i>);</h2>
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
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.uts2td(<i>sec</i>);</h2>
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
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.uts2tmd(<i>sec</i>);</h2>
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

				<section id="ip2num">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.ip2num(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.ip2num(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="num2ip">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.num2ip(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.num2ip(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="isValidDate">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.isValidDate(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.isValidDate(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="htmlEntities">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.htmlEntities(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.htmlEntities(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="calculateAspectRatio">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.calculateAspectRatio(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.calculateAspectRatio(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="setData">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.setData(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.setData(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="getData">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.getData(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.getData(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="removeData">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.removeData(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.removeData(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="clearData">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.clearData(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.clearData(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="isNullData">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.isNullData(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.isNullData(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="getDataSize">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.getDataSize(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.getDataSize(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="setSessionData">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.setSessionData(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.setSessionData(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="getSessionData">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.getSessionData(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.getSessionData(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="removeSessionData">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.removeSessionData(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.removeSessionData(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="clearSessionData">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.clearSessionData(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.clearSessionData(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="isSessionNullData">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.isSessionNullData(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.isSessionNullData(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="getSessionDataSize">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.getSessionDataSize(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.getSessionDataSize(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="randomInt">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.randomInt(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.randomInt(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="randomString">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.randomString(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.randomString(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="randomUUID">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.randomUUID(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.randomUUID(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="randomHex">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.randomHex(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.randomHex(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="spawnPrinter">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.spawnPrinter(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.spawnPrinter(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="api">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.api(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.api(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="upload">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.upload(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.upload(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="head">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.head(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.head(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="websocket">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.websocket(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.websocket(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="spawnSpinner">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.spawnSpinner(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.spawnSpinner(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="removeSpinner">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.removeSpinner(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.removeSpinner(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="spawnModal">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.spawnModal(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.spawnModal(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="spawnRemoteModal">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.spawnModal(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.spawnRemoteModal(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="removeModal">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.removeModal(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.removeModal(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="spawnAlert">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.spawnAlert(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.spawnAlert(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="removeAlert">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$.removeAlert(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$.removeAlert(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="serializeForm">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$().serializeForm(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$().serializeForm(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="runNumber">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$().runNumber(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$().runNumber(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="imageThumbnailer">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$().imageThumbnailer(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$().imageThumbnailer(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="renameAttr">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$().renameAttr(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$().renameAttr(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="SVGinliner">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$().SVGinliner(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$().SVGinliner(<i>key</i>);</kbd>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<h4>key</h4>
									<label>Returns the specified value from querystring. Returns null if not found.</label>
								</li>
							</ul>
						</div>
				</section>

				<section id="attrToObject">
					<h2 class="font-weight-bold border-bottom overflow-hidden">$().attrToObject(<i>sec</i>);</h2>
					<div class="row">
						<div class="col-12 col-sm-6">
							<p>Useful function to retrieve values from the URL quesrystring.</p>
						</div>
						<div class="col-12 col-sm-6">
							<kbd class="d-block">$().attrToObject(<i>key</i>);</kbd>
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
	<script src="js/functions.min.js?<?= filemtime('js/functions.min.js') ?>" type="text/javascript" charset="UTF-8"></script>
	<script type="text/javascript">
		generateSideMenu();
	</script>
</body>

</html>