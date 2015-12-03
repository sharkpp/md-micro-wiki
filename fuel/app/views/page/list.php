<div class="row">
  <div class="col-md-6">
    <ul>
<?php for ($i = 0, $num = count($pages), $page = current($pages); $page; $i++, $page = next($pages)): ?>
      <li><?php echo Html::anchor($page->title, empty($page->title) ? '(top)' : $page->title); ?></li>
<?php if (intval(($num-1)/2) == $i): ?>
        </ul></div><div class="col-md-6"><ul>
<?php endif; ?>
<?php endfor; ?>
    </ul>
  </div>
</div>
