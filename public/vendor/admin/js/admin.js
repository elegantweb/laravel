/* Fix jQuery */

$.ajaxSetup({
    beforeSend: function (xhr) {
        if ($(`<a href="${this.url}">`).get(0).origin === window.location.origin) {
            xhr.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector('meta[name="csrf-token"]').content)
        }
    }
});

/* Fix DataTables */

$.extend(true, $.fn.dataTable.defaults, {
    processing: true,
    buttons: [],
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
