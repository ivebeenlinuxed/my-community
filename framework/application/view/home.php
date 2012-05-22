<div id="home_carousel_outer">
	<div class="carousel slide" id="home_carousel" data-toggle="carousel">
	  <!-- Carousel items -->
	  <div class="carousel-inner">
	    <div class="item active">
	    	<img src="/images/home_image_1.jpg" />
	    	<div class="carousel-caption">
	    	<h4>Welcome to My Community</h4>
	    	<p>My Community is a community driven site to tell you what's on in Lichfield. It relies on a combination volunteers and scrapers to add new clubs and events.</p>
	    	</div>
	    </div>
	    <div class="item">
	    	ITEM 2
	    	<div class="carousel-caption">
	    	<h4>Title</h4>
	    	<p>Description</p>
	    	</div>
	    </div>
	    <div class="item">
	    	Search
	    </div>
	  </div>
	  <!-- Carousel nav -->
	  <a class="carousel-control left" href="#home_carousel" data-slide="prev">&lsaquo;</a>
	  <a class="carousel-control right" href="#home_carousel" data-slide="next">&rsaquo;</a>
	</div>
</div>


<h2>Events</h2>
<div id="events" class="section">
	<div>
		<div>
			<section>
				<?php
				$events = \Model\Event::getAll();
				?>
				<div class="main_item">
					<article>
						<img src="/uploads/event/<?php echo $events[0]->id ?>_profile_pic.jpg" />
						<h2><?php echo $events[0]->title ?></h2>
						<div><?php echo $events[0]->description ?></div>
						<a href="/event/<?php echo $events[0]->id ?>" class="read-more">Read More</a>
					</article>
					<div></div>
				</div>
				<?php
				for ($i=1; $i<=6; $i++) {
					$o = $events[$i];
					?>
				<div class="secondary_item">
					<article>
						<img src="/uploads/event/<?php echo $o->id ?>_profile_pic.jpg" />
						<h2><?php echo $o->title ?></h2>
						<div><?php echo $o->description ?></div>
						<a href="/event/<?php echo $o->id ?>" class="read-more">Read More</a>
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