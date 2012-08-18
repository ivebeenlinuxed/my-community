<form class="hero-unit" id="big_search" action="/search" method="get">
  <h1>I am looking for...</h1>
  <p><select class="span3" id="search_type" name="type"><option value="event">Events</option><option value="group">Groups</option><option value="place">Places</option></select> near <span class="control-group"><input class="span3" type="text" id="location" placeholder="Anywhere..." /></span></p>
  <input type="hidden" name="lat" id="search_lat" />
  <input type="hidden" name="lng" id="search_lng" />
  <p> related to <input type="text" class="span6" id="search_keywords" name="q" placeholder="Dance, Music, Cards?" /></p>
  <p class="pull-right">
    <input type="submit" class="btn btn-primary btn-large" name="list" value="View a list">
    <input type="submit" class="btn btn-success btn-large" name="map" value="View a map">
  </p>
  	<div id="counter">
  		<div>
  			<p class="position">
  				<span class="digit static">1</span>
  			</p>
  		</div>
  		<div>
  			<p class="position">
  				<span class="digit static">2</span>
  			</p>
  		</div>
  		<div>
  			<p class="position">
  				<span class="digit static">3</span>
  			</p>
  		</div>
  		<div>
  			<p class="position">
  				<span class="digit static">4</span>
  			</p>
  		</div>
  		<span>Results Found</span>
  	</div>
</form>
<?php
$r = srand(date("Ymd"));
$c = \Model\Group::Count();
?>
<h2>Today's Featured Group: </h2>

<h2>Events Happening Today</h2>