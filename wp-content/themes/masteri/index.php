<?php get_header() ; ?>
<?php include 'sidebar.php' ;?>
<?php include 'comments.php' ;?>
<main class="block-main">
<div id="ctl00_divCenter" class="middle-fullwidth">
                <?php get_sidebar('top-content')?>
                <section id="home-cm">
		<div class="container-fluid Module Module-199">
			<div class="ModuleContent">
				<div class="row">
				<?php thachpham_project_infor(); ?>
				</div>
			</div>
		</div>
	</section>
	<section id="home-project">
		<div class="container-fluid Module Module-200">
			<div class="ModuleContent">
				<div class="row">
				<?php thachpham_project_post(); ?>
				</div>
			</div>
		</div>
	</section>
	<section id="home-utilities">
		<div class="container-fluid Module Module-201">
			<div class="ModuleContent">
				<div class="row">
				<?php  thachpham_project_feature() ?>
				</div>
			</div>
		</div>
	</section>
	<section id="home-intro">
		<div class="container-fluid Module Module-142">
			<div class="ModuleContent">
				<div class="row"> <?php thachpham_project_images(); ?>
				</div>
			</div>
		</div>
	</section>
	<section id="home-info">
		<div class="container-fluid">
			<div class="row">
				<div
					class="box-wrapper item col-lg-4 col-sm-12 col-xs-12 Module Module-143">
					<div class="ModuleContent">
						<div class="box-info">
							<h2>
								<img class="icon"
									src="http://nhadathcm.pe.hu/wp-content/themes/masteri/images/landingpage-thong-tin-du-an-icon5.png"
									alt="">Thông tin mới
							</h2>
							<ul>
								<?php thachpham_news_post(); ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-sm-12 home-info Module Module-144">
					<div class="ModuleContent">
						<div class="row">
						<?php thachpham_project_support(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_sidebar('home-more') ?>
</div>
</main>
<?php get_footer() ; ?>