$.fn.dataTable.render.dateTime = function () {
    return function (data) {
        return new Intl.DateTimeFormat(document.documentElement.lang, { dateStyle: "medium", timeStyle: "medium" }).format(new Date(data));
    };
};
