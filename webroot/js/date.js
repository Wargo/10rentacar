$(document).ready(function() {

	$('small.date').timeago();

	$( "#datepicker" ).datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat: 'yy-mm-dd',
		numberOfMonths: 2,
		minDate: 0, maxDate: "+2M"
	});

	$( "#datepicker2" ).datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat: 'yy-mm-dd',
		numberOfMonths: 2,
		minDate: $("#datepicker").attr('title'), maxDate: "+2M"
	});


	$(function() {
		var dates = $( "#from, #to" ).datepicker({
			//defaultDate: "+1w",
			//changeMonth: true,
			numberOfMonths: 2,
			minDate: 0,
			showOtherMonths: true,
			selectOtherMonths: true,
			dateFormat: 'yy-mm-dd',
			onSelect: function( selectedDate ) {
				var option = this.id == "from" ? "minDate" : "maxDate",
				instance = $( this ).data( "datepicker" );
				date = $.datepicker.parseDate(
					instance.settings.dateFormat ||
					$.datepicker._defaults.dateFormat,
					selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});

});
