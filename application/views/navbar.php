<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="<?php echo site_url();?>">My Website</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo site_url('home');?>">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('register');?>">Register</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('register/login');?>">Login</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
									aria-expanded="false">
									Dropdown
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link disabled">Disabled</a>
							</li>
						</ul>
						<form class="form-inline my-2 my-lg-0">
							<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form>
					</div>
				</nav>
			</div>
		</div>
	</div>