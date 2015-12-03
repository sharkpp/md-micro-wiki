<?php if (isset($body_html)): ?>
<div class="alert alert-info">
	<p>This is only a preview; your changes have not yet been saved! → <a href="#form">Go to editing area</a></p>
</div>
<?php echo $body_html; ?>
<hr>
<?php endif ?>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset id="form">
		<div class="form-group">
			<?php echo Form::label('Body', 'body', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('body', Input::post('body', isset($page) ? $page->body : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Body')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Brief', 'brief', array('class'=>'control-label')); ?>

				<?php echo Form::input('brief', Input::post('brief', isset($page) ? $page->brief : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Brief')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
			<?php echo Form::submit('preview', 'Preview', array('class' => 'btn btn-normal')); ?>
			<?php echo Html::anchor(isset($page) ? $page->title : '', 'Cancel', array('class' => 'btn btn-normal')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
