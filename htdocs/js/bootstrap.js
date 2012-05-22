$(document).ready(function() {
	$('.auto-import').tooltip({
		title: "This has not been checked by a human"
	});
	
	$('.user-added').tooltip({
		title: "This was added manually"
	});
	
	$('.tag-supporter').tooltip({
		title: "This entity gives endorsement and/or support to help keep this website online"
	});
	
	$('.tag-not-supporter').tooltip({
		title: "This entity gives no endorsement or support to the running of this website"
	});
	
	$('.tag-rss').tooltip({
		title: "News imported automatically"
	});
	
	$('.add-activity').popover({
		title: "Careful!",
		content: "Make sure you have saved all changes on this page before starting work on editing a new activity. Changes will be lost otherwise!"
	});
	
	//$(".modal").modal({});
});
