$.extend(true, $.fn.dataTable.defaults, {
    processing: true,
    responsive: true,
    buttons: [],
	dom: "<'row'<'col-sm-auto'l><'col-sm-auto-right dt-buttons-col'B><'col-sm-auto-right'f>>"+
		 "<'table-responsive'tr>"+
		 "<'row'<'col-sm-5'i><'col-sm-7'p>>"
});

$(document).on('preDraw.dt', function (e, settings) {
    var api = new $.fn.dataTable.Api(settings);
    if (undefined === api.buttons || api.buttons().containers().is(':empty')) {
        $(api.tables().containers()).find('.dt-buttons-col').hide();
    }
});
