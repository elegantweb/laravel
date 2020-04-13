$.ajaxPrefilter(function (options, originalOptions, xhr) {
    if (!['get', 'head', 'options'].includes(options.type.toLowerCase()) && !options.crossDomain) {
        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    }
});
