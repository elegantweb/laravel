$.ajaxPrefilter(function (options, originalOptions, xhr) {
    if (!['get', 'head', 'options'].includes(options.type) && $(`<a href="${options.url}">`).prop('origin') === window.location.origin) {
        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    }
});
