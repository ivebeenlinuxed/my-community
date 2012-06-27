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
							
							<?php 
							$controller->contact_container();
							?>
						</div>
					</div>
				</div>
		
			</article>
			
			<div id="sidebar" class="span4">
				<h2>Sidebar</h2>
				<form class="form-search">
					<input type="text" class="input-medium search-query span3" placeholder="Enter your postcode for events near you">
					<button type="submit" class="btn">Search</button>
				</form>
				<div class="map" id="home-map" style="height:370px">
					<p>MAP HERE PLEASE, showing pins for each of the events listed in the table to the left</p>
				</div>
				
				<div class="calendar"></div>
				
				<div class="facebook"></div>
				
				<div class="twitter"></div>
			</div>

		</div>
		
