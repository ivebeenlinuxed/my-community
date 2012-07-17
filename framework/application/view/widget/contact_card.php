<div class="well <?php echo $controller->getCSSString() ?>">
	<?php if ($controller->image != "") { ?>
		<img src="<?php echo $controller->image ?>" width="70" />
	<?php
	}
	?>
	<h2><?php echo $controller->title ?></h2>
	<?php foreach ($controller->sublines as $line) { ?>
	<p><?php echo $line; ?></p>
	<?php
	}
	
	if ($controller->link != "") { ?>
	 <a href="<?php echo $controller->link ?>" class="read-more">Read More</a></p>
	 <?php } ?>
	 
</div>