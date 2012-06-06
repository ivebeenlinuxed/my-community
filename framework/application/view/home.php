<div id="content" class="span8">
	<div id="events" class="section">
		<h2>Events</h2>
		<?php
			$events = \Model\Event::getAll();
		?>
		<table>
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php
					for ($i=1; $i<=6; $i++) {
						$o = $events[$i];
				?>
				<tr>
					<td><?php echo $o->title; ?></td>
					<td><?php echo $o->description; ?></td>
					<td><a href="/event/<?php echo $o->id ?>" class="read-more">Read More</a></td>
				</tr>
				<?php 
					}
				?>
			</tbody>
		</table>
	</div>
	
	
	
	<h2>Organisations</h2>
	<div id="organisations" class="section">
		<div>
			<div>
				<section>
					<?php
					$orgs = \Model\Group::getAll();
					?>
					<div class="main_item">
						<article>
							<img src="/uploads/group/<?php echo $orgs[0]->id ?>_profile_pic.jpg" />
							<h2><?php echo $orgs[0]->name ?></h2>
							<div><?php echo $orgs[0]->description ?></div>
							<a href="/group/<?php echo $orgs[0]->id ?>" class="read-more">Read More</a>
						</article>
						<div></div>
					</div>
					<?php
					for ($i=1; $i<=6; $i++) {
						$o = $orgs[$i];
						?>
					<div class="secondary_item">
						<article>
							<img src="/uploads/group/<?php echo $o->id ?>_profile_pic.jpg" />
							<h2><?php echo $o->name ?></h2>
							<div><?php echo $o->description ?></div>
							<a href="/group/<?php echo $o->id ?>" class="read-more">Read More</a>
						</article>
					</div>
					<?php 
					}
					?>
					
					<div class="clear"></div>
				</section>
			</div>
		</div>
	</div>
	
	
	
	<h2>Venues</h2>
	<div id="venues" class="section">
		<div>
			<div>
				<section>
					<?php
					$venues = \Model\Venue::getAll();
					?>
					<div class="main_item">
						<article>
							<img src="/uploads/group/<?php echo $venues[0]->id ?>_profile_pic.jpg" />
							<h2><?php echo $venues[0]->name ?></h2>
							<div><?php echo $venues[0]->description ?></div>
							<a href="/group/<?php echo $venues[0]->id ?>" class="read-more">Read More</a>
						</article>
						<div></div>
					</div>
					<?php
					for ($i=1; $i<=6; $i++) {
						$o = $venues[$i];
						?>
					<div class="secondary_item">
						<article>
							<img src="/uploads/group/<?php echo $o->id ?>_profile_pic.jpg" />
							<h2><?php echo $o->name ?></h2>
							<div><?php echo $o->description ?></div>
							<a href="/group/<?php echo $o->id ?>" class="read-more">Read More</a>
						</article>
					</div>
					<?php 
					}
					?>
					
					<div class="clear"></div>
				</section>
			</div>
		</div>
	</div>
</div>