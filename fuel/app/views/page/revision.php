<table>
<?php $i = 0; foreach ($revisions as $revision): ?>
  <tr>
<?php if (0 == $i): ?>
  <td><?php echo Html::anchor($revision->title, Date::forge($revision->temporal_start)->format("%Y-%m-%d %H:%M:%S")); ?></td>
<?php else: ?>
  <td><?php echo Html::anchor($revision->title . '/revision/' . $revision->temporal_start, Date::forge($revision->temporal_start)->format("%Y-%m-%d %H:%M:%S")); ?></td>
<?php endif; ?>
    <td><?php echo empty($revision->brief) ? '' : '(' . $revision->brief . ')'; ?></td>
  </tr>
<?php $i++; endforeach; ?>
</table>
