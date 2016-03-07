		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Title &raquo; START</a>
				</div>
				<div class="navbar-collapse collapse navbar-responsive-collapse">
					<ul class="nav navbar-nav">
						<li<?php if(_FILE == "main"){echo ' class="active"';} ?>><a href="#">Inicio</a></li>
						<li<?php if(_FILE == "section"){echo ' class="active"';} ?>><a href="#">Section</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <i class="caret"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Drop1</a></li>
								<li class="divider"></li>
								<li><a href="#">Drop2</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Login</a></li>
						<li class="active"><a href="#">Active</a></li>
					</ul>
				</div>
			</div>
		</nav>
		