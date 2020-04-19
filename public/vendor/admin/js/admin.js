/* Fix jQuery */

$.ajaxPrefilter(function (options, originalOptions, xhr) {
    if (!['get', 'head', 'options'].includes(options.type.toLowerCase()) && !options.crossDomain) {
        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    }
});

/* Fix DataTables */

$.extend(true, $.fn.dataTable.defaults, {
    processing: true,
    autoWidth: false,
	dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
		 "<'table-responsive'tr>" +
		 "<'row'<'col-sm-5'i><'col-sm-7'p>>"
});

/* Sidebar Menu State */

$('.sidebar-menu a').each(function () {
    if (this.origin === window.location.origin && this.pathname === window.location.pathname) {
        $(this).parentsUntil('.sidebar-menu', 'li').addClass('active');
    }
});

$('.sidebar-menu li.treeview > a').each(function () {
    if (this.origin === window.location.origin && window.location.pathname.startsWith(this.pathname)) {
        $(this).parent().addClass('active');
    }
});

/* Select field autovalue */

$('select[value]').each(function () {
    $(this).find(`option[value="${$(this).attr('value')}"]`).prop('selected', true);
});
