<div id="<?php echo $controller->id ?>">
	<table class="table table-striped table-bordered">
		<caption>Upcoming events in Cheshire West and Chester</caption>
		<thead>
			<tr>
				<?php 
				foreach ($controller->columns as $id=>$col) {
				?>
				<th><?php echo $controller->getCellTitle($id); ?></th>
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
				<td><?php echo $controller->renderCell($o, $colId); ?></td>
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
	for ($i = 0; $i<$pagination->getPages(); $i++) {
		echo "<a href='{$controller->paginationLink}$i' data-pjax-replace data-pjax='#$id'>".($i+1)."</a>";
		if ($i != $pagination->getPages()-1) {
			echo "&nbsp;|&nbsp;";
		}
	}

	?>
</div>
