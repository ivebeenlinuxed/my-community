$(document).ready(function() {
	scan_pjax(false);
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
	if ($(this).attr("data-pjax-replace") !== false) {
		options.replace = true;
	}
	$(this).pjax(options);
	if (!$($(this).attr("data-pjax")).prop("pjaxed")) {
		$($(this).attr("data-pjax")).on('pjax:end', function() {
			scan_pjax(this);
		});
		$($(this).attr("data-pjax")).prop("pjaxed", true);
	}
}
