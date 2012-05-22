<?php 
namespace Library\Widget;

class Events extends PageWidget {
	public $events;
	public $title = "Activities";
	
	public function __construct($events) {
		$this->events = $events;
	}
	
	public function Render() {
	?>



			<div class="widget-container" id="group_activity_widget">
				<h3 class="widget-title"><?php echo $this->title ?></h3>
				<?php if ($this->isEditMode()) { ?>
				<a class="btn add-activity">Add Activity</a>
				<?php } else { ?>
				<ul class="thumblist">
				<?php
				for ($i=0; $i<(count($this->events)<2? count($this->events) : 2); $i++) {
					$activity = $this->events[$i];
					?>
					<li>
					<h4><?php echo $activity->title ?></h4>
					<span><?php echo $activity->description ?> </span>
					<a class="read"
						href="/event/<?php echo $activity->id ?>">Read More &#187;</a></li>
						<?php
				}
				?>
				</ul>
			<?php
			if (count($this->events) > 2) {
				?>
				<div class='bcs_wsh'>More Events</div>
					<ul class="extralist">
					<?php
					for ($i=2; $i<(count($this->events)<6? count($this->events) : 6); $i++) {
						$activity = $$this->events[$i];
						?>
						<li><a href="/event/<?php echo $activity->id ?>"><?php echo $activity->title ?></a></li>
						<?php
					}
					}
					?>
					</ul>
				<?php 
				}
				?>
			</div>
			<?php 
	}
}
			?>