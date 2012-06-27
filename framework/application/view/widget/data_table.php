<div id="<?php echo $controller->id ?>">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<?php 
				foreach ($controller->columns as $id=>$col) {
					?>
				<th><?php echo $controller->getCellTitle($id); ?>
				</th>
				<?php 
				}
				?>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach ($data as $o) {
				?>
			<tr>
				<?php 
				foreach ($controller->columns as $colId=>$col) {
					?>
				<td><?php echo $controller->renderCell($o, $colId); ?>
				</td>
				<?php 
				}
				?>
			</tr>
			<?php 
			}
			?>
		</tbody>
	</table>
	<?php
	foreach ($data as $o) {
		foreach ($controller->hidden_columns as $colId=>$col) {
			echo $controller->renderHiddenCell($o, $colId);
		}
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
