<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>

<body class="">
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 align-self-end">
					<div id="logo">
						<a href="/" class="d-block">
							<img src="<?php echo get_field( 'logo', 'options' ); ?>" class="img-fluid" alt="Logo">
						</a>
					</div>
				</div>
				<div class="col-lg d-flex align-self-center justify-content-end">
					<div id="search">
						<form role="search" method="get" id="searchform" class="row" action="<?php echo home_url( '/' ) ?>" >
							<div class="col-sm-8">
								<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" class="form-control" placeholder="Поиск..."/>
							</div>
							<div class="col-sm">
								<input type="submit" id="searchsubmit" value="Найти" class="btn btn-dark"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</header>