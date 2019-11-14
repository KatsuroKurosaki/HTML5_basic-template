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
				<a class="nav-link dropdown-toggle<?= (_FILE == 'phosphor_jslibs') ? ' active' : '' ?>" href="#" id="jscsslibs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Extra JS/CSS
				</a>
				<div class="dropdown-menu" aria-labelledby="jscsslibs">
					<a class="dropdown-item" href="phosphor_jslibs.php#animatecss">AnimateCSS</a>
					<a class="dropdown-item" href="phosphor_jslibs.php#animatecss">Font Awesome</a>
					<a class="dropdown-item" href="phosphor_jslibs.php#animatecss">MomentJS</a>
					<a class="dropdown-item" href="phosphor_jslibs.php#animatecss">Select2</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link<?= (_FILE == 'phosphor_php') ? ' active' : '' ?>" href="phosphor_php.php">PHP class</a>
			</li>
		</ul>
	</div>
</nav>