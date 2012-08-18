<div class="<?php echo $controller->getCSSString(); ?>" id="<?php echo $controller->id ?>">
	<?php 
	foreach ($data as $d) {
		$d->Render();
	}
	?>
	
	<div class="clear"></div>
	<?php
	for ($i = 0; $i<$pagination->getPages(); $i++) {
		$link = call_user_func_array($controller->paginationLink, array($i, $controller));
		if ($i != $controller->page) {
			echo "<a href='$link' data-pjax-replace data-pjax='#{$controller->id}'>";
		} else {
			echo "<strong>";
		}
		
		echo ($i+1);
		
		if ($i != $controller->page) {
			echo "</a>";
		} else {
			echo "</strong>";
		}
		if ($i != $pagination->getPages()-1) {
			echo "&nbsp;|&nbsp;";
		}
	}
	?>
</div>

