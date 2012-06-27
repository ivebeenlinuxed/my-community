<div class="<?php echo $controller->getCSSString(); ?>">
	<?php 
	foreach ($data as $d) {
		$d->Render();
	}
	for ($i = 0; $i<$pagination->getPages(); $i++) {
		$link = call_user_func_array($controller->paginationLink, array($i, $controller));
		echo "<a href='$link' data-pjax-replace data-pjax='#{$controller->id}'>".($i+1)."</a>";
		if ($i != $pagination->getPages()-1) {
			echo "&nbsp;|&nbsp;";
		}
	}
	?>
</div>

