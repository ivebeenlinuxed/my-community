<div id="group_banner_outer">
	<div id="group_banner" style="background: url(/uploads/group/<? echo $group->id ?>_banner.jpg) top left no-repeat grey;">
	<h2><?php echo $group->name ?></h2>
	<div class="tagline"><?php echo $group->tagline ?></div>
	</div>
</div>
<?php 
if ($action == "edit") {
	?>
	<br />
<div class="alert alert-success">
  <a data-dismiss="alert" class="close">×</a>
  <h4 class="alert-heading">We're in Edit Mode!</h4>
  You've found edit mode, and it's as simple as it looks! Write, upload and change what you want, then just click the "Save" at the bottom!
  
</div>
<div class="alert warning-block">
  Your changes will await approval before publishing.
</div>
	<?php
}
?>
<div id="ajax_wrapper">
<div id="group_overview"><section>
<?php if ($action == "edit") { ?>
<div id="group_profile_image_edit" style="background: url(/uploads/group/<? echo $group->id ?>_profile_pic.jpg) no-repeat top left;">
	<div>
		<input type="file" name="profile_image" id="profile_image_edit" />
	</div>
</div>
<?php } else { ?>
<img id="group_profile_image"
	src="/uploads/group/<? echo $group->id ?>_profile_pic.jpg"
	alt="Profile Picture" />
<?php 
}

if ($action == "edit") {
	echo "<input id='group_input_name' type='text' name='name' value='".$group->name."' />";
	echo "<textarea id='group_input_description' name='description'>".$group->description."</textarea>";
} else {
?>
<h2><?php echo $group->name ?></h2>
<div class="description"><?php echo $group->description ?></div>
<?php 
}
?>
<br />
<?php

if ($group->flags &= 0x01) {
	echo "<span class='user-added label label-success'>User Added</span>";
} else {
	echo "<a data-toggle='modal' href='#auto_import_modal' class='auto-import label label-warning'>Auto Import</a>";
}
echo "&nbsp;";
if ($group->flags &= 0x02) {
	echo "<a data-toggle='modal' href='#modal_sponsor' class='tag-supporter label label-success'>Supporter</a>";
} else {
	echo "<a data-toggle='modal' href='#modal_sponsor' class='tag-not-supporter label label-info'>Not Supporter</a>";
}
//$group->flags &= 0x04 ||
if (false) {
	echo "&nbsp;<a data-toggle='modal' href='#modal_pending' class='tag-pending label label-warning'>Pending Changes</a>";
}

if ($group->rss != "") {
	echo "&nbsp;<a href='/about/supporters' class='tag-rss label label-info'>RSS</a>";
}



?>
<div class="clear"></div>
</section></div>




<div id="group_main">
	<div id="group_left">
	<!-- 
	<nav>
		<ul id="group_main_nav">
			<li><a href="#" data-type-fader="group_fader#info">News</a></li>
			<li><a href="#" data-type-fader="group_fader#events">Events</a></li>
			<li><a href="#" data-type-fader="group_fader#contacts">Contacts</a></li>
		</ul>
	</nav>
	
	<div class="btn-group">
	  <a class="btn btn-success" href="#">Add Page</a>
	  <a class="btn dropdown-toggle btn-success" data-toggle="dropdown" href="#">
	    <span class="caret"></span>
	  </a>
	  <ul class="dropdown-menu">
		    	<li><a href="">Add Custom Page</a></li>
		    	<li><a href="">Add Blog</a></li>
	  </ul>
	</div>
	
	<div class="btn-group">
		<a class="btn dropdown-toggle btn-danger" data-toggle="dropdown" href="#">
			Report Group
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
	    	<li><a href="">Inaccurate Info</a></li>
	    	<li><a href="">Duplicate Entry</a></li>
	    	<li><a href="">Request Removal</a></li>
	    	<li><a href="">Offensive</a></li>
		</ul>
	</div>
	 -->
	<?php if ($action !== "edit") { ?>
	<a href='/group/<?php echo $group->id ?>/edit' class="btn">Edit Page</a>
	<?php } ?>
	</div>
	<div id="group_fader">
		<div id="group_fader_info">
		
<?php 
$youtube = new \Library\Widget\YouTube($group->youtube);
if ($action == "edit") {
	$youtube->setEditMode(true);
}
$youtube->Render();

$news = new \Library\Widget\News($group->getNews(), $group->rss);
if ($action == "edit") {
	$news->setEditMode(true);
}
$news->Render();

$activities = new \Library\Widget\Events($group->getActivities());
if ($action == "edit") {
	$activities->setEditMode(true);
}
$activities->Render();
?>
	
			
		</div>
			
			
	<?php if ($action == "edit") { ?>
		<a href='/group/<?php echo $group->id ?>' id="group_edit_save" class="btn">Save Page</a>
	<?php } ?>
	</div>
