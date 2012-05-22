$(function(){

				// Accordion
				$(".ui-accordion").accordion({ header: "h3" });
	
				// Tabs
				$('.ui-tabs').tabs();
	

				// Dialog			
				$('.ui-dialog').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('.ui-dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});
				$.datepicker.regional['en-GB'] = {
					closeText: 'Done',
					prevText: 'Prev',
					nextText: 'Next',
					currentText: 'Today',
					monthNames: ['January','February','March','April','May','June',
					'July','August','September','October','November','December'],
					monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
					'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
					dayNamesShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
					dayNamesMin: ['Su','Mo','Tu','We','Th','Fr','Sa'],
					weekHeader: 'Wk',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: ''};
					
				// Datepicker
				$.datepicker.setDefaults($.datepicker.regional['en-GB']);
				$('.jq-ui-datepicker').datepicker({
					inline: false
				});
				
				// Slider
				$('.ui-slider').slider({
					range: true,
					values: [17, 67]
				});
				
				// Progressbar
				$(".ui-progressbar").progressbar({
					value: 20 
				});
				
				//hover states on the static widgets
				$('.ui-dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
				$('.jq-ui-timepicker').datetimepicker({
					stepHour: 1,
					stepMinute: 15
				});
				
			});