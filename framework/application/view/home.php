		<div id="content" class="row">
			<article class="span8">
				<div id="events" class="section">
					<h2>Upcoming Events</h2>
					<form class="form-search">
						<input type="text" class="input-medium search-query span7" placeholder="Search for events near you e.g. dancing near CW8 2AB">
						<button type="submit" class="btn">Search</button>
					</form>
					<?php
						$controller->event_table();
					?>
					
				</div>
		
				<h2>Local Groups</h2>
				<div id="organisations" class="section">
					<div>
						<div>
							<form class="form-search">
								<input type="text" class="input-medium search-query span7" placeholder="Enter your postcode or a place for groups near you">
								<button type="submit" class="btn">Search</button>
							</form>
							<section class="row-fluid">
								<?php
								$orgs = \Model\Group::getAll();
								
								for ($i=1; $i<=6; $i++) {
									$o = $orgs[$i];
									?>
								<div class="org well">
									<img src="/uploads/group/<?php echo $orgs[0]->id ?>_profile_pic.jpg" width="70" />
									<h2><?php echo $orgs[0]->name ?></h2>
									<p><?php echo substr($orgs[0]->description, 0, 100); ?> <a href="/group/<?php echo $orgs[0]->id ?>" class="read-more">Read More</a></p>
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
		
