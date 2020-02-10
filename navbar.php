<nav class="navbar navbar-expand-md navbar-light bg-light">
	<span class="navbar-brand">PhosphorPHP UI</span>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbar">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item<?= (_FILE == 'index') ? ' active' : '' ?>">
				<a class="nav-link" href="index.php">Home</a>
			</li>
			<li class="nav-item<?= (_FILE == 'phosphorphp_js') ? ' active' : '' ?>">
				<a class="nav-link" href="phosphorphp_js.php">phosphorphp-ui.js</a>
			</li>
			<li class="nav-item<?= (_FILE == 'phosphorphp_css') ? ' active' : '' ?>">
				<a class="nav-link" href="phosphorphp_css.php">phosphorphp-ui.css</a>
			</li>
			<li class="nav-item dropdown autoappear">
				<a class="nav-link dropdown-toggle<?= (_FILE == 'phosphor_jscsslibs') ? ' active' : '' ?>" href="#" id="jscsslibs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Extra resources
				</a>
				<div class="dropdown-menu" aria-labelledby="jscsslibs">
					<a class="dropdown-item" href="info.php">PHP info</a>
					<a class="dropdown-item" href="login.php">Login page</a>
					<a class="dropdown-item" href="upload.php">Upload files</a>
					<a class="dropdown-item" href="webcam.php">Webcam tools</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#animatecss">AnimateCSS</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Bootstrap colorpicker</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Bootswatch</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">DataTables</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Filesizejs</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">FontAwesome</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Fullcalendar</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Highcharts</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">jQuery masked input</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">jQuery UI datepicker</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">jQuery UI interactions</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">jQuery validation</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Moment</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Moment duration format</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Moment timezone</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Reconnecting websocket</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Select2</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Simple pagination</a>
					<a class="dropdown-item" href="phosphor_jscsslibs.php#">Trumbowyg</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link<?= (_FILE == 'phosphor_php') ? ' active' : '' ?>" href="phosphor_php.php">PHP class</a>
			</li>
		</ul>
	</div>
</nav>