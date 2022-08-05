<?php require_once("includes/admin_navigation.php") ?>
<?php 
$total_visits = Visit::get_all();
$comments = Comment::get_all();
$total_views = 0;
foreach($total_visits as $total_visit) {
	$total_views += $total_visit->total_views;
}

?>
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="nc-icon nc-globe text-warning"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Guests</p>
								<p class="card-title"> <?= $total_views; ?>
								<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-refresh"></i>
						Update Now
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="nc-icon nc-tag-content text-success"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Comments</p>
								<p class="card-title"> <?= count($comments) ?>
								<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-calendar-o"></i>
						Last day
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="nc-icon nc-single-02 text-danger"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Users</p>
								<p class="card-title"><?= count(User::get_all()) ?>
								<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-clock-o"></i>
						In the last hour
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="nc-icon nc-album-2 text-primary"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Wallpapers</p>
								<p class="card-title"><?= count(Photo::get_all()) ?>
								<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-refresh"></i>
						Update now
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header ">
					<h5 class="card-title">Users Behavior</h5>
					<p class="card-category">24 Hours performance</p>
				</div>
				<div class="card-body ">
					<canvas id=chartHours width="400" height="100"></canvas>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-history"></i> Updated 3 minutes ago
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card ">
				<div class="card-header ">
					<h5 class="card-title">Email Statistics</h5>
					<p class="card-category">Last Campaign Performance</p>
				</div>
				<div class="card-body ">
					<canvas id="chartEmail"></canvas>
				</div>
				<div class="card-footer ">
					<div class="legend">
						<i class="fa fa-circle text-primary"></i> Opened
						<i class="fa fa-circle text-warning"></i> Read
						<i class="fa fa-circle text-danger"></i> Deleted
						<i class="fa fa-circle text-gray"></i> Unopened
					</div>
					<hr>
					<div class="stats">
						<i class="fa fa-calendar"></i> Number of emails sent
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card card-chart">
				<div class="card-header">
					<h5 class="card-title">Website Guests</h5>
					<p class="card-category">Unique</p>
				</div>
				<div class="card-body">
					<canvas id="speedChart" width="400" height="100"></canvas>
				</div>
				<div class="card-footer">
					<div class="chart-legend">
						<i class="fa fa-circle text-warning"></i> Total 
					</div>
					<hr />
					<div class="card-stats">
						<i class="fa fa-check"></i> Data information sertified
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="footer footer-black  footer-white ">
	<div class="container-fluid">
		<div class="row">
			<nav class="footer-nav">
				<ul>
					<li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
					<li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
					<li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
				</ul>
			</nav>
			<div class="credits ml-auto">
				<span class="copyright">
					© <script>
						document.write(new Date().getFullYear())
					</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
				</span>
			</div>
		</div>
	</div>
</footer>
</div>
</div>

<?php require_once("includes/footer.php") ?>