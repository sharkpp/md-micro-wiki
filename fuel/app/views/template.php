<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px; }
	</style>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
<?php $action = preg_match('!/(edit|revision|delete)(/[0-9]+)?!', '/' . Uri::string(), $match) ? $match[1] : ''; ?>
			<div class="pull-right">
				<?php echo Html::anchor('', 'Top'); ?>
				|
				<?php echo Html::anchor('list', 'List'); ?>
				||
				<?php echo '' == $action || 'list' == Uri::string() ? 'Read' : Html::anchor($name, 'Read'); ?>
				|
				<?php echo '' != $action || 'list' == Uri::string() ? 'Edit' : Html::anchor($name . '/edit', 'Edit'); ?>
				|
				<?php echo ('revision' == $action && !isset($match[2])) || ('revision' != $action && '' != $action) || 'list' == Uri::string() ? 'Revision' : Html::anchor($name . '/revision', 'Revision'); ?>
				|
				<?php echo '' != $action || '' == Uri::string() || 'list' == Uri::string() ? 'Delete' : Html::anchor($name . '/delete', 'Delete'); ?>
			</div>
			<h1><?php echo $title; ?></h1>
			<hr>
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if ('revision' == $action && isset($match[2])): ?>
			<div class="alert alert-warning">
				<p>This is an <?php echo Html::anchor($name . '/revision', 'old revision'); ?> of this page.</p>
			</div>
<?php endif; ?>
		</div>
		<div class="col-md-12">
<?php echo $content; ?>
			<hr>
		</div>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
