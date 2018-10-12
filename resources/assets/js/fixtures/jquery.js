$.ajaxSetup({
    beforeSend: function (xhr) {
        if (this.url.startsWith(window.location.origin)) {
            xhr.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector('meta[name="csrf-token"]').content)
        }
    }
});
