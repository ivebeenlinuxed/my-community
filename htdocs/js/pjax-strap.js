$(document).ready(function() {
	scan_pjax(false);
	$("body").on("pjax:success", function(a) {
		scan_pjax(a.target);
	})
});

function scan_pjax(el) {
	if (el == false) {
		$('a[data-pjax]').each(pjax_handler);
	} else {
		$('a[data-pjax]', el).each(pjax_handler);
	}
}

function pjax_handler() {
	options = {};
	if ($(this).attr("data-pjax-replace") === "") {
		options.replaceContainer = true;
	}
	$(this).pjax(options);
}
