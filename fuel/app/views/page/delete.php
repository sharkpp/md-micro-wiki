<p>Are you sure you want to delete <?php echo $page->title; ?> ?</p>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>
  <?php echo Form::submit('submit', 'Yes, Delete', array('class' => 'btn btn-danger')); ?>
  <?php echo Html::anchor(isset($page) ? $page->title : '', 'Cancel', array('class' => 'btn btn-normal')); ?>
<?php echo Form::close(); ?>
