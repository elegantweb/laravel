$.ajaxSetup({
    beforeSend: function (xhr) {
        if ($(`<a href="${this.url}">`).get(0).origin === window.location.origin) {
            xhr.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector('meta[name="csrf-token"]').content)
        }
    }
});
