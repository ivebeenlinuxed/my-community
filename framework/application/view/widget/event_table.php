<div id="<?php echo $id ?>">
	<table class="table table-striped table-bordered">
		<caption>Upcoming events in Cheshire West and Chester</caption>
		<thead>
			<tr>
				<th style="width: 30%">Date and time</th>
				<th style="width: 70%">Title</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($events as $o) {
				?>
			<tr>
				<td><?php
				date_default_timezone_set('Europe/London');
				if ($o->FREQ == "WEEKLY"){
					$wkdays = array('SU'=>'Sun', 'MO'=>'Mon', 'TU'=>'Tue', 'WE'=>'Wed', 'TH'=>'Thu', 'FR'=>'Fri', 'SA'=>'Sat');
					echo "Each ".date('l', strtotime($wkdays[$o->BYDAY]))." at ".date('h:ia', $o->DTSTART);
				}
				else if ($o->FREQ == "DAILY"){
					echo "Every day at ".date('h:ia', $o->DTSTART);
				}
				?></td>
				<td><?php
				echo '<a href="/event/'.$o->id.'">';
				echo ($o->title == "") ? substr($o->description, 0, 50).'</a>...' : $o->title.'</a>';
				?></td>
			</tr>
			<?php 
			}
			?>
		</tbody>
	</table>
	<?php 
	for ($i = 0; $i<$pagination->getPages(); $i++) {
		echo "<a href='$link$i' data-pjax-replace data-pjax='#$id'>".($i+1)."</a>";
		if ($i != $pagination->getPages()-1) {
			echo "&nbsp;|&nbsp;";
		}
	}

	?>
</div>
