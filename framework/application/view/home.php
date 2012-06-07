		<div id="content" class="row">
			<article class="span8">
				<div id="events" class="section">
					<h2>Events</h2>
					<?php
						$events = \Model\Event::getAll();
					?>
					<table class="table table-striped">
						<caption>Upcoming events in Cheshire West and Chester</caption>
						<thead>
							<tr>
								<th style="width:30%">Date and time</th>
								<th style="width:70%">Title</th>
							</tr>
						</thead>
						<tbody>
							<?php
								for ($i=1; $i<=42; $i++) {
									$o = $events[$i];
									//var_dump($o);
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
			</article>
			
			<div id="sidebar" class="span4">
				<h2>Sidebar</h2>
			</div>

		</div>
		
