<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "list" ); ?>'><?php echo Html::anchor('page/list','List');?></li>
	<li class='<?php echo Arr::get($subnav, "view" ); ?>'><?php echo Html::anchor('page/view','View');?></li>
	<li class='<?php echo Arr::get($subnav, "revision" ); ?>'><?php echo Html::anchor('page/revision','Revision');?></li>
	<li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('page/edit','Edit');?></li>
	<li class='<?php echo Arr::get($subnav, "delete" ); ?>'><?php echo Html::anchor('page/delete','Delete');?></li>

</ul>
<p>Edit</p>